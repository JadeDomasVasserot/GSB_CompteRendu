<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Rapportvisite
 *
 * @ORM\Table(name="rapportvisite", indexes={@ORM\Index(name="idVisiteurFK_rapport", columns={"idVisiteur"}), @ORM\Index(name="idPraticienFK_rapport", columns={"idPraticien"}), @ORM\Index(name="idMotifFK_rapport", columns={"idMotif"})})
  * @ORM\Entity
 * @ApiResource
 */
class Rapportvisite
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRapportVisite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrapportvisite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVisite", type="date", nullable=false)
     */
    private $datevisite;

    /**
     * @var bool
     *
     * @ORM\Column(name="estRemplacant", type="boolean", nullable=false)
     */
    private $estremplacant;

    /**
     * @var string
     *
     * @ORM\Column(name="bilan", type="string", length=200, nullable=false)
     */
    private $bilan;

    /**
     * @var \Motif
     *
     * @ORM\ManyToOne(targetEntity="Motif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMotif", referencedColumnName="idMotif")
     * })
     */
    private $idmotif;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVisiteur", referencedColumnName="id")
     * })
     */
    private $idvisiteur;

    /**
     * @var \Praticien
     *
     * @ORM\ManyToOne(targetEntity="Praticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPraticien", referencedColumnName="idPraticien")
     * })
     */
    private $idpraticien;
    public function getId(): ?int
    {
        return $this->idrapportvisite;
    }

    public function getDatevisite(): ?\DateTimeInterface
    {
        return $this->datevisite;
    }

    public function setDatevisite(\DateTimeInterface $datevisite): self
    {
        $this->datevisite = $datevisite;

        return $this;
    }

    public function getEstremplacant(): ?bool
    {
        return $this->estremplacant;
    }

    public function setEstremplacant(bool $estremplacant): self
    {
        $this->estremplacant = $estremplacant;

        return $this;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(string $bilan): self
    {
        $this->bilan = $bilan;

        return $this;
    }

    public function getIdmotif(): ?Motif
    {
        return $this->idmotif;
    }

    public function setIdmotif(?Motif $idmotif): self
    {
        $this->idmotif = $idmotif;

        return $this;
    }

    public function getIdvisiteur(): ?Visiteur
    {
        return $this->idvisiteur;
    }

    public function setIdvisiteur(?Visiteur $idvisiteur): self
    {
        $this->idvisiteur = $idvisiteur;

        return $this;
    }

    public function getIdpraticien(): ?Praticien
    {
        return $this->idpraticien;
    }

    public function setIdpraticien(?Praticien $idpraticien): self
    {
        $this->idpraticien = $idpraticien;

        return $this;
    }

}
