<?php
use PHPImageWorkshop\ImageWorkshop; // Use the namespace of ImageWorkshop
require_once('ImageWorkshop/src/PHPImageWorkshop/ImageWorkshop.php');
        
class Rsvp_GuestController extends Zend_Controller_Action{
    
    public function preDispatch() {
        
        //chek if user is authenticated
        if(!Zend_Auth::getInstance()->hasIdentity()){
            $session = new Zend_Session_Namespace('wedding.auth');
            $session->requestURL = $url;
            $this->_redirect('/access');
        }
                
    }
    
    public function init(){
        
    }
    
    //action to display faily member
    public function displayAction() {
        $filters = array(
            'id' => array('HtmlEntities', 'StripTags', 'StringTrim')
        );
        $validators = array(
            'id' => array('NotEmpty', 'Int')
        );
        
        //test if input is valid
        //retrieve requested record
        //attach to view
        
        $input = new Zend_Filter_Input($filters, $validators);
        $input->setData($this->getRequest()->getParams());
        
        if ($input->isValid()){
            $q = Doctrine_Query::create()
                    ->from('Wedding_Model_Guest g')
                    ->leftJoin('g.Wedding_Model_Family f')
                    ->where('g.gid = ?', $input->id);
            
            $result = $q->fetchArray();
            
            if(count($result) == 1){
                $this->view->guest = $result[0];
            }else{
                throw new Zend_Controller_Action_Exception('Page Not Found', 404);
            }
        }else{
            throw new Zend_Controller_Action_Exception('Invalid Input');
        }
    }  
    
    public function updateAction() {
        
        //set filters and valildators for POST input
        $filters = array(
            'ids' => array('HtmlEntities', 'StripTags', 'StringTrim'),
            'names' => array('HtmlEntities', 'StripTags', 'StringTrim'),
            'rsvp' => array('HtmlEntities', 'StripTags', 'StringTrim'),
            'message' => array()
        );
        $validators = array(
            'ids' => array('NotEmpty', 'Int'),
            'names' => array('NotEmpty'),
            'rsvp' => array('NotEmpty'),
            'message' => array()
        );
        
        $input = new Zend_Filter_Input($filters, null);
        $values = $this->getRequest()->getPost();

        $input->setData($values);
       
        //test if input is valid
        //read array of record identifiers
        //update records
        if($input->isValid()){
            
            
            foreach($input->rsvp as $k => $v){
                
                $q = Doctrine_Query::create()
                        ->update('Wedding_Model_Guest g')
                        ->set('g.rsvp', '?', $v)
                        ->addWhere('g.gid = ?', $k);
                
                $result = $q->execute();
                
                $message .= $input->names[$k] . " is " . $v . "\r\n";
            }
            //$message .= "Message: ";
//            $message = "Contact Email:";
//            $mail = new Zend_Mail();
//            $mail->setBodyText($message);
//            $mail->setFrom('george@eartown.com','Wedding website');
//            $mail->addTo('sliiiiiide@gmail.com');
//            $mail->setSubject('RSVP');
//            $mail->send();
            
//            mail('sliiiiiide@gmail.com', 'My Subject', 'test', 'george@eartown.com');
       
            $this->_helper->getHelper('FlashMessenger')
                    ->addMessage('Thank you for RSVPing.');
            $this->_redirect('/rsvp/guest/success');
                    
            
        }else{
            throw new Zend_Controller_Action_Exception('Invalid input');
        }
        
    }
    
    public function imageAction() {
        
         $filters = array(
            'id' => array('HtmlEntities', 'StripTags', 'StringTrim')
        );
        $validators = array(
            'id' => array('NotEmpty', 'Int')
        );
        
        $input = new Zend_Filter_Input($filters, $validators);
        $input->setData($this->getRequest()->getParams());

        

        
        if ($input->isValid()){
            $q = Doctrine_Query::create()
                    ->from('Wedding_Model_Guest g')
                    ->leftJoin('g.Wedding_Model_Family f')
                    ->where('g.fid = ?', $input->id);
            
            $result = $q->fetchArray();
           
            
            if(count($result) > 0){

                if(count($result) == 1){
                    $formatted = $result[0]['firstname'];
                }else{
                    $formatted = $this->arrangeNames($result);
                }
            }

            
        }else{
            throw new Zend_Controller_Action_Exception('Invalid Input');
        }
        
        $envelope = ImageWorkshop::initFromPath(APPLICATION_PATH .'/../private/envelope.jpg');

 
    // This is the text layer
    $textLayer = ImageWorkshop::initTextLayer($formatted, APPLICATION_PATH .'/../private/TalkingToTheMoon.ttf', 26, '000000', 0);

    // We add the text layer 12px from the Left and 12px from the Bottom ("LB") of the norway layer:
    $envelope->addLayerOnTop($textLayer, 170, 222, "LB");

    $image = $envelope->getResult();

    
    header('Content-type: image/jpeg');
    imagejpeg($image, null, 95); // We chose to show a JPG with a quality of 95%
    exit;
    }
    
    
    public function respondAction() {

      
        $filters = array(
            'step' => array('HtmlEntities', 'StripTags', 'StringTrim')
        );
        $validators = array(
            'step' => array('NotEmpty', 'Int')
        );
        
        //test if input is valid
        //retrieve requested records
        //attach to view
        
        $input = new Zend_Filter_Input($filters, $validators);
        $input->setData($this->getRequest()->getParams());

        $identity = Zend_Auth::getInstance()->getIdentity();

        
        if ($input->isValid()){
            $q = Doctrine_Query::create()
                    ->from('Wedding_Model_Guest g')
                    ->leftJoin('g.Wedding_Model_Family f')
                    ->where('g.fid = ?', $identity);
            
            $result = $q->fetchArray();
                      
            
            
                if(count($result) > 0){

                    if(count($result) == 1){
                        $formatted = $result[0]['firstname'];
                    }else{
                        $formatted = $this->arrangeNames($result);
                    }
                    $this->view->names = $formatted;
                    $this->view->guests = $result;
                    $this->view->email = $result[0]['Wedding_Model_Family']['code'];

                    if($input->step == 1){
                        $this->renderScript( 'guest/respond1.phtml' );
                        return;
                    }elseif($input->step == 2){
                        $this->renderScript( 'guest/respond2.phtml' );
                        return;
                    }else{
                         throw new Zend_Controller_Action_Exception('Page Not Found 44', 404);
                    }
                }

            
        }else{
            throw new Zend_Controller_Action_Exception('Invalid Input');
        }
    }
    
    public function arrangeNames($result = array()){
        
        usort($result, function($a, $b) {
            return strlen($b['email']) - strlen($a['email']);
        });
        
        
        
        foreach($result as $g){
            $firstnames[] = $g['firstname'];
        }
        $lastFirstname = array_pop($firstnames);
        $formatted = implode(', ', $firstnames) . ' and ' .$lastFirstname;  
        return $formatted;
    }
    
    public function createAction() {
    
        //generate input form
        
        $form = new Wedding_Form_GuestCreate;
        $this->view->form = $form;
        
        //test for valid input
        //if valid, populate model
        //assign default values for some fields
        //save to db
        
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){
                $guest = new Wedding_Model_Guest;
                $guest->fromArray($form->getValues());
                $guest->save();
                
                $gid = $guest->gid;
                
                $this->_helper->getHelper('FlashMessenger')->addMessage(
                        'Your have successfuly added a new guest with #gid ' . $gid);
                $this->_redirect('/rsvp/guest/success');
            }
        }
    }
    
    public function successAction() {
        if($this->_helper->getHelper('FlashMessenger')->getMessages()){
            $this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
            
        }else{
            $this->_redirect('/');
        }
        
    }
}
