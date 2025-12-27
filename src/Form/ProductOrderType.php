<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Range;

class ProductOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantity',
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'max-width: 100px;',
                    'min' => 1,
                    'max' => 10,
                ],
                'data' => 1,
                'constraints' => [
                    new Range([
                        'min' => 1,
                        'max' => 10,
                        'notInRangeMessage' => 'You must order between {{ min }} and {{ max }} items.',
                    ]),
                ],
            ])
            ->add('color', ChoiceType::class, [
                'label' => 'Select Color',
                'choices' => [
                    'Matte Black' => 'black',
                    'Pearl White' => 'white',
                    'Silver' => 'silver',
                ],
                'attr' => [
                    'class' => 'form-select',
                    'style' => 'max-width: 200px;',
                ],
                'data' => 'black',
            ]);
    }

   
}