<?php

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

        if ($lista['uncategory']):
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
