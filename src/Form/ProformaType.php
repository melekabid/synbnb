<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Proforma;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProformaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idclient')
            ->add('products', EntityType::class, [
                'class' => Produit::class,
                'multiple' => true,
                'choice_label' => 'reference',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.reference', 'ASC');
                },
                'by_reference' => false,
                'attr' => [
                    'class' => 'select-tags'
                ]
            ])
            ->add('choix', ChoiceType::class, [
                'choices' => [
                    'prix HT TND' => '1',
                    'prix TTC TND' => '2',
                    'prix Dollar CIF' => '3',
                    'prix Dollar FOB' => '4',
                    'Moules' => '5',

                ]])
            ->add('delaidelivraison')
            ->add('garantie')
            ->add('modalite')
            ->add('validite')
            ->add('titre')
            ->add('Enregistrer', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proforma::class,
        ]);
    }
}
