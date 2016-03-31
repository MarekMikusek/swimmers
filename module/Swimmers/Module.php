<?php
namespace Swimmers;

use Swimmers\Form\SwimmerForm;
use Swimmers\Model\Swimmer;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Zend\Authentication\AuthenticationService' => function ($serviceManager) {
                    // If you are using DoctrineORMModule:
                    return $serviceManager->get('doctrine.authenticationservice.orm_default');
                },

            ),
            'invokables' => [
                'SwimmersService'=>'Swimmers\Service\SwimmersService'
            ]
        );
    }

    public function getFormElementConfig()
    {
        return [
            'factories' => [
                'Swimmers\Form\SwimmerForm' => function ($sm) {
                    $sl = $sm->getServiceLocator();
                    $objectManager = $sl->get('Doctrine\ORM\EntityManager');

                    $form = new SwimmerForm();
                    $form->setHydrator(new DoctrineHydrator($objectManager))
                        ->setObject(new Swimmer());
                    return $form;
                },
            ]
        ];
    }
}