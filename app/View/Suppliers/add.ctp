<?php

/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */

$this->Html->css('datepicker', array('inline' => false));
$this->Html->script('ace/fuelux.spinner', array('inline' => false));
$this->Html->script('suppliesProducts', array('inline' => false));
$this->Html->script('ace/bootstrap-datepicker', array('inline' => false));

?>

<div class="page-header">
    <h1>Adicionar fornecedor<small><i class="ace-icon fa fa-angle-double-right"></i></small></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Novo fornecedor</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="suppliers form">
                        <?php echo $this->Form->create(
                            'Suppliers',
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
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Nome </label>

                                <?php echo $this->Form->input(
                                    'Supplier.name',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductDateOfEntryMonth"> Código </label>


                                <?php echo $this->Form->input(
                                    'Supplier.code',
                                    array(
                                        'div' => 'col-sm-9'

                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Status </label>


                                <?php echo $this->Form->input(
                                    'Supplier.status',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Endere&ccedil;o </label>


                                <?php echo $this->Form->input(
                                    'Supplier.adress',
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
