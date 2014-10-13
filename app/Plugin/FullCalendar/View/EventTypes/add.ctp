<?php
/*
 * Views/EventTypes/add.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Novo produto</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="eventTypes form">
                        <?php echo $this->Form->create(
                            'EventType',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                            )
                        ));?>
                        <fieldset style="padding: 16px">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventTypeName"> Nome </label>

                                <?php echo $this->Form->input(
                                    'EventType.name',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventTypeColor"> Cor </label>

                                <?php echo $this->Form->input(
                                    'EventType.color',
                                    array(
                                        'div' => 'col-sm-9',
                                        'options' => array(
                                            'Blue' => 'Blue',
                                            'Red' => 'Red',
                                            'Pink' => 'Pink',
                                            'Purple' => 'Purple',
                                            'Orange' => 'Orange',
                                            'Green' => 'Green',
                                            'Gray' => 'Gray',
                                            'Black' => 'Black',
                                            'Brown' => 'Brown'
                                        )
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

