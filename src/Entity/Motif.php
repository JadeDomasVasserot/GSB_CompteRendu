<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motif
 *
 * @ORM\Table(name="motif")
 * @ORM\Entity
 */
class Motif
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="motifLib", type="string", length=25, nullable=false)
     */
    private $motiflib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotiflib(): ?string
    {
        return $this->motiflib;
    }

    public function setMotiflib(string $motiflib): self
    {
        $this->motiflib = $motiflib;

        return $this;
    }
    public function __toString() {
        return $this->motiflib;
    }


}
