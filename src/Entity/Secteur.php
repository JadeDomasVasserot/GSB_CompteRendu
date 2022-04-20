<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Secteur
 *
 * @ORM\Table(name="secteur")
 * @ORM\Entity
 */
class Secteur
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
     * @ORM\Column(name="secLib", type="string", length=20, nullable=false)
     */
    private $seclib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeclib(): ?string
    {
        return $this->seclib;
    }

    public function setSeclib(string $seclib): self
    {
        $this->seclib = $seclib;

        return $this;
    }
    public function __toString() {
        return $this->seclib;
    }


}
