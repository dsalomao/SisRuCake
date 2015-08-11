<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 31/07/2015
 * Time: 19:59
 */
$this->Html->css('chosen', array('inline' => false));

$this->Html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('recipesForMealsAddMeal', array('inline' => false));

$this->Html->addCrumb('Refeições', '/meals');
$this->Html->addCrumb('adicionar refeição');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title col-sm-6">Adicionar receita a refeição: </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="RecipesForMeal form">
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
                            <h1>Entrada</h1>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMeal0RecipeId"> Receitas </label>

                                <div class="col-xs-12 col-sm-9">
                                    <select name="data[RecipesForMeal][0][recipe_id]" class="chosen-select" placeholder="Escolha uma receita" id="Entrance">
                                        <?php foreach($recipes as $recipe): ?>
                                            <option value="<?php echo $recipe['Recipe']['id']; ?>" data-options-income="<?php echo $recipe['Recipe']['income']?>"><?php echo $recipe['Recipe']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeIncome"> Rendimento </label>

                                <div class="col-xs-4 col-sm-4" id="EntranceIncome">
                                    <?php
                                    $controlEntrance[] = null;
                                    foreach($recipes as $recipe){
                                        if(!in_array($recipe['Recipe']['id'], $controlEntrance)){
                                            echo $this->Html->tag(
                                                'span',
                                                $recipe['Recipe']['income'].' pessoas',
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'EntranceTag_'.$recipe['Recipe']['id']
                                                )
                                            );
                                            $controlEntrance[] = $recipe['Recipe']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input(
                                    'RecipesForMeal.0.category',
                                    array(
                                        'type' => 'hidden',
                                        'value' => 'Entrada'
                                    )
                                ); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealPortionMultiplier"> Quantidade </label>


                                <?php echo $this->Form->input(
                                    'RecipesForMeal.0.portion_multiplier',
                                    array(
                                        'type' => 'number',
                                        'div' => 'col-xs-12 col-sm-1',
                                        'id' => 'EntrancePortionMultiplier',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div  class="col-xs-12 col-sm-8">
                                    <h4><small><i class="ace-icon fa fa-angle-double-right"></i> multiplicador de porcionamento da receita</small></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ExpectedIncome"> Rendimento esperado </label>

                                <div class="col-xs-4 col-sm-4">
                                    <?php
                                    echo $this->Html->tag(
                                        'span',
                                        '',
                                        array(
                                            'class' => 'label label-lg label-success arrowed-right hidden',
                                            'id' => 'EntranceExpectedIncome'
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset style="padding: 16px">
                            <h1>Prato Proteico</h1>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMeal1RecipeId"> Receitas </label>

                                <div class="col-xs-12 col-sm-9">
                                    <select name="data[RecipesForMeal][1][recipe_id]" class="chosen-select" placeholder="Escolha uma receita" id="ProteinPlate">
                                        <?php foreach($recipes as $recipe): ?>
                                            <option value="<?php echo $recipe['Recipe']['id']; ?>" data-options-income="<?php echo $recipe['Recipe']['income']?>"><?php echo $recipe['Recipe']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeIncome"> Rendimento </label>

                                <div class="col-xs-4 col-sm-4" id="ProteinPlateIncome">
                                    <?php
                                    $controlProteinPlate[] = null;
                                    foreach($recipes as $recipe){
                                        if(!in_array($recipe['Recipe']['id'], $controlProteinPlate)){
                                            echo $this->Html->tag(
                                                'span',
                                                $recipe['Recipe']['income'].' pessoas',
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'ProteinPlateTag_'.$recipe['Recipe']['id']
                                                )
                                            );
                                            $controlProteinPlate[] = $recipe['Recipe']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input(
                                    'RecipesForMeal.1.category',
                                    array(
                                        'type' => 'hidden',
                                        'value' => 'Prato Proteico'
                                    )
                                ); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealPortionMultiplier"> Quantidade </label>


                                <?php echo $this->Form->input(
                                    'RecipesForMeal.1.portion_multiplier',
                                    array(
                                        'type' => 'number',
                                        'div' => 'col-xs-12 col-sm-1',
                                        'id' => 'ProteinPlatePortionMultiplier',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div  class="col-xs-12 col-sm-8">
                                    <h4><small><i class="ace-icon fa fa-angle-double-right"></i> multiplicador de porcionamento da receita</small></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ExpectedIncome"> Rendimento esperado </label>

                                <div class="col-xs-4 col-sm-4">
                                    <?php
                                    echo $this->Html->tag(
                                        'span',
                                        '',
                                        array(
                                            'class' => 'label label-lg label-success arrowed-right hidden',
                                            'id' => 'ProteinPlateExpectedIncome'
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset style="padding: 16px">
                            <h1>Prato Base</h1>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMeal2RecipeId"> Receitas </label>

                                <div class="col-xs-12 col-sm-9">
                                    <select name="data[RecipesForMeal][2][recipe_id]" class="chosen-select" placeholder="Escolha uma receita" id="BasePlate">
                                        <?php foreach($recipes as $recipe): ?>
                                            <option value="<?php echo $recipe['Recipe']['id']; ?>" data-options-income="<?php echo $recipe['Recipe']['income']?>"><?php echo $recipe['Recipe']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeIncome"> Rendimento </label>

                                <div class="col-xs-4 col-sm-4" id="BasePlateIncome">
                                    <?php
                                    $controlBasePlate[] = null;
                                    foreach($recipes as $recipe){
                                        if(!in_array($recipe['Recipe']['id'], $controlBasePlate)){
                                            echo $this->Html->tag(
                                                'span',
                                                $recipe['Recipe']['income'].' pessoas',
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'BasePlateTag_'.$recipe['Recipe']['id']
                                                )
                                            );
                                            $controlBasePlate[] = $recipe['Recipe']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input(
                                    'RecipesForMeal.2.category',
                                    array(
                                        'type' => 'hidden',
                                        'value' => 'Prato Base'
                                    )
                                ); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealPortionMultiplier"> Quantidade </label>


                                <?php echo $this->Form->input(
                                    'RecipesForMeal.2.portion_multiplier',
                                    array(
                                        'type' => 'number',
                                        'div' => 'col-xs-12 col-sm-1',
                                        'id' => 'BasePlatePortionMultiplier',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div  class="col-xs-12 col-sm-8">
                                    <h4><small><i class="ace-icon fa fa-angle-double-right"></i> multiplicador de porcionamento da receita</small></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ExpectedIncome"> Rendimento esperado </label>

                                <div class="col-xs-4 col-sm-4">
                                    <?php
                                    echo $this->Html->tag(
                                        'span',
                                        '',
                                        array(
                                            'class' => 'label label-lg label-success arrowed-right hidden',
                                            'id' => 'BasePlateExpectedIncome'
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset style="padding: 16px">
                            <h1>Salada</h1>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMeal3RecipeId"> Receitas </label>

                                <div class="col-xs-12 col-sm-9">
                                    <select name="data[RecipesForMeal][3][recipe_id]" class="chosen-select" placeholder="Escolha uma receita" id="Salad">
                                        <?php foreach($recipes as $recipe): ?>
                                            <option value="<?php echo $recipe['Recipe']['id']; ?>" data-options-income="<?php echo $recipe['Recipe']['income']?>"><?php echo $recipe['Recipe']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeIncome"> Rendimento </label>

                                <div class="col-xs-4 col-sm-4" id="SaladIncome">
                                    <?php
                                    $controlSalad[] = null;
                                    foreach($recipes as $recipe){
                                        if(!in_array($recipe['Recipe']['id'], $controlSalad)){
                                            echo $this->Html->tag(
                                                'span',
                                                $recipe['Recipe']['income'].' pessoas',
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'SaladTag_'.$recipe['Recipe']['id']
                                                )
                                            );
                                            $controlSalad[] = $recipe['Recipe']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $this->Form->input(
                                    'RecipesForMeal.3.category',
                                    array(
                                        'type' => 'hidden',
                                        'value' => 'Salada'
                                    )
                                ); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealPortionMultiplier"> Quantidade </label>

                                <?php echo $this->Form->input(
                                    'RecipesForMeal.3.portion_multiplier',
                                    array(
                                        'type' => 'number',
                                        'div' => 'col-xs-12 col-sm-1',
                                        'id' => 'SaladPortionMultiplier',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div  class="col-xs-12 col-sm-8">
                                    <h4><small><i class="ace-icon fa fa-angle-double-right"></i> multiplicador de porcionamento da receita</small></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ExpectedIncome"> Rendimento esperado </label>

                                <div class="col-xs-4 col-sm-4">
                                    <?php
                                    echo $this->Html->tag(
                                        'span',
                                        '',
                                        array(
                                            'class' => 'label label-lg label-success arrowed-right hidden',
                                            'id' => 'SaladExpectedIncome'
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset style="padding: 16px">
                            <h1>Sobremesa</h1>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMeal4RecipeId"> Receitas </label>

                                <div class="col-xs-12 col-sm-9">
                                    <select name="data[RecipesForMeal][4][recipe_id]" class="chosen-select" placeholder="Escolha uma receita" id="Dessert">
                                        <?php foreach($recipes as $recipe): ?>
                                            <option value="<?php echo $recipe['Recipe']['id']; ?>" data-options-income="<?php echo $recipe['Recipe']['income']?>"><?php echo $recipe['Recipe']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeIncome"> Rendimento </label>

                                <div class="col-xs-4 col-sm-4" id="DessertIncome">
                                    <?php
                                    $controlDessert[] = null;
                                    foreach($recipes as $recipe){
                                        if(!in_array($recipe['Recipe']['id'], $controlDessert)){
                                            echo $this->Html->tag(
                                                'span',
                                                $recipe['Recipe']['income'].' pessoas',
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'DessertTag_'.$recipe['Recipe']['id']
                                                )
                                            );
                                            $controlDessert[] = $recipe['Recipe']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input(
                                    'RecipesForMeal.4.category',
                                    array(
                                        'type' => 'hidden',
                                        'value' => 'Sobremesa'
                                    )
                                ); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealPortionMultiplier"> Quantidade </label>


                                <?php echo $this->Form->input(
                                    'RecipesForMeal.4.portion_multiplier',
                                    array(
                                        'type' => 'number',
                                        'div' => 'col-xs-12 col-sm-1',
                                        'id' => 'DessertPortionMultiplier',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div  class="col-xs-12 col-sm-8">
                                    <h4><small><i class="ace-icon fa fa-angle-double-right"></i> multiplicador de porcionamento da receita</small></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ExpectedIncome"> Rendimento esperado </label>

                                <div class="col-xs-4 col-sm-4">
                                    <?php
                                    echo $this->Html->tag(
                                        'span',
                                        '',
                                        array(
                                            'class' => 'label label-lg label-success arrowed-right hidden',
                                            'id' => 'DessertExpectedIncome'
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset style="padding: 16px">
                            <h1>Suco</h1>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMeal5RecipeId"> Receitas </label>

                                <div class="col-xs-12 col-sm-9">
                                    <select name="data[RecipesForMeal][5][recipe_id]" class="chosen-select" placeholder="Escolha uma receita" id="Juice">
                                        <?php foreach($recipes as $recipe): ?>
                                            <option value="<?php echo $recipe['Recipe']['id']; ?>" data-options-income="<?php echo $recipe['Recipe']['income']?>"><?php echo $recipe['Recipe']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeIncome"> Rendimento </label>

                                <div class="col-xs-4 col-sm-4" id="JuiceIncome">
                                    <?php
                                    $controlJuice[] = null;
                                    foreach($recipes as $recipe){
                                        if(!in_array($recipe['Recipe']['id'], $controlJuice)){
                                            echo $this->Html->tag(
                                                'span',
                                                $recipe['Recipe']['income'].' pessoas',
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'JuiceTag_'.$recipe['Recipe']['id']
                                                )
                                            );
                                            $controlJuice[] = $recipe['Recipe']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input(
                                    'RecipesForMeal.5.category',
                                    array(
                                        'type' => 'hidden',
                                        'value' => 'Suco'
                                    )
                                ); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealPortionMultiplier"> Quantidade </label>

                                <?php echo $this->Form->input(
                                    'RecipesForMeal.5.portion_multiplier',
                                    array(
                                        'type' => 'number',
                                        'div' => 'col-xs-12 col-sm-1',
                                        'id' => 'JuicePortionMultiplier',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div  class="col-xs-12 col-sm-8">
                                    <h4><small><i class="ace-icon fa fa-angle-double-right"></i> multiplicador de porcionamento da receita</small></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ExpectedIncome"> Rendimento esperado </label>

                                <div class="col-xs-4 col-sm-4">
                                    <?php
                                    echo $this->Html->tag(
                                        'span',
                                        '',
                                        array(
                                            'class' => 'label label-lg label-success arrowed-right hidden',
                                            'id' => 'JuiceExpectedIncome'
                                        )
                                    );
                                    ?>
                                </div>
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