<?php declare(strict_types=1);

namespace App\Form;

use App\Dto\RandomStringDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RandomStringType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('length', IntegerType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Random Text Length']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => RandomStringDto::class,
        ));
    }
}
