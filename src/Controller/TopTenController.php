<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;

class TopTenController extends AbstractController
{
    /**
     * @Route("top_ten", name="top_ten")
     */
    public function index(PostRepository $postRepository): Response
    {
        $allRestau = $postRepository->findBy(['categories'=>'Restaurant']);
        $allActiv = $postRepository->findBy(['categories'=>'Activity']);
        $allDesti = $postRepository->findBy(['categories'=>'Destination']);


        return $this->render('top_ten/index.html.twig', [
            'controller_name' => 'TopTenController',
            'allRestau' => $allRestau,
            'allActiv' => $allActiv,
            'allDesti' => $allDesti,
        ]);
    }
}
