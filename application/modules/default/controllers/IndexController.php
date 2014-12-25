<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
//  $q = Doctrine_Query::create()
//          ->from('Square_Model_FamilyMember fm')
//          ->leftJoin('Square_Model_Family f')
//          ->where('f.');
//  $result = $q->fetchArray();
//  var_dump($result);
                
                
    }
    
    public function bbAction()
    {
        $this->view->test = 'test123';
    }
    
        public function jstestAction()
    {
       
    }


}

