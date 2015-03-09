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
$this->Html->script('products', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Produtos', '/products');
$this->Html->addCrumb('Editar produto');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Editar produto: <?php echo $this->data['Product']['name']?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="products form">
                        <?php echo $this->Form->create(
                            'Product',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                                )
                            )
                        ); ?>
                        <fieldset style="padding: 16px">
                            <?php echo $this->Form->input('id'); ?>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="ProductName"> Nome </label>

                                <?php echo $this->Form->input(
                                    'Product.name',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="ProductCode"> Código </label>


                                <?php echo $this->Form->input(
                                    'Product.code',
                                    array(
                                        'div' => 'col-sm-9'

                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="ProductLoadMIn"> Estoque m&iacute;nimo </label>


                                <?php echo $this->Form->input(
                                    'Product.load_min',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'input-mini',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="ProductLoadMax"> Estoque m&aacute;ximo </label>


                                <?php echo $this->Form->input(
                                    'Product.load_max',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'input-mini',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="ProductMeasureUnitId"> Unidade de medida </label>


                                <?php echo $this->Form->input(
                                    'Product.measure_unit_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha uma unidade'
                                    )
                                ); ?>

                            </div>

                        </fieldset>

                        <div class="form-actions center">
                            <?php echo $this->Form->button(
                                'editar &nbsp;'.$this->Html->tag(
                                    'i',
                                    '',
                                    array(
                                        'class' => '"ace-icon fa fa-arrow-right icon-on-right bigger-110'
                                    )
                                ),
                                array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-warning',
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