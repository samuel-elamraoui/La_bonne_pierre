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
     * @Route("/commander/merci/{id}", name="order_validate")
     */
    public function index($id,Cart $cart): Response
    {
        $usersorder = $this->entityManager->getRepository(User::class)->findOneById($id)->getOrders();

        return $this->render('order_validate/index.html.twig', [
            'cart' => $cart->getFull(),
        ]);
    }
}
