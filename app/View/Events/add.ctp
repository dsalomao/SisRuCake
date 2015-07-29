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

echo $this->Html->css('bootstrap-datetimepicker');

echo $this->Html->script('libs/moment');
echo $this->Html->script('libs/bootstrap-datetimepicker');
echo $this->Html->script('libs/bootstrap-datetimepicker.pt-BR');
echo $this->Html->script('events_add');

$this->Html->addCrumb('Planejamento do cardápio');
$this->Html->addCrumb('Eventos', array('controller' => 'events', 'action' => 'index'));
$this->Html->addCrumb('Calendário', array('controller' => 'events', 'action' => 'calendar'));
$this->Html->addCrumb('Adicionar    ');


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
                                <label class="col-sm-3 control-label no-padding-right" for="EventEventTypeId"> Tipo </label>

                                <?php echo $this->Form->input(
                                    'Event.event_type_id',
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
                                        'div' => array(
                                            'class' => 'input-group date col-sm-9',
                                            'style' => 'padding-left:12px;padding-right:12px;',
                                            'id' => 'EventStartWrapper'
                                        ),
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'after' => $this->html->tag('span', $this->html->tag('span', '', array('class' => 'glyphicon glyphicon-calendar')), array('class' => 'input-group-addon'))
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventEnd"> Fim </label>

                                <?php echo $this->Form->input(
                                    'Event.end',
                                    array(
                                        'div' => array(
                                            'class' => 'col-sm-9 input-group date',
                                            'style' => 'padding-left:12px;padding-right:12px;',
                                            'id' => 'EventEndWrapper'
                                        ),
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'after' => $this->html->tag('span', $this->html->tag('span', '', array('class' => 'glyphicon glyphicon-calendar')), array('class' => 'input-group-addon'))
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventAllDay"> Integral </label>

                                <?php echo $this->Form->input(
                                    'Event.all_day',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'checkbox',
                                        'class' => 'ace ace-switch ace-switch-5',
                                        'after' => $this->Html->tag('span', '', array('class' => 'lbl middle', 'data-lbl' => 'Sim&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Não', 'escape' => false))
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="EventStatus"> Status </label>

                                <?php echo $this->Form->input(
                                    'Event.status',
                                    array(
                                        'id' => 'EventStatus',
                                        'div' => 'col-sm-9',
                                        'options' => array(
                                            'agendado' => 'Agendado',
                                            'confirmado' => 'Confirmado',
                                        )
                                    )
                                ); ?>

                            </div>
                            <div class="form-group" name="mealIdFormGroup">
                                <label class="col-sm-3 control-label no-padding-right" for="EventMealId"> Refeição </label>

                                <?php echo $this->Form->input(
                                    'Event.meal_id',
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