<?php

class StaticContentController extends Zend_Controller_Action
{
    
    public function preDispatch() {
//        Zend_Debug::dump($this->getRequest()->getParam('page'));
//        die();
        
        $page = $this->getRequest()->getParam('page');

        //chek if user is authenticated
        if(!Zend_Auth::getInstance()->hasIdentity() && $page != 'access'){
            $session = new Zend_Session_Namespace('wedding.auth');
            $session->requestURL = $url;
            $this->_redirect('/access');
        }
                
    }
    
    public function init() {
        
    }
    
    //display static views
    public function displayAction() {
        $page = $this->getRequest()->getParam('page');
        //die(Zend_Debug::dump($this->view->getScriptPath(null) . '/' . $this->getRequest()->getControllerName() . '/$page.' . $this->viewSuffix ));
        if(file_exists($this->view->getScriptPath(null) . '/' . $this->getRequest()->getControllerName() . '/' . $page. '.' . $this->viewSuffix )){
            $this->render($page);
        }else{
            throw new Zend_Controller_Action_Exception('Page Not Found!', 404);
        }
    }
}