<?php
/*
 * View/Events/add.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

$this->Html->addCrumb('Planejamento do cardápio');
$this->Html->addCrumb('Calendário', array('plugin' => 'full_calendar', 'controller' => 'full_calendar', 'action' => 'index'));

?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Novo evento</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="eventTypes form">
                        <?php echo $this->Form->create(
                            'Event',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'action' => 'add',
                                'inputDefaults' => array(
                                    'label' => false
                                )
                            ));?>
                        <fieldset style="padding: 16px">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventEventTypeId"> Nome </label>

                                <?php echo $this->Form->input(
                                    'Event.event_type_id',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventTitle"> Título </label>

                                <?php echo $this->Form->input(
                                    'Event.title',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventDetails"> Detalhes </label>

                                <?php echo $this->Form->input(
                                    'Event.details',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventStart"> Início </label>

                                <?php echo $this->Form->input(
                                    'Event.start',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventEnd"> Fim </label>

                                <?php echo $this->Form->input(
                                    'Event.end',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventAllDay"> Integral </label>

                                <?php echo $this->Form->input(
                                    'Event.all_day',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventStatus"> Status </label>

                                <?php echo $this->Form->input(
                                    'Event.status',
                                    array(
                                        'div' => 'col-sm-9',
                                        'options' => array(
                                            'Scheduled' => 'Agendado',
                                            'Confirmed' => 'Confirmado',
                                            'In Progress' => 'Em progresso',
                                            'Rescheduled' => 'Reagendado',
                                            'Completed' => 'Completo'
                                        )
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventMealId"> Refeição </label>

                                <?php echo $this->Form->input(
                                    'Event.event',
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