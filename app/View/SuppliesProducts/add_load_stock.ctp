<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */
$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('ace/fuelux.spinner', array('inline' => false));
$this->Html->script('ace/bootstrap-datepicker', array('inline' => false));
$this->Html->script('suppliesProducts', array('inline' => false));
?>

<div class="page-header">
    <h1>Entrada em estoque<small><i class="ace-icon fa fa-angle-double-right"></i> dar entrada em produto j&aacute; exixtente</small></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title col-sm-6">Entrada de nova quantidade de: <?php echo $product['Product']['name']; ?></h4><h4  style="text-align: right" class="widget-title col-sm-6">Código:  <?php echo $product['Product']['code']; ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="suppliesProducts form">
                        <?php echo $this->Form->create(
                            'SuppliesProduct',
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
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Quantidade </label>

                                <?php echo $this->Form->input(
                                    'quantity',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9',
                                        'class' => 'input-mini'
                                    )
                                ); ?>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductProductId"> Preço </label>


                                <?php echo $this->Form->input(
                                    'price',
                                    array(
                                        'div' => 'col-sm-9',

                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductDateOfEntryMonth"> dia </label>

                                    <?php echo $this->Form->input(
                                        'date_of_entry',
                                        array(
                                            'dateFormat' => 'DMY',
                                            'div' => 'col-sm-9'
                                        )
                                    ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Fornecedor </label>


                                <?php echo $this->Form->input(
                                    'supplier_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha um fornecedor'

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
