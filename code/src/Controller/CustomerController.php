<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customer/new', name: 'app_customer_new')]
    public function newAction(EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(CustomerType::class);
        $form->handleRequest($request);     // Get the values from the form ONLY ON POST

        if ($form->isSubmitted() && $form->isValid()) {
            $customer = $form->getData();
            //  dd($customer);
            // /$updatedCustomer = $form->getData();
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render(
            'customer/new.html.twig',
            [
                'titleForm' => 'Add',
                'customerForm' => $form->createView(),
            ],
        );
    }

    #[Route('/customer/edit/{id}', name: 'app_customer_edit', methods: ['GET', 'POST'])]
    public function editAction(Customer $customer, EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);     // Get the values from the form ONLY ON POST

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render(
            'customer/edit.html.twig',
            [
                'titleForm' => 'Edit',
                'customerForm' => $form->createView(),
            ],
        );
    }
}
