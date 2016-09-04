<?php

namespace SOS\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\Request;
use SOS\UserBundle\Form\Type\GenderType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class UserEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $user_edit = $event->getData();
            $form = $event->getForm();

            if (null === $user_edit) {
                return;
            }
            $request = Request::createFromGlobals();

            $uri = $request->getPathInfo();
            if ('/profile/edit' === $uri) {
                $form->add('firstname',      TextType::class, array(
                    'required'      =>  false
                ))
                    ->add('lastname',       TextType::class, array(
                    'required'      =>  false
                ))
                    ->add('birthdate',       DateType::class, array(
                        'required'      =>  false
                    ))
                    ->add('sex',            GenderType::class, array(
                        'required'      =>  false,
                        'placeholder'   =>  'Choisir le sexe',
                    ))
                    ->add('address',        TextType::class, array(
                        'required'      =>  false
                    ))
                    ->add('city',           TextType::class, array(
                        'required'      =>  false
                    ))
                    ->add('zipCode',        TextType::class, array(
                        'required'      =>  false
                    ))
                    ->add('phone',          TextType::class, array(
                        'required'      =>  false
                    ))

                ;
            }else if ('/sport/edit/availability' === $uri) {
                $form->add('availability',     CollectionType::class, array(
                    'required'      =>  false,
                    'entry_type'    =>  AvailabilityType::class,
                        'allow_add'     =>  true,
                        'allow_delete'  =>  true
                    ))
                ;
            } else if ('/sport/edit/activity' === $uri) {
                $form->add('activities',     CollectionType::class, array(
                    'required'      =>  false,
                    'entry_type'    =>  ActivityType::class,
                    'allow_add'     =>  true,
                    'allow_delete'  =>  true
                ))
                ;
            }

        }
        );
    }


}
