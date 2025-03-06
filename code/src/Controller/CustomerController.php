<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\CustomerType;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'app_customer_home')]
    public function index(CustomerRepository $customerRepository): Response
    {
        $customers = $customerRepository->findAll();

        return $this->render('customer/home.html.twig', [
            'controller_name' => 'CustomerController',
            'customers' => $customers,
        ]);
    }

    #[Route('/customer/new', name: 'app_customer_new')]
    public function newAction(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(CustomerType::class);
        $form->handleRequest($request);     // Get the values from the form ONLY ON POST

        if ($form->isSubmitted() && $form->isValid()) {
            $customer = $form->getData();
            //  dd($customer);
            // /$updatedCustomer = $form->getData();
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('app_customer_home');
        }

        return $this->render(
            'customer/new_edit.html.twig',
            [
                'titleForm' => 'Edit',
                'customerForm' => $form->createView(),
            ],
        );

        return $this->redirectToRoute('app_customer_home');
    }
}
