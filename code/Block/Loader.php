<?php


class DMC_CreateJs_Block_Loader extends Mage_Core_Block_Abstract
{

    public function getCreateJsHtml() {
        return $this->_toHtml();
    }

    protected function _toHtml()
    {
        $html = '';

        $js_arr = array();

        foreach( $this->getFrontendJs() as $js ){


            $jsPath = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_JS) . 'createjs/' . $js;
            $js_arr[] = $jsPath;



        }
        foreach( $this->getFrontendCss() as $css ){

            $cssPath = 'skin/frontend/default/default/dmc_createjs/' . $css;
            $html .= "<link type='text/css' href='$cssPath' media='all' rel='stylesheet'/>";

        }

        $html .= '<script type="text/javascript">
        var adminUrl = "'.Mage::getConfig()->getNode('admin/routers/adminhtml/args/frontName').'";
        var shopUrl = "'.$this->getUrl().'"

        </script>';
        $jsPath = 'skin/frontend/default/default/dmc_createjs/' . 'config.js';
        $html  .= "<script type='text/javascript' src='$jsPath'></script>";

        $data = array('html' => $html,
              'js' => $js_arr);

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
        );
    }

    public function getFrontendCss(){
        return array(
            'create-ui/css/create-ui.css',
            'midgard-notifications/midgardnotif.css',
        );
    }

}

