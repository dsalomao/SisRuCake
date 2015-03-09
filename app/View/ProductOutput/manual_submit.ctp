<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 03/10/14
 * Time: 09:22
 */

echo $this->Html->css('bootstrap-datetimepicker');

echo $this->Html->script('libs/moment');
echo $this->Html->script('libs/bootstrap-datetimepicker');
echo $this->Html->script('libs/bootstrap-datetimepicker.pt-BR');
echo $this->Html->script('productOutput');

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Produtos', '/products');
$this->Html->addCrumb( $product['Product']['name'], '/products/view/'.+ $product['Product']['id']);
$this->Html->addCrumb('Remover do estoque');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title col-sm-6">Produto: <?php echo $product['Product']['name']; ?> </h4><h4 class="widget-title col-sm-6" style="text-align: right">Código produto: <?php echo $product['Product']['code']; ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="productsForRecipes form">
                        <?php echo $this->Form->create(
                            'ManualAdjustment',
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
                                    'ProductOutput.quantity',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-xs-6 col-sm-2',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div class="col-xs-6 col-sm-7">
                                    <?php echo $this->Html->link(
                                        $product['MeasureUnit']['name'],
                                        array('controller' => 'measure_units', 'action' => 'index'),
                                        array(
                                            'class' => 'label label-lg label-info arrowed-right',
                                            'id' => 'measure-unit-tag'
                                        )
                                    ); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Dia da retirada </label>

                                <?php echo $this->Form->input(
                                    'ProductOutput.date_of_submission',
                                    array(
                                        'div' => array(
                                            'class' => 'input-group date col-sm-9',
                                            'style' => 'padding-left:12px;padding-right:12px;',
                                            'id' => 'date_of_submission_dtp'
                                        ),
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'after' => $this->html->tag('span', $this->html->tag('span', '', array('class' => 'glyphicon glyphicon-calendar')), array('class' => 'input-group-addon'))
                                    )
                                ); ?>
                            </div>
                            <div class="form-group">

                                <?php echo $this->Form->input(
                                    'product_id',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'hidden',
                                        'class' => 'form-control',
                                        'value' => $product['Product']['id']
                                    )
                                ); ?>
                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <?php echo $this->Form->button(
                                $this->Html->tag(
                                    'i',
                                    ' Remover',
                                    array(
                                        'class' => '"ace-icon fa fa-cloud-download icon-on-right bigger-110'
                                    )
                                ),
                                array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-danger',
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