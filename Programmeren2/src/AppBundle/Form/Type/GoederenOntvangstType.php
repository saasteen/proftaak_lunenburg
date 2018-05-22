<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

//EntiteitType vervangen door b.v. KlantType
class GoederenOntvangstType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
            ->add('ArtikelNr', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('NaamLeverancier', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('Omschrijving', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('datum', DateTimeType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('Kwaliteit', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('hoeveelheid', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
;
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Goederenontvangst', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
