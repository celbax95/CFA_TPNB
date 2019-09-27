<?php


namespace App\Form;


use App\DTO\AddAnnoucement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddAnnoucementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class, [
                'required' => false,
                'label' => 'add.title',
                'translation_domain' => 'pages',
                'attr' => [
                    'class' => 'addForm_Title'
                ]
            ])
            ->add('price', MoneyType::class, [
                'required' => false,
                'label' => 'add.price',
                'translation_domain' => 'pages',
                'currency' => false,
                'attr' => [
                    'class' => 'addForm_Price'
                ]
            ])
            ->add('content', TextareaType::class, [
                'required' => false,
                'label' => 'add.content',
                'translation_domain' => 'pages',
                'attr' => [
                    'class' => 'addForm_Content'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>AddAnnoucement::class
        ]);
    }
}