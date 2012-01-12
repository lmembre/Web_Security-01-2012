<?php

class Application_Model_Countrylanguage
{

    protected $_Language;
    protected $_IsOfficial;
    protected $_Percentage;
    protected $_CountryCode;
 
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($language, $value)
    {
        $method = 'set' . $language;
        if (('mapper' == $language) || !method_exists($this, $method)) {
            throw new Exception('Invalid Country Language property');
        }
        $this->$method($value);
    }
 
    public function __get($language)
    {
        
        $method = 'get' . $language;
        if (('mapper' == $language) || !method_exists($this, $method)) {
            throw new Exception('Invalid Country Language property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
 
    public function getlanguage() {
        return $this->_Language;
    }

    public function getIsOfficial() {
        return $this->_getIsOfficial;
    }

    public function getPercentage() {
        return $this->_Percentage;
    }

    public function getCountryCode() {
        return $this->_CountryCode;
    }

    public function setLanguage($_Language) {
        $this->_Language = $_Language;
    }

    public function setIsOfficial($_IsOfficial) {
        $this->_IsOfficial = $_IsOfficial;
    }

    public function setPercentage($_Percentage) {
        $this->_Percentage = $_Percentage;
    }

    public function setCountryCode($_CountryCode) {
        $this->_CountryCode = $_CountryCode;
    }

}

