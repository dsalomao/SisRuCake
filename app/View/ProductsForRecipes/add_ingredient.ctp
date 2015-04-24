<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 22/07/14
 * Time: 15:21
 */
    $this->html->css('chosen', array('inline' => false));

    $this->html->script('ace/chosen.jquery', array('inline' => false));
    $this->Html->script('ace/fuelux.spinner', array('inline' => false));
    $this->Html->script('productsForRecipes', array('inline' => false));

    $this->Html->addCrumb('Receituário padrão');
    $this->Html->addCrumb('Receitas', '/recipes');
    $this->Html->addCrumb($thisRecipe['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $thisRecipe['Recipe']['id']));
    $this->Html->addCrumb('Adicionar ingrediente');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <div class="col-sm-6">
                    <h4 class="widget-title">Adicionar ingrediente</h4>
                </div>
                <div class="col-sm-6">
                    <h4 class="widget-title" style="text-align: right;">Código receita: <?php echo $thisRecipe['Recipe']['code']; ?></h4>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="productsForRecipes form">
                        <?php echo $this->Form->create(
                            'ProductsForRecipe',
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
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Quantidade </label>

                                <?php echo $this->Form->input(
                                    'quantity',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-xs-6 col-sm-2',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div class="col-xs-6 col-sm-7">
                                    <?php
                                    $control[] = null;
                                    foreach($products as $product){
                                        if(!in_array($product['MeasureUnit']['id'], $control)){
                                            echo $this->Html->tag(
                                                'span',
                                                $product['MeasureUnit']['name'],
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'tag_'.$product['MeasureUnit']['id']
                                                )
                                            );
                                            $control[] = $product['MeasureUnit']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ProductsForRecipeProductId"> Produto </label>

                                <div class="col-sm-9">
                                    <select name="data[ProductsForRecipe][product_id]" class="chosen-select" placeholder="Escolha um produto" id="ProductsForRecipeProductId">
                                        <?php foreach($products as $product): ?>
                                            <option value="<?php echo $product['Product']['id']; ?>" data-measure-unit-id="<?php echo $product['MeasureUnit']['id']?>"><?php echo $product['Product']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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