<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderValidateController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/commander/merci", name="order_validate")
     */
    public function index(Cart $cart): Response
    {

        return $this->render('order_validate/index.html.twig', [
            'cart' => $cart->getFull(),
        ]);
    }
}
