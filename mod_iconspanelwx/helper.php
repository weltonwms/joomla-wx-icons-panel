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
defined('_JEXEC') or die;

class ModIconsPanelWxHelper {

    public static function getIcons($params) {

        $icons = json_decode(str_replace("|qq|", "\"", $params->get('icons')));
        //realizar algum tratamento em icons se necessário.


        return self::sortByCategory($icons);
    }

    private static function sortByCategory($icons) {
        $lista = [];
        foreach ($icons as $icon):
            if ($icon->categoria):
                $lista[$icon->categoria][] = $icon;
            else:
                $lista['uncategory'][] = $icon;
            endif;

        endforeach;

        if (isset($lista['uncategory']) && $lista['uncategory'] ):
            //lógica para trazer uncategory como primeira chave
            $uncategories['uncategory'] = $lista['uncategory'];
            unset($lista['uncategory']);
            $copyList = $lista;
            $novaLista = array_merge($uncategories, $copyList);
            $lista = $novaLista;
        endif;

         return $lista;
    }

}
