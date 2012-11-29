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

class Tweakmag_CookieCompliance_Block_Notices
    extends Mage_Page_Block_Html_Notices
{
    const COOKIE_COMPLIANCE_TEXT = 'tmcc/configuration/text';
    const COOKIE_COMPLIANCE_LINK_TEXT = 'tmcc/configuration/linktext';
    const COOKIE_COMPLIANCE_FORM_TEXT = 'tmcc/configuration/formtext';

    public function getNoticeContent()
    {
        return Mage::getStoreConfig(self::COOKIE_COMPLIANCE_TEXT);
    }

    public function getLinkToCookieInfo()
    {
        $url = Mage::getStoreConfig(Mage_Cms_Helper_Page::XML_PATH_NO_COOKIES_PAGE);
        $label = Mage::getStoreConfig(self::COOKIE_COMPLIANCE_LINK_TEXT);
        return '<a href="' . $url . '">' . $label . '</a>';
    }

    public function getForm()
    {
        $formvalue = Mage::helper('tmcc')->__('Continue');
        $form = Mage::getStoreConfig(self::COOKIE_COMPLIANCE_FORM_TEXT);
        $form = str_replace('{checkbox}', '<input type="checkbox" name="cookieconsent">', $form);
        $form = str_replace('{button}', '<input type="submit" value="' . $formvalue . '">', $form);
        return $form;
    }

    public function getUrlForReferer()
    {
        return $this->getUrlEncoded('*/*/*', array('_current' => true));
    }
}