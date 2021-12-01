<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator
use Symfony\Component\HttpFoundation\Request; // Nous avons besoin d'accéder à la requête pour obtenir le numéro de page
use App\Repository\PostRepository;


class FindController extends AbstractController
{
    /**
     * @Route("find", name="find")
     */
    public function index(Request $request, PostRepository $postRepository, PaginatorInterface $paginator): Response
    {

        return $this->render('find/index.html.twig', [
            'controller_name' => 'FindController'
        ]);
    }

    /**
     * @Route("restaurant", name="restaurant")
     */
    public function restaurant(Request $request, PostRepository $postRepository, PaginatorInterface $paginator): Response
    {

        // TO DISPLAY ALL THE POST WITH THE CATEGORY "RESTAURANT"
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $allPostRestau = $postRepository->findByIdDesc([
            'categories'=>'Restaurant'
        ]);

        // TO PAGINATE ALL RESTAU CATEGORY
        $allPostRestau = $paginator->paginate(
            $allPostRestau, /* query NOT result */// REQUEST CONTAINS DATA TO PAGINATE (OFFRES) //
            $request->query->getInt('page', 1),// NUM PAGE EN COURS(URL) OU 1 SI AUCUNE PAGE
            5 // NUM DE RESULT PAR PAGE
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
       $allActiv = $postRepository->findBy([
        'categories'=>'Activity'
        ]);

        // TO PAGINATE ALL ACTIVITY CATEGORY
        $allActiv = $paginator->paginate(
            $allActiv,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('find/activity.html.twig', [
            'controller_name' => 'FindController',
            'allActiv' => $allActiv,
        ]);
    }

    /**
     * @Route("destination", name="destination")
     */
    public function destination(Request $request, PostRepository $postRepository, PaginatorInterface $paginator): Response
    {

       // TO DISPLAY ALL THE POST WITH THE CATEGORY "DESTINATION"
       $allDesti = $postRepository->findBy([
        'categories'=>'Destination'
    ]);

    // TO PAGINATE ALL DESTINATION CATEGORY
    $allDesti = $paginator->paginate(
        $allDesti,
        $request->query->getInt('page', 1),
        5
    );

        return $this->render('find/destination.html.twig', [
            'controller_name' => 'FindController',
            'allDesti' => $allDesti,
        ]);
    }
}
