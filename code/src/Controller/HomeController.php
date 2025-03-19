<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\City;
use App\Repository\CityRepository;
use App\Repository\CustomerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CityRepository $cityRepository, CustomerRepository $customerRepository): Response
    {
        $cities = $cityRepository->findAll();
        $customers = $customerRepository->findAll();

        return $this->render('home/index.html.twig', [
            'cities' => $cities,
            'customers' => $customers,
            'controller_name' => 'HomeController',
        ]);
    }
}
