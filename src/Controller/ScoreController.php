<?php


namespace App\Controller;

use App\Repository\ScoresRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    private $scoreRepository;
    /**
     * ScoreController constructor.
     * @param ScoresRepository $scoresRepository
     */
    public function  __construct(ScoresRepository $scoresRepository)
    {
        $this->scoreRepository = $scoresRepository;
    }

    private public function ReturnHighScoreList()
    {
        return $this->scoreRepository->TakeHighScoresGroupByUsername();
    }


    /**
     * @Route("/api/highscores", name="highscores")
     */
    public function GetJsonHighScores(): Response
    {
        return new Response(json_encode($this->ReturnHighScoreList()));
    }

    /**
     * @Route("/", name="index")
     */
    public function GetVueHighScores():Response
    {
        return $this->render('index.html.twig', ['scores' => $this->ReturnHighScoreList()]);
    }
}
