<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;

/**
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
class BookingController extends AbstractController
{


    #[Route('/booking', name: 'booking')]
    public function index(BookingRepository $bookingRepository): Response
    {

        return $this->render('booking/index.html.twig', [
            'controller_name' => 'BookingController',
        ]);
    }

    #[Route('/booking/new', name: 'newBooking')]
    public function new(Request $request): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);
        // if($form->isSubmitted() && $form->isValid()) {
            
        //     //$booking->setUser($this->getUser());
            
        //     $entityManager = $this->getDoctrine()->getManager();

        //     $dateFrom = $form->get('dateFrom')->getData();
        //     $booking->setDateFrom($dateFrom);
            

        //     $dateUntil = $form->get('dateUntil')->getData();
        //     $booking->setDateFrom($dateUntil);


        //     $entityManager->persist($booking);
            
        //     $entityManager->flush();

        //     return $this->redirectToRoute('index');
        // }
        return $this->render('booking/index.html.twig', [
            "form"=> $form->createView()
        ]);
    }

    
}
