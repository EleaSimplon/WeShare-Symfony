<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator
use Symfony\Component\HttpFoundation\Request; // Nous avons besoin d'accéder à la requête pour obtenir le numéro de page
use App\Repository\PostRepository;
//AVG RATE
use App\Entity\Post;
use App\Repository\ReviewRepository;


class FindController extends AbstractController
{
    /**
     * @Route("find", name="find")
     */
    public function index(Request $request, PostRepository $postRepository): Response
    {

        $allPostRestau = $postRepository->findBy([
            'categories'=>'Restaurant'
        ]);

        $allActiv = $postRepository->findBy([
            'categories'=>'Activity'
        ]);

        $allDesti = $postRepository->findBy([
            'categories'=>'Destination'
        ]);

        return $this->render('find/index.html.twig', [
            'controller_name' => 'FindController',
            'allRestau' => $allPostRestau,
            'allActiv' => $allActiv,
            'allDesti' => $allDesti

        ]);
    }

    /**
     * @Route("restaurant", name="restaurant")
     */
    public function restaurant(Request $request, PostRepository $postRepository, PaginatorInterface $paginator): Response
    {
        // TO DISPLAY ALL THE POST WITH THE CATEGORY "RESTAURANT"
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $allPostRestau = $postRepository->findBy(['categories'=>'Restaurant']);

        foreach ($allPostRestau as $post) {
            $reviews=$post->getReviews()->getValues();
            $sumRate = 0;
            foreach ($reviews as $review) {
                $sumRate += $review->getRate();
            }
            if ($reviews == null) {
                $avg = $sumRate / 1;
            }   else {
                    $avg = $sumRate / count($reviews);
                }
            $post->setAvgReviews($avg);
        }
        
        // TO PAGINATE ALL RESTAU CATEGORY
        $allPostRestau = $paginator->paginate(
            $allPostRestau, /* query NOT result */// REQUEST CONTAINS DATA TO PAGINATE (OFFRES) //
            $request->query->getInt('page', 1),// NUM PAGE EN COURS(URL) OU 1 SI AUCUNE PAGE
            6 // NUM DE RESULT PAR PAGE
        );

        return $this->render('find/restaurant.html.twig', [
            'controller_name' => 'FindController',
            'allRestau' => $allPostRestau,
        ]);
    }

    /**
     * @Route("activity", name="activity")
     */
    public function activity(Request $request, PostRepository $postRepository, PaginatorInterface $paginator): Response
    {

       // TO DISPLAY ALL THE POST WITH THE CATEGORY "ACTIVITIY"
       $allActiv = $postRepository->findBy(['categories'=>'Activity']);

        foreach ($allActiv as $post) {
            $reviews=$post->getReviews()->getValues();
            $sumRate = 0;
            foreach ($reviews as $review) {
                $sumRate += $review->getRate();
            }
            if ($reviews == null) {
                $avg = $sumRate / 1;
            }   else {
                    $avg = $sumRate / count($reviews);
                }
            $post->setAvgReviews($avg);
        }

        // TO PAGINATE ALL ACTIVITY CATEGORY
        $allActiv = $paginator->paginate(
            $allActiv,
            $request->query->getInt('page', 1),
            6
        );


        return $this->render('find/activity.html.twig', [
            'controller_name' => 'FindController',
            'allActiv' => $allActiv,
            'user'=>$this->getUser(),
            // 'rateAvg' => $rateAvg
        ]);
    }

    /**
     * @Route("destination", name="destination")
     */
    public function destination(Request $request, PostRepository $postRepository, PaginatorInterface $paginator): Response
    {

       // TO DISPLAY ALL THE POST WITH THE CATEGORY "DESTINATION"
        $allDesti = $postRepository->findBy(['categories'=>'Destination']);

        foreach ($allDesti as $post) {
            $reviews=$post->getReviews()->getValues();
            $sumRate = 0;
            foreach ($reviews as $review) {
                $sumRate += $review->getRate();
            }
            if ($reviews == null) {
                $avg = $sumRate / 1;
            }   else {
                    $avg = $sumRate / count($reviews);
                }
            $post->setAvgReviews($avg);
        }

        // TO PAGINATE ALL DESTINATION CATEGORY
        $allDesti = $paginator->paginate(
            $allDesti,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('find/destination.html.twig', [
            'controller_name' => 'FindController',
            'allDesti' => $allDesti,
        ]);
    }
}
