<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;


class FindController extends AbstractController
{
    /**
     * @Route("find", name="find")
     */
    public function index(PostRepository $postRepository): Response
    {

        // TO DISPLAY ALL THE POST WITH THE CATEGORY "RESTAURANT"
        $allPostRestau = $postRepository->findBy([
            'categories'=>'Restaurant'
        ]);
        
        // dd($allPostRestau);

        // TO DISPLAY ALL THE POST WITH THE CATEGORY "ACTIVITIY"
        $allActiv = $postRepository->findBy([
            'categories'=>'Activity'
        ]);

        // TO DISPLAY ALL THE POST WITH THE CATEGORY "DESTINATION"
        $allDesti = $postRepository->findBy([
            'categories'=>'Destination'
        ]);

        return $this->render('find/index.html.twig', [
            'controller_name' => 'FindController',
            'allRestau' => $allPostRestau,
            'allActiv' => $allActiv,
            'allDesti' => $allDesti,
        ]);
    }
}
