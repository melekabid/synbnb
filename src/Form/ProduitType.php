<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\File\File;
class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference')
            ->add('description')
            ->add('tva',ChoiceType::class, [
                'choices' => [
                    '7%' => '7',
                    '19%' => '19',
                ]])
            ->add('img',FileType::class,['mapped' => false,'required' => false]
            )
            ->add('prixdinar',TextType::class,['attr' => ['id'=>'dinartun']])
            ->add('prixdollar')
            ->add('idcategorie', EntityType::class, ['class' => Categorie::class, 'choice_label' => 'nomcategorie'])
            ->add('tauxdechange')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class
        ]);
    }
}
