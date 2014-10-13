<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

$this->Html->addCrumb('Planejamento do cardápio');
$this->Html->addCrumb('Calendário');
?>

<script type="text/javascript">
    plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>

<?php
    echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min', '/full_calendar/js/ready'), array('inline' => 'false'));
    echo $this->Html->css('/full_calendar/css/fullcalendar', null, array('inline' => false));
?>


<div class="Calendar index">
	<div id="calendar"></div>
</div>

<h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
<div class="row">
    <p>
        <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Novo Evento',
                array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add'),
                array(
                    'escape' => false,
                    'class' => 'btn btn-lg btn-info'
                )
            );
        ?>
        <?php
        echo $this->Html->link(
            $this->Html->tag(
                'i',
                '',
                array('class' => 'ace-icon fa fa-pencil')
            ).' Lista de eventos',
            array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'index'),
            array(
                'escape' => false,
                'class' => 'btn btn-lg btn-inverse'
            )
        );
        ?>
        <?php
        echo $this->Html->link(
            $this->Html->tag(
                'i',
                '',
                array('class' => 'ace-icon fa fa-eye')
            ).' Tipos de eventos',
            array('plugin' => 'full_calendar', 'controller' => 'eventTypes', 'action' => 'index'),
            array(
                'escape' => false,
                'class' => 'btn btn-lg btn-inverse'
            )
        );
        ?>
    </p>
</div>
