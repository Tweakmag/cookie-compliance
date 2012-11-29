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

class Tweakmag_CookieCompliance_Model_Observer
{
    private $_cookiesAllowed;
    private $_isEnabled;
    private $_shouldDeleteCookies;

    public function __construct()
    {
        $this->_cookiesAllowed = Mage::helper('tmcc')->userHasAllowedCookies();
        $this->_isEnabled = Mage::helper('tmcc')->isEnabled();
        $this->_shouldDeleteCookies = Mage::helper('tmcc')->shouldDeleteCookies();
    }

    /**
     * Deletes 'frontend' cookie if cookies have not been allowed by the user
     */
    public function cookieComplianceCheck($observer)
    {

        if (!$this->_cookiesAllowed && $this->_isEnabled && $this->_shouldDeleteCookies) {
            Mage::getModel('core/cookie')->delete('frontend');
        }
    }

    /**
     * Adds an additional layout handle
     * if cookies have not been allowed by the user
     */
    public function addHandles($observer)
    {
        if (!$this->_cookiesAllowed && $this->_isEnabled && $this->_shouldDeleteCookies) {
            $update = Mage::getSingleton('core/layout')->getUpdate();
            $update->addHandle('cookies_not_allowed');
        }
    }
}