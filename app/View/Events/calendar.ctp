<?php
    echo $this->Html->css('fullcalendar');
    echo $this->Html->css('jquery.datetimepicker');
    echo $this->Html->css('jquery.qtip');

    echo $this->Html->script('ace/jquery-ui.custom');
    echo $this->Html->script('ace/fullcalendar');
    echo $this->Html->script('ace/bootbox');
    echo $this->Html->script('ace/fuelux.wizard.min');
    echo $this->Html->script('libs/moment');
    echo $this->Html->script('calendar');
    echo $this->Html->script('libs/jquery.datetimepicker');
    echo $this->Html->script('libs/jquery.qtip');

    $this->Html->css('events', array('inline' => false));

    $this->Html->addCrumb('Planejamento de cardápio');
    $this->Html->addCrumb('Eventos', '/events');
    $this->Html->addCrumb('Calendário');
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
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-xs-12">
        <h4 class="header smaller lighter blue"> A&ccedil;&otilde;es </h4>
        <div class="btn-group">
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Novo',
                array(
                    'controller' => 'events',
                    'action' => 'add'
                ),
                array(
                    'class' => 'btn btn-lg btn-primary btn-events',
                    'escape' => false,
                    'id' => 'new_event',
                    'data-toggle' => 'modal'
                )
            );
            ?>
        </div>
    </div>
</div>

