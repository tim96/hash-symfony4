<?php declare(strict_types=1);

namespace App\Form;

use App\Dto\PasswordGenerateDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordGenerateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('count', IntegerType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Count']
        ])
        ->add('length', IntegerType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Password Length']
        ])
        ->add('usingChars', CheckboxType::class, ['required' => false,
            'attr' => ['class' => 'form-control', 'placeholder' => 'Using chars', 'style' => 'max-width: 100px']
        ])
        ->add('usingSpecialChars', CheckboxType::class, ['required' => false,
            'attr' => [
                'class' => 'form-control', 'placeholder' => 'Using special chars',
                'style' => 'max-width: 100px',
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PasswordGenerateDto::class,
        ));
    }
}
