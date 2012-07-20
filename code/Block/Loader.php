<?php


class DMC_CreateJs_Block_Loader extends Mage_Core_Block_Abstract
{


    protected function _toHtml()
    {
        $html = '';
        if( Mage::getSingleton('dmc_createjs/session')->getIsActive() ){

            $head = $this->getLayout()->getBlock('head');

            foreach( $this->getFrontendJsLibraries() as $js ){

                $head->addJs( 'createjs/'.$js );

            }

            $html .= '<script type="text/javascript">
            var adminUrl = "'.Mage::getConfig()->getNode('admin/routers/adminhtml/args/frontName').'";

            </script>';
        }
        return "<meta content='is used' name='createjs'/>".$html;
    }

    public function getFrontendJsLibraries(){
        return array(
            '',

        );
    }

}

