<?php
/**
 * Created by PhpStorm.
 * User: jndeeham
 * Date: 15/06/16
 * Time: 14:00
 */

namespace SOS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SOS\UserBundle\Form\ActivityType;
use Symfony\Component\HttpFoundation\Request;


class SearchController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = $this->getUser();

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(ActivityType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('SOSUserBundle:User')
            ;

            $listUsers = $repository->findBy(
                array('username'  =>  'gaby')
            );

            return $this->render('SOSUserBundle:Search:list_by_activity.html.twig', array(
                'listUsers' => $listUsers,
                'user'      =>  $user
            ));
        }

        return $this->render('SOSUserBundle:Search:index.html.twig', array(
            'form'    =>  $form->createView()
        ));
    }

    public function listByUserAction()
    {
        $user = $this->getUser();

        return $this->render('@SOSUser/Search/list_by_user.html.twig', array(
            'user'  =>  $user
        ));
    }
}