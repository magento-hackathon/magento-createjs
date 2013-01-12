<?php


class DMC_CreateJs_Block_Loader extends Mage_Core_Block_Abstract
{



    protected function _toHtml()
    {
        $html = '';
        if( Mage::getSingleton('dmc_createjs/session')->getIsActive() ){


            foreach( $this->getFrontendJs() as $js ){

                $jsPath = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_JS) . 'createjs/' . $js;
                $html .= "<script type='text/javascript' src='$jsPath'></script>";

            }
            foreach( $this->getFrontendCss() as $css ){

                $cssPath = $this->getSkinUrl('dmc_createjs/' . $css );
                $html .= "<link type='text/css' href='$cssPath' media='all' rel='stylesheet'/>";

            }

            $html .= '<script type="text/javascript">
            var adminUrl = "'.Mage::getConfig()->getNode('admin/routers/adminhtml/args/frontName').'";
            var shopUrl = "'.$this->getUrl().'";

            </script>';
            $jsPath = $this->getSkinUrl('dmc_createjs/' . 'config.js' );
            $html  .= "<script type='text/javascript' src='$jsPath'></script>";
        }
        return "<meta content='is used' name='createjs'/>".$html;
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

