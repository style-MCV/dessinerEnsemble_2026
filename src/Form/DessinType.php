<?php

namespace App\Form;

use App\Entity\Dessin;
use App\Entity\Technique;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DessinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //construit le formulaire avec chaque attribut de l'entité Dessin
        //j'ajoute les types de champs, les labels et les boutons ajouter et annuler
        $builder
            ->add('titre', TextType::class, ['label' => 'Titre de votre dessin'])
            ->add('image', FileType::class, ['label' => 'Télécharger votre image'])
            ->add('commentaire', TextareaType::class, ['label' => 'Votre commentaire'])
            ->add('dateCreation', null, [
                'widget' => 'single_text',
            ])
            ->add('estValide')
            ->add('auteur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id',
            ])
            ->add('technique', EntityType::class, [
                'class' => Technique::class,
                'choice_label' => 'id',
            ])
            ->add('submitBtn', SubmitType::class, ['label' => 'Ajouter'])
            ->add('deleteBtn', SubmitType::class, ['label' => 'Annuler'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            //cette classe de formulaire est associée à l'entité Dessin
            'data_class' => Dessin::class,
        ]);
    }
}
