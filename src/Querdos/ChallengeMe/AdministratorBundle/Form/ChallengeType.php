<?php
/**
 * Created by Hamza ESSAYEGH.
 * User: querdos
 * Date: 28/02/17
 * Time: 13:40
 */

namespace Querdos\ChallengeMe\AdministratorBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChallengeType extends AbstractType
{
    const LEVELS = array(
        'Very easy',
        'Easy',
        'Medium',
        'Hard',
        'Very hard'
    );
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Title',
                'label_attr' => array(
                    'class'     => 'control-label col-md-3 col-sm-3 col-xs-12'
                ),
                'attr' => array(
                    'class'     => 'form-control col-md-7 col-xs-12'
                ),
                'required'  => true,
                'translation_domain' => 'forms'
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description',
                'label_attr' => array(
                    'class'     => 'control-label col-md-3 col-sm-3 col-xs-12'
                ),
                'attr' => array(
                    'class'     => 'form-control col-md-7 col-xs-12'
                ),
                'required'  => true,
                'translation_domain' => 'forms'
            ))
            ->add('points', IntegerType::class, array(
                'label' => 'Points',
                'label_attr' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                ),
                'attr' => array(
                    'class' => 'form-control col-md-7 col-xs-12',
                    'data-validate-minmax' => '0,100'
                ),
                'required' => true,
                'translation_domain' => 'forms'
            ))
            ->add('level', ChoiceType::class, array(
                'label'         => 'Level',
                'label_attr'    => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                ),
                'attr'  => array(
                    'class' => 'form-control'
                ),
                'choices' => array(
                    'Very Easy' => 1,
                    'Easy'      => 2,
                    'Medium'    => 3,
                    'Hard'      => 4,
                    'Very Hard' => 5
                ),
                'required' => true,
                'translation_domain' => 'forms'
            ))
            ->add('statement', CKEditorType::class, array(
                'label' => 'Statement',
                'label_attr' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                ),
                'config_name' => 'config_challenge'
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class'        => 'Querdos\ChallengeMe\ChallengesBundle\Entity\Challenge',
                'csrf_protection'   => true,
                'csrf_field_name'   => '_token',
                'csrf_token_id'     => 'administrator_token'
            ))
            ->setRequired(
                'create'
            )
        ;
    }
}