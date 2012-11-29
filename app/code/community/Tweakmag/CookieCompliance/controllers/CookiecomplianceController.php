<?php
/**
 * Tweakmag CookieCompliance
 *
 * @category   Tweakmag
 * @package    Tweakmag_CookieCompliance
 * @copyright  Copyright (c) 2012 Tweakmag (http://www.tweakmag.com)
 * @author       Adam Martin (amartin@tweakmag.com)
 * @license    Commercial
 */

class Tweakmag_CookieCompliance_CookiecomplianceController extends Mage_Core_Controller_Front_Action
{

    public function setcookieAction()
    {

        if ($this->getRequest()->getParam('cookieconsent')) {
            //user has allowed cookies
            if (Mage::getStoreConfig('tmcc/configuration/remembercookie') != 1) {
                $time = "0";
            } else {
                $time = "31536000"; //1year
            }
            Mage::getModel('core/cookie')->set("cookiecompliance", "allow_cookies", $time);
        } else {
            Mage::getSingleton('core/session')->addError('Sorry, you need to tick the checkbox to allow cookies.');
        }

        $referer = $this->getRequest()->getParam('referer');
        $url = Mage::helper('core')->urlDecode($referer);
        $this->_redirectUrl($url);
    }
}