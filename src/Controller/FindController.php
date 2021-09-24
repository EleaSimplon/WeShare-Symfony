<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FindController extends AbstractController
{
    /**
     * @Route("find", name="find")
     */
    public function index(): Response
    {
        return $this->render('find/index.html.twig', [
            'controller_name' => 'FindController',
        ]);
    }
}
