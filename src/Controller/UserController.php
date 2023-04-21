<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\EditUserType;
use App\Form\NewUserType;
use App\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\PasswordHasher;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/{_locale}/users/users_preview", name="users_preview")
     */
    public function index(Request $request): Response
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            return $this->redirect($this->generateUrl('home'));
        }

        $users = $this->getDoctrine()->getRepository(Admin::class)->findAll();


        return $this->render('user_management/user_table.html.twig', array(
            'users' => $users
        ));
    }

    /**
     * @Route("/{_locale}/users/edit_user/{id}", name="edit_user")
     */
    public function editUser($id, Request $request, PasswordHasher\Hasher\UserPasswordHasherInterface $passwordHasher, UrlGeneratorInterface $urlGenerator): Response
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            return $this->redirect($this->generateUrl('home'));
        }

        $user = $this->getDoctrine()->getRepository(Admin::class)->find(array('id' => $id));

        $form = $this->createForm(EditUserType::class, $user);

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);


            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $user->setName($form->get("name")->getData());
                $user->setSurname($form->get("surname")->getData());
                $user->setEmail($form->get("email")->getData());
                $user->setRoles($form->get("roles")->getData());


                if((!empty($form->get("passwordOld")->getData()) and !empty($form->get("passwordNew")->getData()) and $passwordHasher->isPasswordValid($user, $form->get("passwordOld")->getData()))) {
                    $user->setPassword($passwordHasher->hashPassword($user, $form->get("passwordNew")->getData()));
                }

                $em->persist($user);
                $em->flush();

                return new RedirectResponse($urlGenerator->generate('users_preview'));
            }
        }


        return $this->render('user_management/edit_user.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{_locale}/users/new_user/", name="new_user")
     */
    public function createUser(Request $request, PasswordHasher\Hasher\UserPasswordHasherInterface $passwordHasher, UrlGeneratorInterface $urlGenerator): Response
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            return $this->redirect($this->generateUrl('home'));
        }

        $user = new Admin();

        $form = $this->createForm(NewUserType::class, $user);

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);


            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $user->setName($form->get("name")->getData());
                $user->setSurname($form->get("surname")->getData());
                $user->setEmail($form->get("email")->getData());
                $user->setRoles($form->get("roles")->getData());
                $user->setPassword($passwordHasher->hashPassword($user, $form->get("passwordNew")->getData()));
                $user->setActive(true);

                $em->persist($user);
                $em->flush();

                return new RedirectResponse($urlGenerator->generate('users_preview'));
            }
        }


        return $this->render('user_management/edit_user.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{_locale}/users/remove_user/{id}", name="remove_user")
     */
    public function removeUser($id, Request $request, UrlGeneratorInterface $urlGenerator): Response
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            return $this->redirect($this->generateUrl('home'));
        }

        $user = $this->getDoctrine()->getRepository(Admin::class)->find(array('id' => $id));

        if($user) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return new RedirectResponse($urlGenerator->generate('users_preview'));
    }
}
