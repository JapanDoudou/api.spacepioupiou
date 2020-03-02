<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Action\NotFoundAction;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity()
 * @ApiResource(formats={"json"},
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}},
 *     collectionOperations={
 *         "get",
 *         "post",
 *         "delete"={
 *             "controller"=NotFoundAction::class,
 *             "read"=false,
 *             "output"=false,
 *         },
 *     },
 *     itemOperations={
 *         "get",
 *         "put",
 *         "post",
 *         "delete"={
 *             "controller"=NotFoundAction::class,
 *             "read"=false,
 *             "output"=false,
 *         },
 *     }
 *     )
 * @ApiFilter(SearchFilter::class, properties={"username": "exact"})
 */
class User  implements  UserInterface,\Serializable
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:write"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups("HighScores")
     * @Groups({"user:read", "user:write"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"user:read", "user:write"})
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserData", mappedBy="userId", cascade={"persist", "remove"})
     */
    private $userData;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Scores", mappedBy="user", orphanRemoval=true)
     */
    private $scoring;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
        $this->scoring = new ArrayCollection();
    }




    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /* ********************** End of Getter and Setter ************************ */

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password
        ]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
            ) = unserialize($serialized, ['allowed_classes' => false]);
        //Allowed_classes => false car on ne veut pas instancier les classes si elles sont dans cette sérialisation
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return['ROLE_USER'];
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }


    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
/*
    public function getUserData(): ?UserData
    {
        return $this->userData;
    }*/

    public function setUserData(UserData $userData): self
    {
        $this->userData = $userData;

        // set the owning side of the relation if necessary
        if ($userData->getUserId() !== $this) {
            $userData->setUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection|Scores[]
     */
    public function getScoring(): Collection
    {
        return $this->scoring;
    }

    public function addScoring(Scores $scoring): self
    {
        if (!$this->scoring->contains($scoring)) {
            $this->scoring[] = $scoring;
            $scoring->setUser($this);
        }

        return $this;
    }

    public function removeScoring(Scores $scoring): self
    {
        if ($this->scoring->contains($scoring)) {
            $this->scoring->removeElement($scoring);
            // set the owning side to null (unless already changed)
            if ($scoring->getUser() === $this) {
                $scoring->setUser(null);
            }
        }

        return $this;
    }



}