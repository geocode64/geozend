<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initDoctrine() {
        require_once 'Doctrine/Doctrine.php';
        $this->getApplication()
                ->getAutoloader()
                ->pushAutoloader(array('Doctrine', 'autoload'), 'Doctrine');
        $manager = Doctrine_Manager::getInstance();
        $manager->setAttribute(
                Doctrine::ATTR_MODEL_LOADING, Doctrine::MODEL_LOADING_CONSERVATIVE
        );
        $config = $this->getOption('doctrine');
        $conn = Doctrine_Manager::connection($config['dsn'], 'doctrine');
        return $conn;
    }
    
//    protected function _initMail(){
//        try {
//            $config = array(
//                'auth' => 'login',
//                'username' => 'sliiiiiide@gmail.com',
//                'password' => 'roger__*',
//                'ssl' => 'tls',
//                'port' => 587
//            );
//
//            $mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
//            Zend_Mail::setDefaultTransport($mailTransport);
//        } catch (Zend_Exception $e){
//            echo "mail fail";
//        }
//    }

}
