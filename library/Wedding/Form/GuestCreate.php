<?php

class Wedding_Form_GuestCreate extends Zend_Form{
    public function init() {
        //initialise the form
        
        $this->setAction('admin/rsvp/guest/create')
                ->setMethod('post');
        
        //create input text for firstname      
        $firstName = new Zend_Form_Element_Text('firstname');
        $firstName->setLabel('First Name:')
                ->setOptions(array('size' => '35'))
                ->setRequired(true)
                ->addValidator('Regex', false, array(
                    'pattern' => '/^[a-zA-Z]+[A-Za-z\'\-\. ]{1,50}$/'
                    ))
                ->addFilter('HtmlEntities')
                ->addFilter('StringTrim');

        //create input text for last name      
        $lastName = new Zend_Form_Element_Text('lastname');
        $lastName->setLabel('Last Name:')
                ->setOptions(array('size' => '35'));
        
        //create select for family     
        $family = new Zend_Form_Element_Select('fid');
        $family->setLabel('Family:')
                ->setRequired(true)
                ->addValidator('Int')
                ->addValidator(new Zend_Validate_GreaterThan(0))
                ->addFilter('HtmlEntities')
                ->addFilter('StringTrim');
        $family->addMultiOption('0', '- Please select -');        
        foreach ($this->getFamilies() as $f) {
            $family->addMultiOption($f['fid'],$f['familyname']);
        }
       
        
        //create submit button
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Submit')
                ->setOrder(100)
                ->setOptions(array('class' => 'submit'));
        
        $this->addElement($firstName)
                ->addElement($lastName)
                ->addElement($family);
        
        $this->addElement($submit);
                
    }
    
    public function getFamilies() {
        $q = Doctrine_Query::create()
                ->from('Wedding_Model_Family');
        return $q->fetchArray();
    }
}
