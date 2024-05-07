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
?>
<style>
    .mod-wxpanel{

        max-width: <?php echo $max_width?>;
        <?php if ($centralize): ?>
            margin: 0 auto;
        <?php endif; ?>
        overflow: visible;
    } 
</style>

<div class="mod-wxpanel">
    
    <?php $count=1?>
        <?php foreach ($icons as $categories=>$category): ?>
    <?php if($categories!="uncategory"):?>
    <h2 class="header-category <?php echo $count==1?"header1":''?>">
        <?php echo $categories ?> 
        <span class="icon-chevron-down pull-right drop"> </span>
    </h2>
    <?php else:?>
<!--    <hr class="nocategory">-->
    <?php endif;?>
        <div class="row row-fluid grid">
            <?php foreach($category as $icon):?>
            <div class="<?php echo $columns?>">
            <a href="<?php echo $icon->link ?>" target="<?php echo $icon->target ?>">
                    <div class="bloco-img">
                        <img src="<?php echo $icon->img ?>">
                    </div>
                </a>
            </div>
             <?php endforeach; ?>
        </div>    
        <?php  $count++; endforeach; ?>
    
</div>


<script>
/**
 * Inicia efeito Drop. Esconde todos os blocos, execeto o primeiro (.header1).
 * Como o primeiro bloco fica visível, a seta muda de down para up.
 * @returns void
 */
function startEfectDrop(){
    jQuery('.mod-wxpanel .header-category + .grid').hide();
    jQuery('.mod-wxpanel .header1').next('.grid').show();
    jQuery('.mod-wxpanel .header1 .drop').toggleClass('icon-chevron-down');
    jQuery('.mod-wxpanel .header1 .drop').toggleClass('icon-chevron-up');
}
/**
 * Alterna entre esconder e mostrar a classe grid irmã de .header-category. a 
 * seta muda de down para up, ou de up para down
 * @returns void
 */
function toggleGrid(){
    //'this' refere-se à seta de classe "drop" que pode ser clicada.
    jQuery(this).parent('.header-category').next('.grid').slideToggle("slow");
    //console.log(this);
    jQuery(this).toggleClass('icon-chevron-down');
    jQuery(this).toggleClass('icon-chevron-up');
}

jQuery('.mod-wxpanel .drop').unbind(); //caso o modulo seja carregado 2 vezes: desfazer o eventos adicionados anteriormente
startEfectDrop();  
jQuery('.mod-wxpanel .drop').on('click',toggleGrid);

</script>


