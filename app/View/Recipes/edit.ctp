<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */

?>

<div class="page-header">
    <h1>Editar receita<small><i class="ace-icon fa fa-angle-double-right"></i></small></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Editar receita: <?php echo $this->data['Recipe']['name']?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="recipes form">
                        <?php echo $this->Form->create(
                            'Recipe',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                                )
                            )
                        ); ?>
                        <fieldset style="padding: 16px">
                            <?php echo $this->Form->input('id'); ?>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeName"> Nome </label>

                                <?php echo $this->Form->input(
                                    'Recipe.name',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeCode"> Código </label>


                                <?php echo $this->Form->input(
                                    'Recipe.code',
                                    array(
                                        'div' => 'col-sm-9'

                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeDescription"> Descri&ccedil;&atilde;o </label>


                                <?php echo $this->Form->input(
                                    'Recipe.description',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'autosize-transition form-control'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeInstructions"> Instru&ccedil;&otilde;es </label>


                                <?php echo $this->Form->input(
                                    'Recipe.instructions',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'autosize-transition form-control'
                                    )
                                ); ?>

                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <?php echo $this->Form->button(
                                'editar &nbsp;'.$this->Html->tag(
                                    'i',
                                    '',
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