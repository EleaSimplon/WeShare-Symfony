<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
// POST
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
// POST
use App\Entity\Review;
use App\Repository\ReviewRepository;
// UPLOAD PICTURE
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(PostRepository $postRepository, ReviewRepository $reviewRepository): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class);
        // RECUP ALL POSTS TO DSPLAY THE COUNT
        $allPost = $postRepository->findAll();

        // RECUP ALL POSTS TO DSPLAY THE COUNT
        $allReview = $reviewRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $this->getUser(),
            'allPost' => $allPost,
            'allReview' => $allReview,
            'users' => $user->findAll()
        ]);
    }

    /**
     * @Route("admin/post/new", name="admin_post_new", methods={"GET","POST"})
     */
    public function newPost(Request $request, SluggerInterface $slugger): Response
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

        return $this->render('admin/new_post.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
            'user'=>$this->getUser()
        ]);
    }

    /**
     * @Route("/{id}/admin/post/edit", name="post_edit", methods={"GET","POST"})
     */
    public function editPost(Request $request, Post $post): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_index');
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
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

    /**
    * @Route("admin/post/show/all", name="admin_post_show_all")
    */
    public function postShowAll(PostRepository $customer)
    {
        $post= $this->getDoctrine()->getRepository(Post::class);

        return $this->render('admin/post_show_all.html.twig', [
            'posts' => $post->findAll()
        ]);
    }

    /**
    * @Route("admin/review/show/all", name="admin_review_show_all")
    */
    public function reviewShowAll(ReviewRepository $customer)
    {
        $review= $this->getDoctrine()->getRepository(Review::class);

        return $this->render('admin/review_show_all.html.twig', [
            'reviews' => $review->findAll()
        ]);
    }
    
}
