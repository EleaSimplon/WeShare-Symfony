<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReviewRepository;

class MyProfileController extends AbstractController
{
    /**
     * @Route("my_profile", name="my_profile")
     */
    public function index(ReviewRepository $reviewRepository): Response
    {
        // RECUP FUNCTION FINDBY (ALREADY EXISTING) of REVIEW REPO
        // RECUP THE USER IN THE ARRAY
        $allReview = $reviewRepository->findBy([
            'user'=>$this->getUser()
        ]);

        // dd($allReview);

        return $this->render('my_profile/index.html.twig', [
            'controller_name' => 'MyProfileController',
            'allReview' => $allReview,
            'user'=>$this->getUser(),
            // count = Compte tous les éléments d'un tableau ou quelque chose d'un objet
            //count(ALL THE REVIEW OF A USER)
            'countReview'=> count($allReview)
        ]);
    }
}
