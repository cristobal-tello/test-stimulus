<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\CityRepository;
use App\Repository\CustomerRepository;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        CityRepository $cityRepository,
        CustomerRepository $customerRepository,
        #[MapQueryParameter('page')]
        int $page = 1,
        #[MapQueryParameter('query')]
        ?string $query = null,
    ): Response {
        $pager = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new QueryAdapter($customerRepository->findBySearchQueryBuilder($query)),
            $page,
            10,
        );

        $customers = $customerRepository->findBySearch($query);

        return $this->render('home/index.html.twig', [
            'cities' => $cityRepository->findAllByLimit(5),
            'customers' => $pager,
            'controller_name' => 'HomeController',
        ]);
    }
}
