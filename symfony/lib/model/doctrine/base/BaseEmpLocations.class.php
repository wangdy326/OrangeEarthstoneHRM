<?php

/**
 * BaseEmpLocations
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $empNumber
 * @property string $loc_code
 * 
 * @method integer      getEmpNumber() Returns the current record's "empNumber" value
 * @method string       getLocCode()   Returns the current record's "loc_code" value
 * @method EmpLocations setEmpNumber() Sets the current record's "empNumber" value
 * @method EmpLocations setLocCode()   Sets the current record's "loc_code" value
 * 
 * @package    orangehrm
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmpLocations extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('hs_hr_emp_locations');
        $this->hasColumn('emp_number as empNumber', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('loc_code', 'string', 13, array(
             'type' => 'string',
             'primary' => true,
             'length' => 13,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}