<?php

class Wedding_Form_Login extends Zend_Form{
    public function init() {
        //initialise form
        $this->setAction('/admin/login')
                ->setMethod('post');
        
        //create text input for name
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username')
                ->setOptions(array('size' => 30))
                ->setRequired(true)
                ->addValidator('Alnum')
                ->addFilter('HtmlEntities')
                ->addFilter('StringTrim');
        
        //create text input for password
        $password = new Zend_Form_Element_Text('password');
        
        $password->setLabel('Password')
                ->setOptions(array('size' => 30))
                ->setRequired(true)
                ->addFilter('HtmlEntities')
                ->addFilter('StringTrim');
        
        //create submit button
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Submit')
                ->setOptions(array('class' => 'submit'));
        
        //attach new elements to form
        $this->addElement($username)
               ->addElement($password)
                ->addElement($submit);
    }
}