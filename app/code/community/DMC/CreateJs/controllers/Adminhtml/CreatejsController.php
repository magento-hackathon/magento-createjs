<?php

class DMC_CreateJs_Adminhtml_CreatejsController extends Mage_Adminhtml_Controller_Action
{

    public function getcreatejsAction($fKey)
    {

        $this->getResponse()->clearAllHeaders();
        $this->getResponse()->setHttpResponseCode(200);

        $result = Mage::app()->getLayout()->createBlock('dmc_createjs/loader')->getCreateJsHtml();
        $result['fKey'] = $fKey;
        $aUrl = Mage::helper('adminhtml')->getUrl('/createjs/savecreatejs');
        $result['aurl'] = $aUrl;

        return Mage::helper('core')->jsonEncode($result);

    }

    public function savecreatejsAction(){

        $params = $this->getRequest()->getParams();
        $product = Mage::getModel('catalog/product')->load($params['ID']);
        $product->setName($params['name']);
        $product->setDescription($params['description']);
        $product->setShortDescription($params['short-description']);

        $product->save();
        
    }

    public function preDispatch()
    {

        parent::preDispatch();

        $aSession = Mage::getSingleton('admin/session');
        $isAdmin = $aSession->isLoggedIn();

        $session = Mage::getModel('core/session');
        $fKey = $session->getFormKey();

        if (($this->getRequest()->getQuery('isAjax', true) || $this->getRequest()->getQuery('ajax', true))
            && $this->getRequest()->getModulename() == 'admin'
            && $this->getRequest()->getControllername() == 'createjs'
            && $this->getRequest()->getActionname() == 'getcreatejs'
            && $isAdmin
        ) {
            $this->getResponse()->setBody($this->getcreatejsAction($fKey));

        } elseif (($this->getRequest()->getQuery('isAjax', true) || $this->getRequest()->getQuery('ajax', true))
            && $this->getRequest()->getModulename() == 'admin'
            && $this->getRequest()->getControllername() == 'createjs'
            && $this->getRequest()->getActionname() == 'savecreatejs'
            && $isAdmin
        ) {


        } else {
            $this->getResponse()->setHttpResponseCode(403);
        }
        return $this;
    }
}