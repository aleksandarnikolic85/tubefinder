<?php

namespace App\Entity;

use App\Repository\BallastRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BallastRepository::class)
 */
class Ballast
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ean;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $refNo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lampAmount;

    /**
     * @ORM\ManyToMany(targetEntity=LightSource::class, mappedBy="compatibleBallasts")
     */
    private $compatibleLightSources;

    /**
     * @ORM\ManyToMany(targetEntity=LightSource::class, inversedBy="uncompatibleBallasts")
     */
    private $uncompatibleLightSources;

    /**
     * @ORM\OneToMany(targetEntity=Remarks::class, mappedBy="ballast", orphanRemoval=true)
     */
    private $remarks;

    public function __construct()
    {
        $this->compatibleLightSources = new ArrayCollection();
        $this->uncompatibleLightSources = new ArrayCollection();
        $this->remarks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(string $ean): self
    {
        $this->ean = $ean;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getRefNo(): ?string
    {
        return $this->refNo;
    }

    public function setRefNo(string $refNo): self
    {
        $this->refNo = $refNo;

        return $this;
    }

    public function getLampAmount(): ?int
    {
        return $this->lampAmount;
    }

    public function setLampAmount(int $lampAmount): self
    {
        $this->lampAmount = $lampAmount;

        return $this;
    }

    /**
     * @return Collection|LightSource[]
     */
    public function getCompatibleLightSources(): Collection
    {
        return $this->compatibleLightSources;
    }

    public function addCompatibleLightSource(LightSource $compatibleLightSource): self
    {
        if (!$this->compatibleLightSources->contains($compatibleLightSource)) {
            $this->compatibleLightSources[] = $compatibleLightSource;
            $compatibleLightSource->addCompatibleBallast($this);
        }

        return $this;
    }

    public function removeCompatibleLightSource(LightSource $compatibleLightSource): self
    {
        if ($this->compatibleLightSources->removeElement($compatibleLightSource)) {
            $compatibleLightSource->removeCompatibleBallast($this);
        }

        return $this;
    }

    public function __toString() {
        return $this->productName . " - " . $this->getRefNo();
    }

    /**
     * @return Collection|LightSource[]
     */
    public function getUncompatibleLightSources(): Collection
    {
        return $this->uncompatibleLightSources;
    }

    public function addUncompatibleLightSource(LightSource $uncompatibleLightSource): self
    {
        if (!$this->uncompatibleLightSources->contains($uncompatibleLightSource)) {
            $this->uncompatibleLightSources[] = $uncompatibleLightSource;
        }

        return $this;
    }

    public function removeUncompatibleLightSource(LightSource $uncompatibleLightSource): self
    {
        $this->uncompatibleLightSources->removeElement($uncompatibleLightSource);

        return $this;
    }

    /**
     * @return Collection|Remarks[]
     */
    public function getRemarks(): Collection
    {
        return $this->remarks;
    }

    public function addRemark(Remarks $remark): self
    {
        if (!$this->remarks->contains($remark)) {
            $this->remarks[] = $remark;
            $remark->setBallast($this);
        }

        return $this;
    }

    public function removeRemark(Remarks $remark): self
    {
        if ($this->remarks->removeElement($remark)) {
            // set the owning side to null (unless already changed)
            if ($remark->getBallast() === $this) {
                $remark->setBallast(null);
            }
        }

        return $this;
    }
}
