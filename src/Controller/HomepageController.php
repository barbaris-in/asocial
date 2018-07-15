<?php

namespace App\Controller;

use App\Entity\Episode;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $episodes = $this->getDoctrine()->getRepository(Episode::class)->findAll();

        return $this->render('homepage/index.html.twig', [
            'episodes' => $episodes,
        ]);
    }
}
