<?php
/*
 * View/Events/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));

$this->Html->addCrumb('Planejamento do cardápio');
$this->Html->addCrumb('Calendário', array('plugin' => 'full_calendar', 'controller' => 'full_calendar', 'action' => 'index'));
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Lista de eventos
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th><?php echo $this->Paginator->sort('event_type_id', 'Evento');?></th>
                        <th><?php echo $this->Paginator->sort('title', 'Título');?></th>
                        <th><?php echo $this->Paginator->sort('status', 'Status');?></th>
                        <th><?php echo $this->Paginator->sort('start', 'Início');?></th>
                        <th><?php echo $this->Paginator->sort('end', 'Fim');?></th>
                        <th><?php echo $this->Paginator->sort('all_day', 'Integral');?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td class="center">
                                <label class="position-relative">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td>
                                <?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
                            </td>
                            <td><?php echo $event['Event']['title']; ?></td>
                            <td><?php echo $event['Event']['status']; ?></td>
                            <td><?php echo $event['Event']['start']; ?></td>
                            <?php if($event['Event']['all_day'] == 0) { ?>
                                <td><?php echo $event['Event']['end']; ?></td>
                            <?php } else { ?>
                                <td>N/A</td>
                            <?php } ?>
                            <td><?php if($event['Event']['all_day'] == 1) { echo "Yes"; } else { echo "No"; } ?>&nbsp;</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div

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
                array(
                    'plugin' => 'full_calendar',
                    'action' => 'add'
                ),
                array('class' => 'btn btn-lg btn-primary', 'escape' => false)
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
</div>