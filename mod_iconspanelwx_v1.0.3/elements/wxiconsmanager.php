<?php

// no direct access
defined('_JEXEC') or die();

class JFormFieldWxiconsmanager extends JFormField {

    protected $type = 'wxiconsmanager';

    protected function getInput()
    {

        JHtml::_('jquery.framework');
        JHTML::_('behavior.modal');
        JHtml::_('bootstrap.modal');
        JHtml::_('jquery.ui', array('core', 'sortable'));
        $document = JFactory::getDocument();
	$document->addScriptDeclaration("JURI='" . JURI::root() . "';");
	$document->addScriptDeclaration("JURIBASE='" . JURI::base() . "';");
	//$document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_ADD='" . JText::_( 'MOD_ICONSPANELWX_ACTION_ADD' ) . "';");
	$document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_DRAG='" . JText::_( 'MOD_ICONSPANELWX_ACTION_DRAG' ) . "';");
	$document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_DELETE='" . JText::_( 'MOD_ICONSPANELWX_ACTION_DELETE' ) . "';");
	$document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_ACTION_IMAGE='" . JText::_( 'MOD_ICONSPANELWX_ACTION_IMAGE' ) . "';");
	$document->addScriptDeclaration("TEXT_MOD_ICONSPANELWX_CATEGORY='" . JText::_( 'MOD_ICONSPANELWX_CATEGORY' ) . "';");

        JHTML::_('script', 'modules/mod_iconspanelwx/elements/wxiconsmanager/wxiconsmanager.js');
        JHTML::_('stylesheet', 'modules/mod_iconspanelwx/elements/wxiconsmanager/wxiconsmanager.css');

        $input = "<input type='hidden' name='" . $this->name . "' id='base-icons' value=\"{$this->value}\"/>";
        $btn = "<button class='btn btn-success btn-add-icon'><i class='icon-plus'></i>".JText::_( 'MOD_ICONSPANELWX_ACTION_ADD' )." </button>";
        $ul = "<ul class='icons_list'></ul>";
        $html = "$input  <br> $btn $ul";

        return $html;
    }

    protected function getLabel()
    {
        return "";
    }

}
