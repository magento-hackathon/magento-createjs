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

            $jsPath = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_JS) . 'createjs/' . $js;
            $js_arr[] = $jsPath;
        }

        foreach( $this->getFrontendCss() as $css ){

            $cssPath = '/skin/frontend/default/default/dmc_createjs/' . $css;
            $css_arr[] = $cssPath;
        }

        $adminUrl = Mage::getConfig()->getNode('admin/routers/adminhtml/args/frontName');
        $shopUrl = $this->getUrl();

        $data = array('js' => $js_arr,
                      'css' => $css_arr,
                      'adminUrl' => $adminUrl,
                      'shopUrl' => $shopUrl);

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
            'jquery.rdfquery.min.js',
            'annotate-min.js',
            'hallo.js',
            'create.js',
            'config.js'
        );
    }

    public function getFrontendCss(){
        return array(
            'create-ui/css/create-ui.css',
            'midgard-notifications/midgardnotif.css',
        );
    }

}

