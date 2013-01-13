<?php


class DMC_CreateJs_Block_Loader extends Mage_Core_Block_Abstract
{

    public function getCreateJsHtml() {
        return $this->_toHtml();
    }

    protected function _toHtml()
    {
        $js_arr = array();
        $css_arr = array();

        foreach( $this->getFrontendJs() as $js ){

            $jsPath = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_JS) . 'dmc/createjs/' . $js;
            $js_arr[] = $jsPath;
        }
        $js_arr[] = '/skin/frontend/base/default/dmc/createjs/config.js';

        foreach( $this->getFrontendCss() as $css ){
            $cssPath = '/skin/frontend/base/default/dmc/createjs/' . $css;
            $css_arr[] = $cssPath;
        }

        $adminUrl = Mage::getConfig()->getNode('admin/routers/adminhtml/args/frontName');
        $shopUrl = $this->getUrl();
        $ressourceUrl = $this->getRessourceUrl();

        $data = array('js' => $js_arr,
                      'css' => $css_arr,
                      'adminUrl' => $adminUrl,
                      'shopUrl' => $shopUrl,
                      'ressourceUrl' => $ressourceUrl,
        );

        return $data;
    }

    public function getFrontendJs(){
        return array(
            'jquery-1.7.1.min.js',
            'jquery-ui-1.8.18.custom.min.js',
            'modernizr.custom.80485.js',
            'underscore-min.js',
            'backbone-min.js',
            'vie-min.js',
            'jquery.tagsinput.min.js',
            'jquery.rdfquery.min.js',
            'rangy-core-1.2.3.js',
            'annotate-min.js',
            'hallo.js',
            'create.js',
        );

    }

    public function getFrontendCss(){
        return array(
            'create-ui/css/create-ui.css',
            'midgard-notifications/midgardnotif.css',
            'custom.css',
            'font-awesome/css/font-awesome.css',
        );
    }

    public function getUrlWithoutGet(){
        $current_url = explode('?', $this->getUrl() );
        return $current_url[0];
    }

    public function getRessourceUrl(){
        return $this->getRequest()->getPathInfo();
    }

}

