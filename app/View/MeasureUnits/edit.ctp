<?php

$this->Html->addCrumb('Unidades de medida', '/measure_units');
$this->Html->addCrumb('Editar unidade de medida');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Editar unidade: <?php echo $this->data['MeasureUnit']['name']?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="products form">
                        <?php echo $this->Form->create(
                            'MeasureUnit',
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
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Nome </label>

                                <?php echo $this->Form->input(
                                    'name',
                                    array(
                                        'div' => 'col-sm-9'
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
