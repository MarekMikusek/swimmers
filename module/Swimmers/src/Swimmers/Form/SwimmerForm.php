<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 29.03.16
 * Time: 22:29
 */

namespace Swimmers\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class SwimmerForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;
    public function __construct($name = NULL)
    {
        parent::__construct('swimmer');
    }

    public function init()
    {
        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);

        $this->add([
            'name' => 'firstName',
            'type' => 'text',
            'options' => [
                'label' => 'Imię'
            ]
        ]);

        $this->add([
            'name' => 'lastName',
            'type' => 'text',
            'options' => [
                'label' => 'Nazwisko'
            ]
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'email'
            ]
        ]);

        $this->add([
            'name' => 'address',
            'type' => 'text',
            'options' => [
                'label' => 'Adres'
            ]
        ]);

        $this->add([
            'name' => 'age',
            'type' => 'number',
            'options' => [
                'label' => 'Wiek'
            ]
        ]);

        $this->add([
            'name' => 'isProfessional',
            'type' => 'Zend\Form\Element\Checkbox',
            'options' => [
                'label' => 'Czy jesteś zawodnikiem profesjonalnym?',
                'use_hidden_element' => true,
                'checked_value' => 1,
                'unchecked_value' => 0
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'OK',
                'id' => 'submitbutton',
            ],
        ]);

    }

    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager()
    {
        return $this->objectManager;
    }


}