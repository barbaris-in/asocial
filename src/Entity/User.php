<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Episode", mappedBy="user")
     */
    private $episodes;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->episodes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get episodes
     *
     * @return Collection
     */
    public function getEpisodes(): Collection
    {
        return $this->episodes;
    }

    /**
     * Set episodes
     *
     * @param Collection $episodes
     *
     * @return User
     */
    public function setEpisodes(Collection $episodes)
    {
        $this->episodes = $episodes;

        return $this;
    }
}
