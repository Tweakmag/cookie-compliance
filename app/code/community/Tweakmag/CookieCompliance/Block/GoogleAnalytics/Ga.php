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

class Tweakmag_CookieCompliance_Block_GoogleAnalytics_Ga
    extends Mage_GoogleAnalytics_Block_Ga
{
    protected function _toHtml()
    {
        if (Mage::helper('tmcc')->userHasAllowedCookies()) {
            parent::_toHtml();
        }
    }
}