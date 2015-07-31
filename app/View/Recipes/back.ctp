<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 31/07/2015
 * Time: 19:32
 */
?>

<span class="label label-md <?php if($recipe['Recipe']['category'] == 'Entrada'){echo $class = 'label-yellow';}elseif($recipe['Recipe']['category'] == 'Prato base'){echo $class = 'label-light';}elseif($recipe['Recipe']['category'] == 'Prato proteico'){echo $class = 'label-danger';}elseif($recipe['Recipe']['category'] == 'Guarnição'){echo $class = 'label-purple';}elseif($recipe['Recipe']['category'] == 'Sobremesa'){echo $class = 'label-pink';}elseif($recipe['Recipe']['category'] == 'Suco'){echo $class = 'label-info';} ?>" id="recipe_status">
    <?php echo $recipe['Recipe']['category']; ?>
</span>


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="RecipeCategory"> Categoria </label>
    <?php echo $this->Form->input(
        'Recipe.category',
        array(
            'type' => 'select',
            'div' => 'col-sm-9',
            'class' => 'chosen-select',
            'placeholder' => 'escolha uma UAN'
        )
    ); ?>
</div>
