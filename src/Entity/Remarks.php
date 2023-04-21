<?php

namespace App\Entity;

use App\Repository\RemarksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RemarksRepository::class)
 */
class Remarks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $en;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $de;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $es;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $it;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $da;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $no;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $et;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lv;

    /**
     * @ORM\ManyToOne(targetEntity=LightSource::class, inversedBy="remarks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $light_source;

    /**
     * @ORM\ManyToOne(targetEntity=Ballast::class, inversedBy="remarks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ballast;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }

    public function setEn(?string $en): self
    {
        $this->en = $en;

        return $this;
    }

    public function getDe(): ?string
    {
        return $this->de;
    }

    public function setDe(?string $de): self
    {
        $this->de = $de;

        return $this;
    }

    public function getNl(): ?string
    {
        return $this->nl;
    }

    public function setNl(?string $nl): self
    {
        $this->nl = $nl;

        return $this;
    }

    public function getFr(): ?string
    {
        return $this->fr;
    }

    public function setFr(?string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    public function getPt(): ?string
    {
        return $this->pt;
    }

    public function setPt(?string $pt): self
    {
        $this->pt = $pt;

        return $this;
    }

    public function getEs(): ?string
    {
        return $this->es;
    }

    public function setEs(?string $es): self
    {
        $this->es = $es;

        return $this;
    }

    public function getIt(): ?string
    {
        return $this->it;
    }

    public function setIt(?string $it): self
    {
        $this->it = $it;

        return $this;
    }

    public function getDa(): ?string
    {
        return $this->da;
    }

    public function setDa(?string $da): self
    {
        $this->da = $da;

        return $this;
    }

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(?string $no): self
    {
        $this->no = $no;

        return $this;
    }

    public function getSv(): ?string
    {
        return $this->sv;
    }

    public function setSv(?string $sv): self
    {
        $this->sv = $sv;

        return $this;
    }

    public function getFi(): ?string
    {
        return $this->fi;
    }

    public function setFi(?string $fi): self
    {
        $this->fi = $fi;

        return $this;
    }

    public function getEt(): ?string
    {
        return $this->et;
    }

    public function setEt(?string $et): self
    {
        $this->et = $et;

        return $this;
    }

    public function getLt(): ?string
    {
        return $this->lt;
    }

    public function setLt(?string $lt): self
    {
        $this->lt = $lt;

        return $this;
    }

    public function getLv(): ?string
    {
        return $this->lv;
    }

    public function setLv(?string $lv): self
    {
        $this->lv = $lv;

        return $this;
    }

    public function getLightSource(): ?LightSource
    {
        return $this->light_source;
    }

    public function setLightSource(?LightSource $light_source): self
    {
        $this->light_source = $light_source;

        return $this;
    }

    public function getBallast(): ?Ballast
    {
        return $this->ballast;
    }

    public function setBallast(?Ballast $ballast): self
    {
        $this->ballast = $ballast;

        return $this;
    }
}
