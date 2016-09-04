<?php
/**
 * Created by PhpStorm.
 * User: jndeeham
 * Date: 11/06/16
 * Time: 08:58
 */

namespace SOS\UserBundle\Controller;

use SOS\UserBundle\Form\UserEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function showAction()
    {
        $user = $this->getUser();

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('SOSUserBundle:Profile:show.html.twig', array(
            'user'  =>  $user
        ));
    }

    public function editAction(Request $request)
    {
        $user = $this->getUser();

        $form = $this->createForm(UserEditType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'notice',
                'Vos informations ont été mofifiés.'
            );

            return $this->redirectToRoute('sos_user_profile_show');
        }

        return $this->render('SOSUserBundle:Profile:edit.html.twig', array(
            'user'  =>  $user,
            'form'  =>  $form->createView()
        ));
    }
}