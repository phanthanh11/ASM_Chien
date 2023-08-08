<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Tacgia;
use App\Entity\Theloai;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType; // Use the correct namespace for TextType
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tacgia', EntityType::class, [
                'class' => Tacgia::class,
                'choice_label' => 'id', // You can use 'id' directly if 'id' is the identifier property of Tacgia
            ])
            ->add('theloai', EntityType::class, [
                'class' => Theloai::class,
                'choice_label' => 'tentheloai',
            ])
            ->add('tieude', TextType::class) // Use the correct TextType import
            ->add('gia', TextType::class) // Use the correct TextType import
            ->add('soluong', TextType::class) // Use the correct TextType import
            ->add('hinhanh', TextType::class); // Use the correct TextType import
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
