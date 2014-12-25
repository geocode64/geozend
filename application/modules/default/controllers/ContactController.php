<?php

class ContactController extends Zend_Controller_Action
{
    public function init() {
        $this->view->doctype('XHTML1_STRICT');
    }
    
    public function indexAction() 
    {
        $form = new Wedding_Form_Contact();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){
                
//                 $config = array(
//                     'ssl' => 'tls',
//                      'port' => 587,
//                'auth' => 'login',
//                'username' => 'sliiiiiide@gmail.com',
//                'password' => 'roger__*')
//                ;
//
//    $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
//
//    Zend_Debug::dump($transport);               
                
                
                
                $values = $form->getValues();
                $mail = new Zend_Mail();
                $mail->setBodyText($values['message']);
                $mail->setFrom('george@eartown.com',$values['name']);
                $mail->addTo('sliiiiiide@gmail.com');
                $mail->setSubject('Contact form submission');
                $mail->send();
                $this->_helper->getHelper('FlashMessenger')
                       ->addMessage('Thank you. Your message was successfully sent to ' . $values['email']);
                $this->_redirect('/contact/success');
            }
        }
    }
    
    public function successAction() 
    {
        if($this->_helper->getHelper('FlashMessenger')->getMessages()){
            $this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
        }else{
            $this->_redirect('/');
        }
    }
}