<?php

namespace App\Controller;

use App\Entity\Review;
use App\Entity\User;
use App\Entity\Post;
use App\Form\PostType;
use App\Form\ReviewType;
use App\Repository\PostRepository;
use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// UPLOAD PICTURE
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
use DateTime;


/**
 * @Route("/review")
 */
class ReviewController extends AbstractController
{
    /**
     * @Route("/", name="review_index", methods={"GET"})
     */
    public function index(ReviewRepository $reviewRepository): Response
    {
        return $this->render('review/index.html.twig', [
            'reviews' => $reviewRepository->findAll()
        ]);
    }

    /**
     * @Route("/new/{id}", name="review_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger, Post $post): Response
    {
        $review = new Review();
        
        $form = $this->createForm(ReviewType::class, $review);
        $form->handleRequest($request);
        //dd($post);

        if ($form->isSubmitted() && $form->isValid()) {

            $picture = $form->get('picture')->getData();

            // SI PICTURE IS NOT NULL, PUT THE UPLOAD FILE FOLLOWING THE ROUTE 'PHOTO_DIRECTORY' IN SERVICES.YALM  
            if ($picture !== null) {
                $newFilename = $this->upload($picture, 'picture_directory', $slugger);
                $review->setPicture($newFilename);
            }

            $review->setUser($this->getUser());
            $date = new \DateTime;
            $review->setPostedAt($date);

            // RECUP LE POST POUR AVOIR SON ID DANS LA REVIEW
            $review->setPost($post);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($review);
            $entityManager->flush();

            return $this->redirectToRoute('post_show', [
                'id' => $post->getId(),
                'user'=>$this->getUser()
            ]);
        }

        return $this->render('review/new.html.twig', [
            'review' => $review,
            'form' => $form->createView(),
            'user'=>$this->getUser()
        ]);
    }

    /**
     * @Route("/{id}", name="review_show", methods={"GET"})
     */
    public function show(Review $review): Response
    {
        return $this->render('review/show.html.twig', [
            'review' => $review,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="review_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Review $review): Response
    {
        $form = $this->createForm(ReviewType::class, $review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('review_index');
        }

        return $this->render('review/edit.html.twig', [
            'review' => $review,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="review_delete", methods={"POST"})
     */
    public function delete(Request $request, Review $review): Response
    {
        if ($this->isCsrfTokenValid('delete'.$review->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($review);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_review_show_all');
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
