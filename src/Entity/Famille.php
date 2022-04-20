<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Famille
 *
 * @ORM\Table(name="famille")
 * @ORM\Entity
 */
class Famille
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
     * @ORM\Column(name="famLib", type="string", length=25, nullable=false)
     */
    private $famlib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFamlib(): ?string
    {
        return $this->famlib;
    }

    public function setFamlib(string $famlib): self
    {
        $this->famlib = $famlib;

        return $this;
    }


}
