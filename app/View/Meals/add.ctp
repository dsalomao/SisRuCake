<?php
$this->Html->addCrumb('Refeições', '/meals');
$this->Html->addCrumb('Adicionar refeição');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Nova refeição</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="form">
                        <?php echo $this->Form->create(
                            'Meals',
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
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductDateOfEntryMonth"> Código </label>


                                <?php echo $this->Form->input(
                                    'Meal.code',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Descri&ccedil;&atilde;o </label>


                                <?php echo $this->Form->input(
                                    'Meal.description',
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
