<?php
class LoginController extends Zend_Controller_Action{
    public function init() {
        $this->_helper->layout->setLayout('admin');
    }
    
    //login action
    public function loginAction() {
        $form = new Wedding_Form_Login();
        $this->view->form = $form;
        
        
        //check for valid input
        //authenticate using adaptor
        //persost user record to sesssion
        //redirect to original reques URL if present
        if($form->isValid($this->getRequest()->getPost())){
            $values = $form->getValues();
            
            $adapter = new Wedding_Auth_Adapter_Doctrine(
                    $values['username'], $values['password']
                    );
            $auth = Zend_Auth::getInstance();
            
            $result = $auth->authenticate($adapter);
            
            if($result->isValid()){
                
                $session = new Zend_Session_Namespace('square.auth');
                $session->user = $adapter->getResultArray('Password');
                if(isset($session->requestURL)){
                    $url = $session->requestURL;
                    unset($session->requestURL);
                    $this->_redirect($url);
                }else{
                    $this->_helper->getHelper('FlashMessenger')
                            ->addMessage('You were succesfully logged in.');
                    $this->_redirect('/admin/login/success');
                }
            }else{
                $this->view->message = 
                        'You could not be logged in. Please try again.';
            }
        }
    }
    
    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::destroy();
        $this->redirect('/access');
    }
    
    public function successAction() {
        if($this->_helper->getHelper('FlashMessenger')->getMessages()){
            $this->view->messages = $this->_helper
                    ->getHelper('FlashMessenger')
                    ->getMessages();
        }else{
            $this->redirect('/');
        }
    }
}