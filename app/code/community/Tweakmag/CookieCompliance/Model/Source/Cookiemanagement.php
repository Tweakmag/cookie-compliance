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

class Tweakmag_CookieCompliance_Model_Source_Cookiemanagement
{
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label' => Mage::helper('tmcc')->__('Allow cookies and advice user.')),
            array('value' => 2, 'label' => Mage::helper('tmcc')->__('Remove cookies until user allows them.'))
        );
    }

}