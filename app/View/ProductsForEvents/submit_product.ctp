<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 03/10/14
 * Time: 09:22
 */

$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('ace/fuelux.spinner', array('inline' => false));
//$this->Html->script('productsForRecipes', array('inline' => false));
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title col-sm-6">Retirar produto utilizado na refeição: <?php echo $event['Event']['title']; ?> </h4><h4 class="widget-title col-sm-6" style="text-align: right">Código produto: <?php echo $product['Product']['code']; ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="productsForRecipes form">
                        <?php echo $this->Form->create(
                            'ProductsForEvent',
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
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Quantidade </label>

                                    <?php echo $this->Form->input(
                                        'quantity',
                                        array(
                                            'type' => 'text',
                                            'div' => 'col-sm-1',
                                            'class' => 'input-mini'
                                        )
                                    ); ?>
                                    <div class="col-sm-8">
                                            <?php echo $this->Html->tag(
                                                'span',
                                                $product['MeasureUnit']['name'],
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right',
                                                    'id' => 'tag_'.$product['MeasureUnit']['id']
                                                )
                                            ); ?>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="ProductsForEvent"> Data </label>


                                        <?php echo $this->Form->input(
                                            'date_of_submission',
                                            array(
                                                'div' => 'col-sm-9'
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
