<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\CityRepository;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(#[MapQueryParameter('query')] ?string $query, CityRepository $cityRepository, CustomerRepository $customerRepository): Response
    {
        $customers = $customerRepository->findBySearch($query);

        return $this->render('home/index.html.twig', [
            'cities' => $cityRepository->findAll(),
            'customers' => $customers,
            'controller_name' => 'HomeController',
        ]);
    }
}
