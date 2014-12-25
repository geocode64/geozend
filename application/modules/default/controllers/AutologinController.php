<?php
class AutologinController extends Zend_Controller_Action{
        public function init() {
    }
    
    public function autologinAction() {
    $filters = array(
            'id' => array('HtmlEntities', 'StripTags', 'StringTrim'),
            'code' => array('HtmlEntities', 'StripTags', 'StringTrim')
        );
        $validators = array(
            'id' => array('NotEmpty'),
            'code' => array('NotEmpty')
        );
        
        $input = new Zend_Filter_Input($filters, $validators);
        $input->setData($this->getRequest()->getParams());
        
        if ($input->isValid()){
            $adapter = new Wedding_Auth_Adapter_Doctrine(
                    $input->id, $input->code
                    );
            $auth = Zend_Auth::getInstance();
            
            $result = $auth->authenticate($adapter);
            
            if($result->isValid()){
                
                $session = new Zend_Session_Namespace('square.auth');
                $session->user = $adapter->getResultArray('code');
                if(isset($session->requestURL)){
                    $url = $session->requestURL;
                    unset($session->requestURL);
                    $this->_redirect($url);
                }else{
                    $this->_helper->getHelper('FlashMessenger')
                            ->addMessage('You were succesfully logged in.');
                    $this->_redirect('rsvp/guest/respond/1');
                }
            }else{
                $this->view->message = 
                        'You could not be logged in. Please try again.';
            }
            
            
        }
        
    }
}
