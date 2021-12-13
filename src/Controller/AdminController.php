<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Entity\User;
// UPLOAD PICTURE
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class);

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $this->getUser(),
            'users' => $user->findAll(),
        ]);
    }

    /**
     * @Route("admin/post/new", name="post_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $picture = $form->get('picture')->getData();

            // SI PICTURE IS NOT NULL, PUT THE UPLOAD FILE FOLLOWING THE ROUTE 'PHOTO_DIRECTORY' IN SERVICES.YALM  
            if ($picture !== null) {
                $newFilename = $this->upload($picture, 'photo_directory', $slugger);
                $post->setPicture($newFilename);
            }

            $post->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('post_show', [
                'id' => $post->getId()
            ]);
        }

        return $this->render('admin/post_new.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
            'user'=>$this->getUser()
        ]);
    }

    // UPLOAD PICTURE IN NEW REVIEW
    public function upload($file, $targetDirectory, $slugger)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {

            $file->move(
                $this->getParameter($targetDirectory),
                $newFilename
            );
            return $newFilename;
        } catch (FileException $e) {
            throw new \Exception($e->getMessage());
            // ... handle exception if something happens during file upload
        }

    }
    
}
