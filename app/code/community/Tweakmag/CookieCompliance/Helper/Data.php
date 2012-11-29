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

class Tweakmag_CookieCompliance_Helper_Data extends Mage_Core_Helper_Abstract
{
    const TMCCENABLED = 'tmcc/configuration/enabled';
    const TMCCCOOKIEMANAGEMENT = 'tmcc/configuration/cookiecontrol';

    /**
     * Check if cookie compliance is needed
     * @return boolean
     */
    static public function isCookieComplianceNeeded()
    {
        $isEnabled = self::isEnabled();
        if ($isEnabled) {
            if (self::userHasAllowedCookies()) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Check if user has allowed cookies
     * @return boolean
     */
    public function userHasAllowedCookies()
    {
        $cookie = Mage::getModel('core/cookie')->get('cookiecompliance');
        if (empty($cookie)) {
            return FALSE;
        }
        if ($cookie == "allow_cookies") {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Check if Cookie Compliance feature has been enabled
     * @return boolean
     */
    public function isEnabled()
    {
        return Mage::getStoreConfig(self::TMCCENABLED);
    }

    /**
     * Checks whether cookies should be deleted
     */
    public function shouldDeleteCookies()
    {
        if (Mage::getStoreConfig(self::TMCCCOOKIEMANAGEMENT) == 2) {
            return TRUE;
        }
        return FALSE;
    }
}