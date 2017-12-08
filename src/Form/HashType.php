<?php declare(strict_types=1);

namespace App\Form;

use App\Dto\HashDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HashType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Text']
        ])
        ->add('salt', TextType::class,['required' => false,
            'attr' => ['class' => 'form-control', 'placeholder' => 'Salt']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => HashDto::class,
        ));
    }
}
