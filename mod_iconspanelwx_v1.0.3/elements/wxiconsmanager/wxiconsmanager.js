function jInsertEditorText(text, editor) {
    var valeur = jQuery(text).attr('src');
    jQuery('#' + editor).val(valeur);

}

function checkIndex(i) {
    while (jQuery('#icon_list' + i).length) {
        i++;
    }

    return i;
}

function remove(element) {
    jQuery(element).remove();
    store();

}

function store() {
    var items = new Array();
    var item = '';
    jQuery('.icon_list').each(function (i, el) {
        el = jQuery(el);
        item = new Object();
        item['link'] = el.find('input[name=link]').val();
        item['img'] = el.find('input[name=img]').val();
        item['categoria'] = el.find('input[name=categoria]').val();
        items[i] = item;
    });

    //console.log(items);
    items = JSON.stringify(items);
    items = items.replace(/"/g, "|qq|");
    jQuery('#base-icons').val(items);

}


function callIconsList() {
    var icons = jQuery.parseJSON(jQuery('#base-icons').val().replace(/\|qq\|/g, "\""));

    if (icons.length) {
        jQuery(icons).each(function (i, icon) {
            addIconList(icon);
        });//fim each

    }// fim if(icons.length)

}

function addIconList(icon) {
    var valLink = "";
    var valImg = "";
    var valCategoria = "";

    if (icon) {
        valLink = icon.link;
        valImg = icon.img;
        valCategoria = icon.categoria?icon.categoria:'';
    }
    var index = checkIndex(0);
    
    var modal_img = '<a class="modal btn" href="'+JURIBASE+'index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;e_name=img-item-list' + index + '&amp;asset=com_config" rel="{handler: \'iframe\', size: {x: 800, y: 500}}">'+TEXT_MOD_ICONSPANELWX_ACTION_IMAGE+'</a>';
    var link_move='<a href="#" title="'+TEXT_MOD_ICONSPANELWX_ACTION_DRAG+ '" class="items-handle"><i class="icon-move"></i></a>';
    var input_link='<input type="text" name="link" value="' + valLink + '" placeholder="Link"/> ';
     var input_categoria='<input type="text" name="categoria" value="' + valCategoria + '" placeholder="'+TEXT_MOD_ICONSPANELWX_CATEGORY+'"/> ';
    var input_img='<div class="input-append"><input type="text" name="img" value="' + valImg + '" id="img-item-list' + index + '" placeholder="Img"/> ' + modal_img + '</div>';
    var link_delete='<a href="#"class="btn btn-default delete" title="'+TEXT_MOD_ICONSPANELWX_ACTION_DELETE+'"><i class="icon-remove"></i></a>';
    
    var lista= link_move+input_link+ input_categoria+input_img+link_delete;
    var li = jQuery('<li class="icon_list" id="icon_list' + index + '">'+lista+'</li>');


    jQuery('.icons_list').append(li);
    /************************
     script para atribuir novamente o modal. Necessário, pois elementos criados dinamicamente não herdam certos eventos. 
     *************************/
    SqueezeBox.assign(jQuery('a.modal'), {
        parse: 'rel'
    });
    jQuery('.delete').click(function (event) {
        event.preventDefault();
        remove(this.parentElement);
    }); //fim click delete

    makesortables();




} //fim function addItemList



function addScriptStoreOnSubmit() {
    var script = document.createElement("script");
    script.setAttribute('type', 'text/javascript');
    script.text = "Joomla.submitbutton = function(task){"
            + "store();"
            + "var form = document.getElementById('modules-form') || document.getElementById('module-form');"
            + "if (task == 'module.cancel' || task == 'config.cancel.modules' || document.formvalidator.isValid(form)) {	Joomla.submitform(task, form);"
            + "if (self != top) {"
            + "window.top.setTimeout('window.parent.SqueezeBox.close()', 1000);"
            + "}"
            + "} else {"
            + "alert('Formulário Inválido');"
            + "}}";
    document.body.appendChild(script);


}

function makesortables() {
    jQuery(".icons_list").sortable({
        placeholder: "ui-state-highlight",
        handle: ".items-handle",
        items: ".icon_list",
        axis: "y",
        forcePlaceholderSize: true,
        forceHelperSize: true,
        dropOnEmpty: true,
        tolerance: "pointer",
        cursor: "move",
        zIndex: 9999,
        update: function (event, ui) {
            //renumber_slides();
        },
        sort: function (event, ui) {
            jQuery(ui.placeholder).height(jQuery(ui.helper).height());
        }
    });
}




jQuery(document).ready(function () {
    callIconsList();
    addScriptStoreOnSubmit();

    jQuery('.btn-add-icon').click(function (event) {
        event.preventDefault();
        addIconList();
    }); //fim click add icon

    jQuery('#btn-store').click(function (event) {
        event.preventDefault();
        store();
    });

}); // fim document ready
