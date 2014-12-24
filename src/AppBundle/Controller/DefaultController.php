<?php

namespace AppBundle\Controller;

use Doctrine\Common\Annotations\AnnotationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $pomm = $this->get("pomm")['db'];
        $usersModel = $pomm->getModel('Model\Db\PublicSchema\UsersModel');
        $users = $usersModel->findAll();

        $serializer = $this->get('jms_serializer');

        /**
         * This would do, because  all data is pulled into an array of arrays.
         * But without further in depth processing, it would expose the users passwords.
         */
//        $data = $serializer->serialize($users->extract(), 'json');


        /**
         * This won't work, $users is of type ResultIterator and therefor can not
         * be annotated to exclude (or expose) properties.
         *
         * @throws  AnnotationException ::semanticalError
         *
         * @see http://jmsyst.com/libs/serializer/master/cookbook/exclusion_strategies
         */
        $data = $serializer->serialize($users, 'json');


        /**
         * This could work, if extract would return an array of
         * FlexibleEntity instances Model\Db\PublicSchema\Users[]
         *
         * $userCollection simulates this
         */
        $userCollection = array();
        foreach ($users as $user) {
            $userCollection[] = $user;
        }
        $data = $serializer->serialize($userCollection, 'json');


        return $this->render('default/index.html.twig', ['data' => $data]);
    }
}
