<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\ManyToMany(targetEntity: Plante::class, mappedBy: 'user')]
    private Collection $plantes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Decouverte::class)]
    private Collection $decouvertes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Coaching::class)]
    private Collection $coachings;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Box::class)]
    private Collection $boxes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Programme::class)]
    private Collection $programmes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Evenement::class)]
    private Collection $evenements;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->plantes = new ArrayCollection();
        $this->decouvertes = new ArrayCollection();
        $this->coachings = new ArrayCollection();
        $this->boxes = new ArrayCollection();
        $this->programmes = new ArrayCollection();
        $this->evenements = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Plante>
     */
    public function getPlantes(): Collection
    {
        return $this->plantes;
    }

    public function addPlante(Plante $plante): self
    {
        if (!$this->plantes->contains($plante)) {
            $this->plantes->add($plante);
            $plante->addUser($this);
        }

        return $this;
    }

    public function removePlante(Plante $plante): self
    {
        if ($this->plantes->removeElement($plante)) {
            $plante->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Decouverte>
     */
    public function getDecouvertes(): Collection
    {
        return $this->decouvertes;
    }

    public function addDecouverte(Decouverte $decouverte): self
    {
        if (!$this->decouvertes->contains($decouverte)) {
            $this->decouvertes->add($decouverte);
            $decouverte->setUser($this);
        }

        return $this;
    }

    public function removeDecouverte(Decouverte $decouverte): self
    {
        if ($this->decouvertes->removeElement($decouverte)) {
            // set the owning side to null (unless already changed)
            if ($decouverte->getUser() === $this) {
                $decouverte->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Coaching>
     */
    public function getCoachings(): Collection
    {
        return $this->coachings;
    }

    public function addCoaching(Coaching $coaching): self
    {
        if (!$this->coachings->contains($coaching)) {
            $this->coachings->add($coaching);
            $coaching->setUser($this);
        }

        return $this;
    }

    public function removeCoaching(Coaching $coaching): self
    {
        if ($this->coachings->removeElement($coaching)) {
            // set the owning side to null (unless already changed)
            if ($coaching->getUser() === $this) {
                $coaching->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Box>
     */
    public function getBoxes(): Collection
    {
        return $this->boxes;
    }

    public function addBox(Box $box): self
    {
        if (!$this->boxes->contains($box)) {
            $this->boxes->add($box);
            $box->setUser($this);
        }

        return $this;
    }

    public function removeBox(Box $box): self
    {
        if ($this->boxes->removeElement($box)) {
            // set the owning side to null (unless already changed)
            if ($box->getUser() === $this) {
                $box->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Programme>
     */
    public function getProgrammes(): Collection
    {
        return $this->programmes;
    }

    public function addProgramme(Programme $programme): self
    {
        if (!$this->programmes->contains($programme)) {
            $this->programmes->add($programme);
            $programme->setUser($this);
        }

        return $this;
    }

    public function removeProgramme(Programme $programme): self
    {
        if ($this->programmes->removeElement($programme)) {
            // set the owning side to null (unless already changed)
            if ($programme->getUser() === $this) {
                $programme->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements->add($evenement);
            $evenement->setUser($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getUser() === $this) {
                $evenement->setUser(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
