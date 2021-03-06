<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\Type\UserType;
use AppBundle\Form\Type\EventType;
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

        $form = $this->createForm(new UserType(), $temp_user);

        if( $request->isMethod("POST") ){
            $form->handleRequest( $request );

            if( $form->isValid() ){
                $temp_user->setEnabled(true);

                $userManager = $this->get('fos_user.user_manager');
                $userManager->updateUser($temp_user, true);
                $temp_user->setRoles(['ROLE_USER']);
                $this->getDoctrine()->getManager()->persist($temp_user);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('homepage');
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

    /**
     * @Route("/events", name="user_events")
     * @Template
     */
    public function eventsAction(Request $request){

        $today = Date("Y-m-d H:i:s");

        $em = $this->getDoctrine()->getManager();

        //Getting past events to display

        $queryBuilderp = $em->getRepository('AppBundle:Event')
            ->createQueryBuilder('u')
            ->where('u.user = :user AND u.date < :today')
            ->setParameters(['user'=> $this->getUser(), 'today' => $today]);
            ;

        $queryp = $queryBuilderp->getQuery();
        $pastevents = $queryp->getResult();

        //Getting future events to display

        $queryBuilderf = $em->getRepository('AppBundle:Event')
            ->createQueryBuilder('u')
            ->where('u.user = :user AND u.date > :today')
            ->setParameters(['user'=> $this->getUser(), 'today' => $today]);
            ;

        $queryf = $queryBuilderf->getQuery();
        $futureevents = $queryf->getResult();

        return ["today" => $today, "pastevents" => $pastevents, "futureevents" => $futureevents];     
    }

    /**
     * @Route("/newevent", name="create_event")
     * @Template
     */
    public function neweventAction(Request $request){
        $temp_event = new Event();
        $temp_event->setUser($this->getUser());

        $form = $this->createForm(new EventType(), $temp_event);

        if( $request->isMethod("POST") ){
            $form->handleRequest( $request );

            if( $form->isValid() ){
                $this->getDoctrine()->getManager()->persist($temp_event);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('user_events');
            }

        }
        return ["form" => $form->createView()];
    }
    
}
