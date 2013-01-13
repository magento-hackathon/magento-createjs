<?php

class DMC_CreateJs_Adminhtml_CreatejsController extends Mage_Adminhtml_Controller_Action
{

    public function getcreatejsAction()
    {

    }

    public function preDispatch()
    {

        parent::preDispatch();

        $isAdmin = (Mage::getSingleton('admin/session')->isLoggedIn());

        if (($this->getRequest()->getQuery('isAjax', true) || $this->getRequest()->getQuery('ajax', true))
            && $this->getRequest()->getModulename() == 'admin'
            && $this->getRequest()->getControllername() == 'createjs'
            && $this->getRequest()->getActionname() == 'getcreatejs'
            && $isAdmin
        ) {

            $result = Mage::app()->getLayout()->createBlock('dmc_createjs/loader')->getCreateJsHtml();

            $this->getResponse()->clearAllHeaders();
            $this->getResponse()->setHttpResponseCode(200);
            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
            Mage::log($result);

        } else {
#            parent::predispatch();
            $this->getResponse()->setHttpResponseCode(403);
        }


        return $this;
    }

}