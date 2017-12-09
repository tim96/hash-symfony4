<?php declare(strict_types=1);

namespace App\Form;

use App\Dto\Base64Dto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Base64Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // todo: add translation library
        $builder->add('text', TextareaType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Text']
        ])
        ->add('select', ChoiceType::class, [
            'choices'  => Base64Dto::selectChoices(), 'required' => true,
            'attr' => ['class' => 'form-control', 'placeholder' => 'Choose an option'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Base64Dto::class,
        ));
    }
}
