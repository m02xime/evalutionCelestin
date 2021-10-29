<?php

namespace App\Controller;

use App\Entity\Proprietaire;
use App\Entity\Restaurant;
use App\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $restaurants = $this->getDoctrine()
        ->getRepository(Restaurant::class)
        ->findAll();
        $proprietaires = $this->getDoctrine()
        ->getRepository(Proprietaire::class)
        ->findAll();
        $villes = $this->getDoctrine()
            ->getRepository(Ville::class)
            ->findAll();
        return $this->render('home/index.html.twig', [
            "villes"=>$villes,
            "restaurants"=>$restaurants,
            "proprietaires"=>$proprietaires
        ]);
    }


        /**
     * @Route("/ville/{nom}", name="ville")
     */
    public function ville(string $nom): Response
    {
        $restaurants = $this->getDoctrine()
        ->getRepository(Restaurant::class)
        ->findAll();
        $proprietaires = $this->getDoctrine()
        ->getRepository(Proprietaire::class)
        ->findAll();
        $villes = $this->getDoctrine()
        ->getRepository(Ville::class)
        ->findAll();
        return $this->render('home/ville.html.twig', [
            "restaurants"=>$restaurants,
            "proprietaires"=>$proprietaires,
            "villes"=>$villes,
            "ville"=>$nom
        ]);
    }

            /**
     * @Route("/Restaurant/{nom}", name="Restaurant")
     */
    public function Restaurant(string $nom): Response
    {
  
        $restaurants = $this->getDoctrine()
        ->getRepository(Restaurant::class)
        ->findAll();
        return $this->render('home/restaurant.html.twig', [
            "restaurants"=>$restaurants,
            "proprietaire"=>$nom
        ]);
    }
}
