<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 31/07/14
 * Time: 21:15
 */
$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('ace/fuelux.spinner', array('inline' => false));
$this->Html->script('recipesForMeals', array('inline' => false));
echo $this->Html->script('ace/bootbox');

$this->Html->addCrumb('Refeições', '/meals');
$this->Html->addCrumb($meal['Meal']['code'], array('controller' => 'Meals', 'action' => 'view', $meal['Meal']['id']));
$this->Html->addCrumb('adicionar receita');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title col-sm-6">Adicionar receita à refeição: <?php echo $meal['Meal']['code']; ?></h4>
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

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeId"> Receitas </label>

                                <div class="col-xs-12 col-sm-9">
                                    <select name="data[RecipesForMeal][recipe_id]" class="chosen-select" placeholder="Escolha um produto" id="RecipesForMealRecipeId">
                                        <?php foreach($recipes as $recipe): ?>
                                            <option value="<?php echo $recipe['Recipe']['id']; ?>" data-options-income="<?php echo $recipe['Recipe']['income']?>"><?php echo $recipe['Recipe']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealRecipeIncome"> Rendimento </label>

                                <div class="col-xs-4 col-sm-4">
                                    <?php
                                    $control[] = null;
                                    foreach($recipes as $recipe){
                                        if(!in_array($recipe['Recipe']['id'], $control)){
                                            echo $this->Html->tag(
                                                'span',
                                                $recipe['Recipe']['income'].' pessoas',
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'tag_'.$recipe['Recipe']['id']
                                                )
                                            );
                                            $control[] = $recipe['Recipe']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="RecipesForMealPortionMultiplier"> Quantidade </label>


                                <?php echo $this->Form->input(
                                    'portion_multiplier',
                                    array(
                                        'type' => 'number',
                                        'div' => 'col-xs-12 col-sm-1',
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
                                            'id' => 'ExpectedIncome'
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