<?php
/**
 * Created by PhpStorm.
 * User: jndeeham
 * Date: 15/06/16
 * Time: 12:19
 */

namespace SOS\UserBundle\Controller;

use SOS\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends Controller
{
    public function showAction()
    {
        $user = $this->getUser();

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('SOSUserBundle:Account:show.html.twig', array(
            'user'  =>  $user
        ));
    }

    public function editAction(Request $request)
    {
        $user = $this->getUser();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'notice',
                'Vos informations ont été mofifiés.'
            );

            return $this->redirectToRoute('sos_user_account_show');
        }


        return $this->render('SOSUserBundle:Account:edit.html.twig', array(
            'user'  =>  $user,
            'form'  =>  $form->createView()
        ));
    }
}