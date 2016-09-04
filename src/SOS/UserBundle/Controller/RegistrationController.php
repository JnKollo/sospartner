<?php

namespace SOS\UserBundle\Controller;

use SOS\UserBundle\Form\UserType;
use SOS\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'notice',
                'Félicitations! Le compte a bien été crée. Vous pouvez à présent vous connecter.'
            );

                return $this->redirectToRoute('sos_login');
            }

        return $this->render('SOSUserBundle:Registration:register.html.twig', array(
            'form'  =>  $form->createView()
        ));
    }

}
