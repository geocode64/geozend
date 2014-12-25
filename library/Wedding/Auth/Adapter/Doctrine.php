<?php
class Wedding_Auth_Adapter_Doctrine implements Zend_Auth_Adapter_Interface{
    //array containing authenticated user record
    protected $_resultArray;
    
    //constructor
    //accepts username and password
    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }
    
    //main authentication record
    //queries db for match to authentication credentials
    //returns Zend_Auth_Result with success/failure code
    public function authenticate() {
        $q = Doctrine_Query::create()
                ->from('Wedding_Model_Family f')
                ->where('f.fid = ? AND f.code = ?',
                        array($this->username, $this->password));
        $result = $q->fetchArray(); 
        if(count($result) == 1){
           
            return new Zend_Auth_Result(
                    Zend_Auth_Result::SUCCESS, $this->username, array());
        }else{
            return new Zend_Auth_Result(
                    Zend_Auth_Result::FAILURE, null, array('Authenticaton Unsuccessful')
            );
        }
    }    
    
    //reurns result array representing authenticated user record
    //excludes specified user resoed fields as needed
    public function getResultArray($excludeFields = null) {
        if($this->_resultArray){
            return false;
        }
        
        if ($excludeFields != null){
            $excludeFields = (array)$excludeFields;
            foreach($this->_resultArray as $k => $v){
                if(!in_array($k, $excludeFields)){
                    $returnArray[$k] = $v;
                }
            }
            return $returnArray;
        }else{
            return $this->_resultArray;
        }
    }
    
}