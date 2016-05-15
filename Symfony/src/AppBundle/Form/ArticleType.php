<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Form;
use AppBundle\Entity\Categorie;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categories', EntityType::class,
            [
            'class'   => Categorie::class ,
            'choice_label' => 'titre',
            'expanded' => true,
            'multiple' => true,
            'query_builder' => function($er)
                {
                    $qb = $er->createQueryBuilder('c')
                        ->orderBy('c.titre','DESC');
                    return $qb;
                }
            ])

           -> add('titre', Type\TextType::class)
                ->add('contenu', Type\TextareaType::class)
                ->add('auteur', Type\TextType::class)
                ->add('dateCreation', Type\DateType::class)
                 ->add('publication', Type\CheckboxType::class , ['required' => false])
                ->add('image', ImageType::class )
                ->add('submit', Type\SubmitType::class, ['label' => 'Envoyer'])

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Article'
        ));
    }
}
