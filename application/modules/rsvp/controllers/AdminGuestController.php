<?php
class Rsvp_AdminGuestController extends Zend_Controller_Action{
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
    
    public function importAction() {
        
        $file = "C:\\xampp\htdocs\geozend\private\guests.tsv";
        //$file = APPLICATION_PATH . "/../private/guests.tsv";

        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                $families[$data[3]][] = $data;                
            }
            fclose($handle);
        }
        
       
       foreach($families as $family){
            $family_processed = array();
            foreach ($family as $familymember){
               $family_processed['names'][] = $familymember[1];               
               $family_processed['famcat'] = $familymember[0];
           };
            
           
           $famdb = new Wedding_Model_Family;
           $famdb->code = $this->familyCode();
           $famdb->famcat = trim($family_processed['famcat']);
           $famdb->save();

           $fid = $famdb->fid;
           
          
           foreach ($family as $familymember){
                $guestdb = new Wedding_Model_Guest;
                $guestdb->fid = $fid;
                $guestdb->firstname = trim($familymember[1]);
                $guestdb->lastname = trim($familymember[2]);
                $guestdb->email = trim($familymember[4]);
                $guestdb->save();
                
                if($guestdb->email){
                    $primaryContact = $guestdb->gid;
                }
           }
           
           //update primary_contact on family table
           $famdb2 = Doctrine::getTable('Wedding_Model_Family')
                            ->find($fid);
           $famdb2->primary_contact = $primaryContact;
           $famdb2->save();
           
           
       };
        $this->_redirect('/admin/rsvp/guest/index');
    }
    
    public function familyOrder($family){
        
        
    }
    
    
    public function familyCode() {
        // Character List to Pick from
        $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$-_';

        // Minimum/Maximum times to repeat character List to seed from
        $chrRepeatMin = 1; // Minimum times to repeat the seed string
        $chrRepeatMax = 10; // Maximum times to repeat the seed string

        // Length of Random String returned
        $chrRandomLength = 20;

        // The ONE LINE random command with the above variables.
        return substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))),1,$chrRandomLength);
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
                $this->_redirect('/admin/rsvp/guest/success');
            }
        }
    }   
    
    public function editAction() {
        //generate input form

        $form = new Wedding_Form_GuestEdit;
        $this->view->form = $form;

        //test for valid input
        //if valid, populate model
        //assign default values for some fields
        //save to db

        if($this->getRequest()->isPost()){
            //if POST request 
            //test if input is valid
            //retrieve current record
            //update values and replace in db
            if($form->isValid($this->getRequest()->getPost())){
                $postData = $this->getRequest()->getPost();
                if($form->isValid($postData)){
                    $input = $form->getValues();
                    $guest = Doctrine::getTable('Wedding_Model_Guest')
                            ->find($input['gid']);
                    $guest->fromArray($input);
                    $guest->save();
                    
                    $this->_helper->getHelper('FlashMessenger')->addMessage(
                        'Your have successfuly edited a new guest with #gid ' . $input['gid']);
                    $this->_redirect('/admin/rsvp/guest/success');        
                }
                
            }
        }else{
            //if GET request
            //set filters and validators for GET input
            //test if input is valid
            //retrieve requested record
            //pre-populate form
            
            $filters = array(
                'id' => array('HtmlEntities', 'StripTags','StringTrim')
                );
            $validators = array(
                'id' => array('Int')
            );
            
            $input = new Zend_Filter_Input($filters,$validators);
            
            $input->setData($this->getRequest()->getParams());
            
            if($input->isValid()){
                $q = Doctrine_Query::create()
                        ->from('Wedding_Model_Guest g')
                        ->where('g.gid = ?', $input->id);
                $result = $q->fetchArray();
                //Zend_Debug::dump($result);
                if(count($result == 1)){
                    $this->view->form->populate($result[0]);
                }else{
                    throw new Zend_Controller_Action_Exception('Page Not found', 404);
                }
            }else{
                throw new Zend_Controller_Action_Exception('Invlaid Input');
            }
            
            
        }
    }
    
    
    //acttion to display list of guests
    public function indexAction(){
       $q = Doctrine_Query::create()
               ->from('Wedding_Model_Guest g')
               ->leftJoin('g.Wedding_Model_Family f');
       $result = $q->fetchArray();
       $this->view->records = $result;
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
                    ->delete('Wedding_Model_Guest g')
                    ->whereIn('g.gid', $input->id);
            $result = $q->execute();
            
            $this->_helper->getHelper('FlashMessenger')
                    ->addMessage('The guest was successfully deleted.');
            $this->redirect('/admin/rsvp/guest/success');
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
            $this->_redirect('/admin/rsvp/guest/index');
        }
    }
    
}