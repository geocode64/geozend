<?php

/**
 * Wedding_Model_Family
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
class Wedding_Model_Family extends Wedding_Model_BaseFamily
{
    public function setUp() {
        $this->hasOne('Wedding_Model_Guest', array(
            'local' => 'primary_contact',
            'foreign' => 'gid'
            )
        );
    }
}