<?php

namespace App\Controller;

use App\Entity\Listing;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ListingRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminController extends AbstractController
{   
    
    
    #[Route('/admin', name: 'admin')]
    public function index(Listingrepository $listingRepository): Response
    {
        $listings = $listingRepository->getListings();
        return $this->render('admin/index.html.twig',[
            "listings" => $listings
        ]);

    }

    #[Route('/admin/{id}/delete', name: 'delete_Post')]
    public function DeletePost(Listing $post): RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($post);
        $entityManager->flush();
        return $this->redirectToRoute("admin");

    }


    
}
