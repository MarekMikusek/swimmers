<?php

namespace Swimmers\Controller;

use Swimmers\Controller\AbstractSwimmersController;

class SwimmersController extends AbstractSwimmersController
{

    public function getListOfSwimmersByCategory($isProfessional)
    {
        return $this->getEntityManager()->getRepository('Swimmers\Model\Swimmer')->findBy(['isProfessional'=>$isProfessional]);

    }
    public function indexAction()
    {
        $allAmateurs = $this->getListOfSwimmersByCategory(false);
        $allProfessionals = $this->getListOfSwimmersByCategory(true);
        $isListAmateursFull = count($allAmateurs) >= 5;
        $isListProfessionalsFull = count($allProfessionals) >= 5;
        $isAuthenticated = true;
        return [
            'allAmateurs' => $allAmateurs,
            'allProfessionals' => $allProfessionals,
            'isListAmateursFull' => $isListAmateursFull,
            'isListProfessionalsFull' => $isListProfessionalsFull,
            'isAuthenticated' => $isAuthenticated
        ];
    }

    public function addAction()
    {
        $form = $this->createForm('Swimmers\Form\SwimmerForm');
        $form->get('submit')->setValue('Dodaj');
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                /** @var Swimmer $swimmer */
                $swimmer = $form->getData();
                if (count($this->getListOfSwimmersByCategory((int)$swimmer->getIsProfessional()))>5){
                    return $this->redirect()->toRoute('swimmers',['action'=>'showErrorMessage']);
                }
                $swimmersService = $this->getServiceLocator()->get('SwimmersService');
                $swimmersService->insertData($swimmer);
                return $this->redirect()->toRoute('swimmers', ['action' => 'index']);
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('swimmers', [
                'action' => 'add',
            ]);
        }
        $form = $this->createForm('Swimmers\Form\SwimmerForm');
        try {
            $swimmer = $this->getEntityManager()->getRepository('Swimmers\Model\Swimmer')->find($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('swimmers');
        }
//        var_dump($form);
//        die();
        $form->bind($swimmer);
        $form->get('submit')->setAttribute('value', 'Zapisz');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('swimmers');
            }
        }
        return [
            'form' => $form,
        ];
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('swimmers');
        }

        $request = $this->getRequest();
        $swimmerToDelete = $this->getEntityManager()->getRepository('Swimmers\Model\Swimmer')->find($id);
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Nie');
            if ($del == 'Tak') {
                $this->deleteData($swimmerToDelete);
                $this->flashMessenger()->addMessage('Usunięto!');
            }
            return $this->redirect()->toRoute('swimmers');
        }
        return [
            'swimmer' => $swimmerToDelete
        ];
    }

    public function showErrorMessageAction()
    {
        return;
    }

}
