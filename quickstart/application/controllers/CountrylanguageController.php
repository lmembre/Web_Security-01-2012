<?php

class CountrylanguageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
         $Language = new Application_Model_CountrylanguageMapper();
        $this->view->countrylanguage = $Language->fetchAll();
    }


}

