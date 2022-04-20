<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laboratoire
 *
 * @ORM\Table(name="laboratoire")
 * @ORM\Entity
 */
class Laboratoire
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
     * @ORM\Column(name="laboLib", type="string", length=20, nullable=false)
     */
    private $labolib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabolib(): ?string
    {
        return $this->labolib;
    }

    public function setLabolib(string $labolib): self
    {
        $this->labolib = $labolib;

        return $this;
    }
    public function __toString() {
        return $this->labolib;
    }


}
