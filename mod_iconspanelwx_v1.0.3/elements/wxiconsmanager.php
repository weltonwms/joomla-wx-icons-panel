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

        JHTML::_('script', 'modules/mod_iconspanelwx/elements/wxiconsmanager/wxiconsmanager.js');
        JHTML::_('stylesheet', 'modules/mod_iconspanelwx/elements/wxiconsmanager/wxiconsmanager.css');

        $input = "<input type='hidden' name='" . $this->name . "' id='base-icons' value=\"{$this->value}\"/>";
        $btn = "<button class='btn btn-success btn-add-icon'><i class='icon-plus'></i>Adicionar </button>";
        $ul = "<ul class='icons_list'></ul>";
        $html = "$input  <br> $btn $ul";

        return $html;
    }

    protected function getLabel()
    {
        return "";
    }

}
