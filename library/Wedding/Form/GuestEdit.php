<?php

class Wedding_Form_GuestEdit extends Wedding_Form_GuestCreate{
    
    public function init(){
        parent::init();
        
        //set form action (set to false for current URL)
        $this->setAction(false);
        
        //create hidden input  for item ID
        $gid = new Zend_Form_Element_Hidden('gid');
        $gid->addValidator('Int')
                ->addFilter('HtmlEntities')
                ->addFilter('StringTrim');
        
        $rsvp = new Zend_Form_Element_Select('rsvp');
        $rsvp->addMultiOption('noresponse', 'No Response')
                ->addMultiOption('attending', 'Attending')
                ->addMultiOption('notattending','Not Attending')
                ->setLabel('RSVP');
                
        $this->addElement($gid)
                ->addElement($rsvp);    
    }
}
