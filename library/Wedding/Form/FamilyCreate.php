<?php

class Wedding_Form_FamilyCreate extends Zend_Form{
    public function init() {
        //initialise the form
        
        $this->setAction('admin/rsvp/family/create')
                ->setMethod('post');
        
        //create input text for familyname      
        $familyName = new Zend_Form_Element_Text('familyname');
        $familyName->setLabel('Family Name:')
                ->setOptions(array('size' => '35'))
                ->setRequired(true)
                ->addFilter('HtmlEntities')
                ->addFilter('StringTrim');

        //create input text for email     
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email:')
                ->setRequired(true)
                ->addValidator('NotEmpty', true)
                ->addValidator('EmailAddress', true)
                ->addFilter('HtmlEntities')
                ->addFilter('StringToLower')
                ->addFilter('StringTrim');
        
        //create input text for code      
        $code = new Zend_Form_Element_Text('code');
        $code->setLabel('Code:')
                ->setRequired(true)
                ->addFilter('HtmlEntities')
                ->addFilter('StringTrim');
           
        
        //create submit button
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Submit')
                ->setOrder(100)
                ->setOptions(array('class' => 'submit'));
        
        $this->addElement($familyName)
                ->addElement($email)
                ->addElement($code);
        
        $this->addElement($submit);
                
    }
    
}
