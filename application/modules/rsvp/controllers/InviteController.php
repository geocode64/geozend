<?php
use PHPImageWorkshop\ImageWorkshop; // Use the namespace of ImageWorkshop
require_once('ImageWorkshop/src/PHPImageWorkshop/ImageWorkshop.php');
        
class Rsvp_InviteController extends Zend_Controller_Action{
  
     public function preDispatch() {
         $this->_helper->layout()->disableLayout(); 
       
                
    }
    
    public function init(){
        
    }
    
    public function indexAction() {
        
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
                
                $this->view->fid = $input->id;
                $this->view->code =  $result[0]['Wedding_Model_Family']['code'];
                
                
                foreach ($result as $guest) {
                    
                    if($guest['gid'] == $result[0]['Wedding_Model_Family']['primary_contact']){
                        $this->view->name = $guest['firstname'];
                    }
                }
                
            }

            
        }else{
            throw new Zend_Controller_Action_Exception('Invalid Input');
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
    
    
}