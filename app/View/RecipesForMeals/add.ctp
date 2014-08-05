<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 31/07/14
 * Time: 21:15
 */
$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('recipesForMeals', array('inline' => false));
?>

<div class="page-header">
    <h1>Planejamento de cardápio<small><i class="ace-icon fa fa-angle-double-right"></i> Adicionar refeição</small></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="suppliesProducts form">
                        <?php echo $this->Form->create(
                            'RecipesForMeal',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                                )
                            )
                        ); ?>
                        <fieldset style="padding: 16px">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Refeição </label>


                                <?php echo $this->Form->input(
                                    'meal_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => ''

                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductProductId"> Receita </label>


                                <?php echo $this->Form->input(
                                    'recipe_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha uma unidade'

                                    )
                                ); ?>

                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <?php echo $this->Form->button(
                                $this->Html->tag(
                                    'i',
                                    ' adicionar',
                                    array(
                                        'class' => '"ace-icon fa fa-arrow-right icon-on-right bigger-110'
                                    )
                                ),
                                array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-success',
                                    'escape' => false
                                )
                            ); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>