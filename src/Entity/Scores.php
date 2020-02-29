<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoresRepository")
 * @ApiResource(
 *     formats={"json"},
 *     normalizationContext={"groups"={"HighScores"}},
 *     )
 * @ApiFilter(SearchFilter::class, properties={"userId": "exact"})
 * @ApiFilter(OrderFilter::class, properties={"score" : "DESC"})
 */
class Scores
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="integer")
     * @Groups("HighScores")
     */
    private $score;

    /**
     * @ORM\Column(type="date")
     * @Groups("HighScores")
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="scoring")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("HighScores")
     */
    private $user;

    /**
     * Scores constructor.
     */
    public function __construct()
    {
        $this->creationDate = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
