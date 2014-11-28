<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 25/11/14
 * Time: 14:59
 */

$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->html->script('suppliers_qualify', array('inline' => false));

?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Qualificar fornecedor</h4>
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
                                <label class="col-sm-3 control-label no-padding-right" for="SupplierQualification"> Nota </label>

                                <?php echo $this->Form->input(
                                    'Supplier.qualification',
                                    array(
                                        'type' => 'select',
                                        'class' => 'chosen-select',
                                        'options' => array(
                                            'A' => 'A',
                                            'B' => 'B',
                                            'C' => 'C',
                                            'D' => 'D',
                                            'E' => 'E',
                                            'F' => 'F',
                                        ),
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SupplierId"> Fornecedor </label>

                                <?php echo $this->Form->input(
                                    'Supplier.supplier_id',
                                    array(
                                        'type' => 'select',
                                        'class' => 'chosen-select',
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