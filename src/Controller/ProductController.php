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
    #[Route('/', name: 'app_product')]
    public function index(Request $request): Response
    {
        // Crée un produit avec les valeurs par défaut
        $product = new Product();
        
        // Crée le formulaire
        $form = $this->createForm(ProductOrderType::class, $product);
        
        // Traite la soumission
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Redirige vers la page panier
            return $this->redirectToRoute('app_cart', [
                'quantity' => $product->getQuantity(),
                'color' => $product->getSelectedColor(),
            ]);
        }
        
        return $this->render('product/index.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }
    
    #[Route('/cart', name: 'app_cart')]
    public function cart(Request $request): Response
    {
        // Récupère les données du formulaire
        $quantity = $request->query->get('quantity', 1);
        $color = $request->query->get('color', 'black');
        
        // Crée un produit pour afficher les infos
        $product = new Product();
        
        // Convertit la valeur de couleur en nom
        $colorNames = [
            'black' => 'Matte Black',
            'white' => 'Pearl White',
            'silver' => 'Silver',
        ];
        
        $selectedColorName = $colorNames[$color] ?? 'Matte Black';
        
        return $this->render('product/cart.html.twig', [
            'product' => $product,
            'quantity' => $quantity,
            'color' => $selectedColorName,
            'total' => $product->getPrice() * $quantity,
        ]);
    }
}