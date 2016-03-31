<?php

namespace Swimmers\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;

class AbstractSwimmersController extends AbstractActionController
{
    /**
     * @param $entity
     * @return Form
     */
    public function createForm($entity)
    {
        $sl = $this->getServiceLocator();
        $form = $sl->get('FormElementManager')->get($entity);
        return $form;
    }

    public function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
}