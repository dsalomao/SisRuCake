<?php
    echo $this->Html->css('fullcalendar');

    echo $this->Html->script('ace/jquery-ui.custom');
    echo $this->Html->script('ace/fullcalendar');
    echo $this->Html->script('calendar');
    echo $this->Html->script('ace/bootbox');
    echo $this->Html->script('ace/fuelux.wizard.min');
?>

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
            <div class="col-sm-9">
                <div class="space"></div>

                <!-- #section:plugins/data-time.calendar -->
                <div id="calendar"></div>

                <!-- /section:plugins/data-time.calendar -->
            </div>

            <div class="col-sm-3">
                <div class="widget-box transparent">
                    <div class="widget-header">
                        <h4>Draggable events</h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <div id="external-events">
                                <div class="external-event label-grey" data-class="label-grey">
                                    <i class="ace-icon fa fa-arrows"></i>
                                    My Event 1
                                </div>

                                <div class="external-event label-success" data-class="label-success">
                                    <i class="ace-icon fa fa-arrows"></i>
                                    My Event 2
                                </div>

                                <div class="external-event label-danger" data-class="label-danger">
                                    <i class="ace-icon fa fa-arrows"></i>
                                    My Event 3
                                </div>

                                <div class="external-event label-purple" data-class="label-purple">
                                    <i class="ace-icon fa fa-arrows"></i>
                                    My Event 4
                                </div>

                                <div class="external-event label-yellow" data-class="label-yellow">
                                    <i class="ace-icon fa fa-arrows"></i>
                                    My Event 5
                                </div>

                                <div class="external-event label-pink" data-class="label-pink">
                                    <i class="ace-icon fa fa-arrows"></i>
                                    My Event 6
                                </div>

                                <div class="external-event label-info" data-class="label-info">
                                    <i class="ace-icon fa fa-arrows"></i>
                                    My Event 7
                                </div>

                                <label>
                                    <input type="checkbox" class="ace ace-checkbox" id="drop-remove" />
                                    <span class="lbl"> Remove after drop</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-xs-12">
        <h4> A&ccedil;&otilde;es </h4>
        <div class="hr dotted"></div>
        <p>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Novo',
                '#modal-wizard',
                array(
                    'class' => 'btn btn-lg btn-primary',
                    'escape' => false,
                    'id' => 'new_event',
                    'data-toggle' => 'modal'
                )
            );
            ?>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-eye')
                ).' Produtos desativados',
                array(
                    'controller' => 'products',
                    'action' => 'deleted_index'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            );
            ?>
        </p>
    </div>
</div>

<div id="modal-wizard" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="my-wizard" class="modal-header" data-target="#modal-step-contents">
                <ul class="wizard-steps">
                    <li data-target="#modal-step1" class="active">
                        <span class="step">1</span>
                        <span class="title">Propriedades</span>
                    </li>

                    <li data-target="#modal-step2">
                        <span class="step">2</span>
                        <span class="title">Data</span>
                    </li>

                    <li data-target="#modal-step3">
                        <span class="step">3</span>
                        <span class="title">Info evento</span>
                    </li>
                </ul>
            </div>

            <div class="modal-body step-content" id="modal-step-contents">
                <?php
                echo $this->Form->create(
                    'Event',
                    array(
                        'class' => 'form-horizontal',
                        'role' => 'form',
                        'inputDefaults' => array(
                            'label' => false
                        )
                    )
                );
                ?>
                <div class="step-pane active" id="modal-step1">
                    <fieldset style="padding: 16px">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="EventEventTypeId"> Tipo de evento. </label>

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
                    </fieldset>
                </div>

                <div class="step-pane" id="modal-step2">
                    <fieldset style="padding: 16px">
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
                    </fieldset>
                </div>

                <div class="step-pane" id="modal-step3">
                    <fieldset style="padding: 16px">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="EventEventTypeId"> Refeições </label>

                            <?php echo $this->Form->input(
                                'Event.meals',
                                array(
                                    'div' => 'col-sm-9'
                                )
                            ); ?>

                        </div>
                    </fieldset>
                    <div class="center">
                        <h3 class="green">Ótimo!</h3>
                        Seu evento está pronto para ser enviado, clique em terminar!
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>

            <div class="modal-footer wizard-actions">
                <button class="btn btn-sm btn-prev">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    Anterior
                </button>

                <button class="btn btn-success btn-sm btn-next" data-last="Terminar">
                    Próximo
                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                </button>

                <button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>