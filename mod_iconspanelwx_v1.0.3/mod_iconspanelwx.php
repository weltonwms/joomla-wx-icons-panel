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

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() .'media/jui/css/icomoon.css');
$url_module=JURI::base() . '/modules/'.$module->module;
$document->addStyleSheet($url_module.'/assets/css/estilo.css');
$icons=  ModIconsPanelWxHelper::getIcons($params);
$centralize= $params->get('centralize',0);
$columns= $params->get('nr_columns','span-custom5');
$max_width= $params->get('max-width','100%');
require JModuleHelper::getLayoutPath('mod_iconspanelwx');
