<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductOrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductOrderType::class, $product);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Convertir la couleur
            $colorMap = [
                'black' => 'Matte Black',
                'white' => 'Pearl White',
                'silver' => 'Silver',
            ];
            
            $colorName = $colorMap[$product->getSelectedColor()] ?? 'Matte Black';
            
            // Afficher la page cart
            return $this->render('product/cart.html.twig', [
                'product' => $product,
                'quantity' => $product->getQuantity(),
                'color' => $colorName,
                'total' => $product->getPrice() * $product->getQuantity(),
            ]);
        }
        
        return $this->render('product/index.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
}