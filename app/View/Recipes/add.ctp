<?php

$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('ace/fuelux.spinner', array('inline' => false));
$this->Html->script('recipes_add', array('inline' => false));

$this->Html->addCrumb('Receituário padrão');
$this->Html->addCrumb('Receitas', '/recipes');
$this->Html->addCrumb('Adicionar receita');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Nova receita</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="form">
                        <?php echo $this->Form->create(
                            'Recipes',
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
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeName"> Preparação </label>

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
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeIncome"> Rendimento </label>


                                <?php echo $this->Form->input(
                                    'Recipe.income',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'input-mini',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeDescription"> Descri&ccedil;&atilde;o </label>


                                <?php echo $this->Form->input(
                                    'Recipe.description',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="RecipeInstructions"> Modo de preparo </label>


                                <?php echo $this->Form->input(
                                    'Recipe.instructions',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <?php echo $this->Form->button(
                                'adicionar &nbsp;'.$this->Html->tag(
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
