<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class bestelOpdrachtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('artikelnummer', IntegerType::class)
        ;
        $builder
            ->add('bestelnummer', IntegerType::class)
        ;
        $builder
            ->add('leveranciernaam', TextType::class)
        ;
        $builder
            ->add('aantal', IntegerType::class)
        ;
        $builder
            ->add('beschrijving', TextType::class)
        ;

    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\bestelOpdracht',
		));
	}
}

?>
