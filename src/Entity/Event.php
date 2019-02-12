<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = -1,
     *      max = 1,
     *      minMessage = "Trop petit",
     *      maxMessage = "Trop grand"
     * )
     */
    private $civilite;

    /**
     * @ORM\Column(type="string")
     * @Assert\Range(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Trop petit",
     *      maxMessage = "Trop grand"
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string")
     * @Assert\Range(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le nom de famille saisi est trop court",
     *      maxMessage = "Le nom de famille saisi est trop long"
     * )
     */
    private $firstname;

    /**
     * @Assert\Email(
     *     message = "L'adresse mail saisie est invalide.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
    * @ORM\Column(type="integer")
    * @Assert\Range(
    *      min = 10,
    *      max = 13,
    *      minMessage = "Le numéro de téléphone saisi est trop court",
    *      maxMessage = "Le numéro de téléphone saisi est trop long"
    * )
    */
    private $telephone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $newsletter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilite(): ?int
    {
        return $this->civilite;
    }

    public function setCivilite(int $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(?bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }
}
