<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\Type\NewuserType;
use AppBundle\Entity\Event;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template
     */
    public function indexAction(Request $request)
    {
        $temp_user = new User();

        $form = $this->createForm(new NewuserType(), $temp_user);

        if( $request->isMethod("POST") ){
            $form->handleRequest( $request );

            if( $form->isValid() ){
                $this->getDoctrine()->getManager()->persist($temp_user);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('/');
            }

        }
        return ["form" => $form->createView()];

    }
    

    /**
     * @Route("/login", name="login")
     * @Template
     */
    public function loginAction(Request $request)
    {
        return [];
    }
    
}
