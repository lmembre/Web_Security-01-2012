<?php

class Application_Model_CountrylanguageMapper
{

   protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Countrylanguage');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Countrylanguage $Countrylanguage)
    {
        $data = array(
            'Language'   => $Countrylanguage->geLanguage(),
            'IsOfficial'=> $Countrylanguage->getIsOfficial(),
            'Percentage'   => $Countrylanguage->getPercentage(),
            );
 
        if (null === ($CountryCode = $Countrylanguage->getCountryCode())) {
            unset($data['CountryCode']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('CountryCode = ?' => $CountryCode));
        }
    }
 
  /*  public function find($CountryCode, Application_Model_Countrylanguage $Countrylanguage)
    {
        $result = $this->getDbTable()->find($CountryCode);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $Countrylanguage->setCountryCode($row->CountryCode);
                  $Countrylanguage->setLanguage($row->Language);
                  $Countrylanguage->setIsOfficial($row->IsOfficial);
                  $Countrylanguage->setPercentage($row->Percentage);
        }
 */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        
        $countrylanguage   = array();
    /*    foreach ($resultSet as $row) {
            $Countrylanguage = new Application_Model_Countrylanguage();
            $Countrylanguage->setCountryCode($row->CountryCode);
                  $Countrylanguage->setLanguage($row->Language);
                  $Countrylanguage->setIsOfficial($row->IsOfficial);
                  $Countrylanguage->setPercentage($row->Percentage);
            $countrylanguage[] = $Countrylanguage;
        }*/
        return $countrylanguage;
    }
}


