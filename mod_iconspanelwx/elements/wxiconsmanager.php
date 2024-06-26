<?php
/**
 * 
 * @version             See field version manifest file
 * @package             See field name manifest file
 * @author		Welton Moreira dos Santos
 * @copyright			See field copyright manifest file
 * @license             GNU General Public License version 2 or later
 * 
 */
// no direct access
defined('_JEXEC') or die();

class JFormFieldWxiconsmanager extends JFormField
{

    protected $type = 'wxiconsmanager';

    protected function getInput()
    {
        $isJ4 = (JVERSION >=4)?1:0;
        JHtml::_('jquery.framework');
        if(!$isJ4):
            JHTML::_('behavior.modal');
            JHtml::_('bootstrap.modal');
        endif;       
        //JHtml::_('jquery.ui', array('core', 'sortable'));
        JHTML::_('script', 'modules/mod_iconspanelwx/elements/wxiconsmanager/jquery-uick-custom.js');
        JHTML::_('script', 'modules/mod_iconspanelwx/elements/wxiconsmanager/ckbox.js');
        JHTML::_('stylesheet', 'modules/mod_iconspanelwx/elements/wxiconsmanager/ckbox.css');
        JHTML::_('script', 'modules/mod_iconspanelwx/elements/wxiconsmanager/wxiconsmanager.js');
        JHTML::_('stylesheet', 'modules/mod_iconspanelwx/elements/wxiconsmanager/wxiconsmanager.css');

        $document = JFactory::getDocument();
        $document->addScriptDeclaration("JURI='" . JURI::root() . "';");
        $document->addScriptDeclaration("JURIBASE='" . JURI::base() . "';");
        $document->addScriptDeclaration("ISJ4=parseInt('" . $isJ4 . "');");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_ADD='" . JText::_('MOD_ICONSPANELWX_ACTION_ADD') . "';");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_DRAG='" . JText::_('MOD_ICONSPANELWX_ACTION_DRAG') . "';");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_DELETE='" . JText::_('MOD_ICONSPANELWX_ACTION_DELETE') . "';");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_IMAGE='" . JText::_('MOD_ICONSPANELWX_ACTION_IMAGE') . "';");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_CATEGORY='" . JText::_('MOD_ICONSPANELWX_CATEGORY') . "';");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_TARGET_SELF='" . JText::_('MOD_ICONSPANELWX_TARGET_SELF') . "';");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_TARGET_BLANK='" . JText::_('MOD_ICONSPANELWX_TARGET_BLANK') . "';");
        $document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_SAVE_CLOSE='" . JText::_('MOD_ICONSPANELWX_SAVE_CLOSE') . "';");


        $input = "<input type='hidden' name='" . $this->name . "' id='base-icons' value=\"{$this->value}\"/>";
        $btn = "<button class='btn btn-success btn-add-icon'><i class='icon-plus'></i>" . JText::_('MOD_ICONSPANELWX_ACTION_ADD') . " </button>";
        $ul = "<ul class='icons_list'></ul>";
        $html = "$input  <br> $btn $ul";

        return $html;
    }

    protected function getLabel()
    {
        return '';
    }

}
