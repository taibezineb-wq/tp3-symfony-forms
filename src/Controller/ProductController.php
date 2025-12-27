<?php
namespace App\Controller;

use App\Form\ProductOrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product')]
    public function index(): Response
    {
        $product = [
            'name' => 'Premium Wireless Headphones',
            'price' => 129.99,
            'description' => 'Experience superior sound quality with our premium wireless headphones. Features active noise cancellation, 30-hour battery life, and premium comfort padding.',
            'image' => 'https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&w=800',
            'brand' => 'AudioTech',
            'color' => 'Matte Black',
            'connectivity' => 'Bluetooth 5.0',
            'batteryLife' => '30 hours',
        ];

        $form = $this->createForm(ProductOrderType::class);
        
        return $this->render('product/index.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
    
   
    #[Route('/cart', name: 'app_cart', methods: ['POST'])]
    public function cart(Request $request): Response
    {
        
        $product = [
            'name' => 'Premium Wireless Headphones',
            'price' => 129.99,
            'description' => 'Experience superior sound quality with our premium wireless headphones. Features active noise cancellation, 30-hour battery life, and premium comfort padding.',
            'image' => 'https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&w=800',
            'brand' => 'AudioTech',
            'color' => 'Matte Black',
            'connectivity' => 'Bluetooth 5.0',
            'batteryLife' => '30 hours',
        ];

        $form = $this->createForm(ProductOrderType::class);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $data = $form->getData();
            
            $colorNames = [
                'black' => 'Matte Black',
                'white' => 'Pearl White',
                'silver' => 'Silver',
            ];
            
            return $this->render('product/cart.html.twig', [
                'product' => $product,
                'quantity' => $data['quantity'],
                'color' => $colorNames[$data['color']] ?? 'Matte Black',
                'total' => $product['price'] * $data['quantity'],
            ]);
        }
        
       
        return $this->redirectToRoute('app_product');
    }
}