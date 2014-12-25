<?php
class Rsvp_AdminFamilyController extends Zend_Controller_Action{
    //action to handle admin URLS
    public function preDispatch() {
        //check URL for /admin pattern
        //set admin layout
        
        $url = $this->getRequest()->getRequestUri();
        $this->_helper->layout->setLayout('admin');
        
        //chek if user is authenticated
        if(!Zend_Auth::getInstance()->hasIdentity()){
            $session = new Zend_Session_Namespace('wedding.auth');
            $session->requestURL = $url;
            $this->_redirect('/access');
        }
                
    }
    

    public function createAction() {
        //generate input form

        $form = new Wedding_Form_FamilyCreate;
        $this->view->form = $form;

        //test for valid input
        //if valid, populate model
        //assign default values for some fields
        //save to db

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){
                $family = new Wedding_Model_Family;
                $family->fromArray($form->getValues());
                $family->save();

                $fid = $guest->fid;

                $this->_helper->getHelper('FlashMessenger')->addMessage(
                        'Your have successfuly added a new family with #fid ' . $fid);
                $this->_redirect('/admin/rsvp/family/success');
            }
        }
    }
    
    
    //acttion to display list of guests
    public function indexAction(){
$q = Doctrine_Query::create()
               ->from('Wedding_Model_Family f')
               ->leftJoin('f.Wedding_Model_Guest g');
       $result = $q->fetchArray();
       
       $this->view->records = $result;
    }
    
    
    
    public function deleteAction() {
        //set filters and validators for post input
        
        $filters = array(
            'id' => array('HtmlEntities', 'StripTags', 'StringTrim')
        );
        
        $validators = array(
            'id' => array('NotEmpty', 'Int')
        );
        
        $input = new Zend_Filter_Input($filters,$validators);
        $input->setData($this->getRequest()->getParams());
        
        
        //test if input is valid
        //read array of record identifiers
        //delete records from database
        
        if($input->isValid() && !empty($input->id)){
            $q = Doctrine_Query::create()
                    ->delete('Wedding_Model_Family f')
                    ->whereIn('f.fid', $input->id);
            $result = $q->execute();
            
            $this->_helper->getHelper('FlashMessenger')
                    ->addMessage('The family was successfully deleted.');
            $this->redirect('/admin/rsvp/family/success');
        }else{
            throw new Zend_Controller_Action_Exception('Invalid Input');
        }
    }
    
    
    //success action
    public function successAction() {
        if($this->_helper->getHelper('FlashMessenger')->getMessages()){
            $this->view->messages = $this->_helper
                    ->getHelper('FlashMessenger')->getMessages();
        }else{
            $this->_redirect('/admin/rsvp/family/index');
        }
    }
    
    
    //export action
    public function exportAction(){
       $q = Doctrine_Query::create()
       ->from('Wedding_Model_Family f');
       $result = $q->fetchArray();
       $this->view->records = $result;
        
    }
    
}