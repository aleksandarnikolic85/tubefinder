<?php

namespace App\Entity;

use App\Repository\LightSourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LightSourceRepository::class)
 */
class LightSource
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
    private $ean;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $power;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $luminousFlux;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $colorTemperature;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $shatterproof;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lowFLickerLight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $guarantee;

    /**
     * @ORM\ManyToMany(targetEntity=Ballast::class, inversedBy="compatibleLightSources")
     */
    private $compatibleBallasts;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $compatibleApplications;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $basicCode;

    /**
     * @ORM\ManyToMany(targetEntity=Ballast::class, mappedBy="uncompatibleLightSources")
     */
    private $uncompatibleBallasts;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lifetime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lifetime_rem;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $efficiency_class;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $guarantee_rem;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $length;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lamp_type;

    /**
     * @ORM\OneToMany(targetEntity=Remarks::class, mappedBy="light_source", orphanRemoval=true)
     */
    private $remarks;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $scenario;

    public function __construct()
    {
        $this->compatibleBallasts = new ArrayCollection();
        $this->uncompatibleBallasts = new ArrayCollection();
        $this->remarks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(?int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getLuminousFlux(): ?int
    {
        return $this->luminousFlux;
    }

    public function setLuminousFlux(?int $luminousFlux): self
    {
        $this->luminousFlux = $luminousFlux;

        return $this;
    }

    public function getColorTemperature(): ?int
    {
        return $this->colorTemperature;
    }

    public function setColorTemperature(?int $colorTemperature): self
    {
        $this->colorTemperature = $colorTemperature;

        return $this;
    }

    public function getShatterproof(): ?bool
    {
        return $this->shatterproof;
    }

    public function setShatterproof(bool $shatterproof): self
    {
        $this->shatterproof = $shatterproof;

        return $this;
    }

    public function getLowFLickerLight(): ?bool
    {
        return $this->lowFLickerLight;
    }

    public function setLowFLickerLight(bool $lowFLickerLight): self
    {
        $this->lowFLickerLight = $lowFLickerLight;

        return $this;
    }

    public function getGuarantee(): ?int
    {
        return $this->guarantee;
    }

    public function setGuarantee(?int $guarantee): self
    {
        $this->guarantee = $guarantee;

        return $this;
    }

    /**
     * @return Collection|Ballast[]
     */
    public function getCompatibleBallasts(): Collection
    {
        return $this->compatibleBallasts;
    }

    public function addCompatibleBallast(Ballast $compatibleBallast): self
    {
        if (!$this->compatibleBallasts->contains($compatibleBallast)) {
            $this->compatibleBallasts[] = $compatibleBallast;
        }

        return $this;
    }

    public function removeCompatibleBallast(Ballast $compatibleBallast): self
    {
        $this->compatibleBallasts->removeElement($compatibleBallast);

        return $this;
    }

    public function __toString() {
        return $this->productName . " - " . $this->getEan();
    }

    public function getCompatibleApplications(): ?array
    {
        return $this->compatibleApplications;
    }

    public function setCompatibleApplications(?array $compatibleApplications): self
    {
        $this->compatibleApplications = $compatibleApplications;

        return $this;
    }

    public function getBasicCode(): ?string
    {
        return $this->basicCode;
    }

    public function setBasicCode(?string $basicCode): self
    {
        $this->basicCode = $basicCode;

        return $this;
    }

    /**
     * @return Collection|Ballast[]
     */
    public function getUncompatibleBallasts(): Collection
    {
        return $this->uncompatibleBallasts;
    }

    public function addUncompatibleBallast(Ballast $uncompatibleBallast): self
    {
        if (!$this->uncompatibleBallasts->contains($uncompatibleBallast)) {
            $this->uncompatibleBallasts[] = $uncompatibleBallast;
            $uncompatibleBallast->addUncompatibleLightSource($this);
        }

        return $this;
    }

    public function removeUncompatibleBallast(Ballast $uncompatibleBallast): self
    {
        if ($this->uncompatibleBallasts->removeElement($uncompatibleBallast)) {
            $uncompatibleBallast->removeUncompatibleLightSource($this);
        }

        return $this;
    }

    public function getLifetime(): ?int
    {
        return $this->lifetime;
    }

    public function setLifetime(?int $lifetime): self
    {
        $this->lifetime = $lifetime;

        return $this;
    }

    public function getLifetimeRem(): ?string
    {
        return $this->lifetime_rem;
    }

    public function setLifetimeRem(?string $lifetime_rem): self
    {
        $this->lifetime_rem = $lifetime_rem;

        return $this;
    }

    public function getEfficiencyClass(): ?string
    {
        return $this->efficiency_class;
    }

    public function setEfficiencyClass(?string $efficiency_class): self
    {
        $this->efficiency_class = $efficiency_class;

        return $this;
    }

    public function getGuaranteeRem(): ?string
    {
        return $this->guarantee_rem;
    }

    public function setGuaranteeRem(?string $guarantee_rem): self
    {
        $this->guarantee_rem = $guarantee_rem;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(?int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getLampType(): ?int
    {
        return $this->lamp_type;
    }

    public function setLampType(?int $lamp_type): self
    {
        $this->lamp_type = $lamp_type;

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
            $remark->setLightSource($this);
        }

        return $this;
    }

    public function removeRemark(Remarks $remark): self
    {
        if ($this->remarks->removeElement($remark)) {
            // set the owning side to null (unless already changed)
            if ($remark->getLightSource() === $this) {
                $remark->setLightSource(null);
            }
        }

        return $this;
    }

    public function getScenario(): ?string
    {
        return $this->scenario;
    }

    public function setScenario(?string $scenario): self
    {
        $this->scenario = $scenario;

        return $this;
    }
}
