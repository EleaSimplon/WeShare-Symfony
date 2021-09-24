<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TopTenController extends AbstractController
{
    /**
     * @Route("top_ten", name="top_ten")
     */
    public function index(): Response
    {
        return $this->render('top_ten/index.html.twig', [
            'controller_name' => 'TopTenController',
        ]);
    }
}
