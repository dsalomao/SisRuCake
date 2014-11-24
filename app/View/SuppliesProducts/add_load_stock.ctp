<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */
$this->html->css('chosen', array('inline' => false));
echo $this->Html->css('bootstrap-datetimepicker');

echo $this->Html->script('libs/moment');
echo $this->Html->script('libs/bootstrap-datetimepicker');
echo $this->Html->script('libs/bootstrap-datetimepicker.pt-BR');
$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('libs/jquery.mask', array('inline' => false));
$this->Html->script('suppliesProducts', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Produtos', '/products');
$this->Html->addCrumb('Adicionar em estoque');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title col-md-6 col-sm-12 col-xs-12">Entrada de nova quantidade de: <?php echo $product['Product']['name']; ?></h4><h4  style="text-align: right" class="widget-title col-md-6 col-sm-12 col-xs-12">Código:  <?php echo $product['Product']['code']; ?></h4>
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
                                <label class="col-sm-3 col-xs-12 control-label no-padding-right" for="SuppliesProductQuantity"> Quantidade </label>

                                <?php echo $this->Form->input(
                                    'quantity',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-2 col-xs-6',
                                        'class' => 'input-mini'
                                    )
                                ); ?>

                                <?php echo $this->Html->tag(
                                    'span',
                                    $this->Html->tag(
                                        'span',
                                        $product['MeasureUnit']['name'],
                                        array(
                                            'class' => 'label label-lg label-info arrowed-right'
                                        )
                                    ),
                                    array(
                                        'class' => 'help-inline col-xs-6 col-sm-7'
                                    )
                                ); ?>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductProductId"> Preço </label>


                                <?php echo $this->Form->input(
                                    'price',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-2 col-xs-6',
                                        'class' => 'input-mini'
                                    )
                                ); ?>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductDateOfEntry"> dia </label>

                                    <?php echo $this->Form->input(
                                        'date_of_entry',
                                        array(
                                            'div' => array(
                                                'class' => 'input-group date col-sm-9',
                                                'style' => 'padding-left:12px;padding-right:12px;',
                                                'id' => 'date_of_entry_dtp'
                                            ),
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'after' => $this->html->tag('span', $this->html->tag('span', '', array('class' => 'glyphicon glyphicon-calendar')), array('class' => 'input-group-addon'))
                                        )
                                    ); ?>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductProductId"> Número da nota fiscal </label>


                                <?php echo $this->Form->input(
                                    'invoice',
                                    array(
                                        'div' => 'col-sm-9',

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
