<?php

class DMC_CreateJs_Adminhtml_CreatejsController extends Mage_Adminhtml_Controller_Action
{

    public function getcreatejsAction()
    {

        //return '<script type="text/javascript">alert("LALALA")</script>';

        $result = '<script type="text/javascript">alert("LALALA")</script>';

        $this->getResponse()->setBody($result);

    }

    public function preDispatch()
    {


        parent::preDispatch();

        $adminSession = Mage::getSingleton('admin/session');
        $user = $adminSession->getUser();
        $isAdmin = (Mage::getSingleton('admin/session')->isLoggedIn());

        if (($this->getRequest()->getQuery('isAjax', true) || $this->getRequest()->getQuery('ajax', true))
            && $this->getRequest()->getModulename() == 'admin'
            && $this->getRequest()->getControllername() == 'createjs'
            && $this->getRequest()->getActionname() == 'getcreatejs'
            && $isAdmin
        ) {
            $result = '<script type="text/javascript">alert("LALALA")</script>';

            $headers = $this->getResponse()->getHeaders();

            $this->getResponse()->clearAllHeaders();
            $this->getResponse()->setHttpResponseCode(200);
            $this->getResponse()->setBody($result);

        } else {
#            parent::predispatch();
            $this->getResponse()->setHttpResponseCode(403);
        }


        return $this;
    }

}