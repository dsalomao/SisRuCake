<?php
/*
 * View/EventTypes/index.ctp
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
$this->Html->addCrumb('Eventos', array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'index'));
?>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Tipos de eventos
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
                        <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('color', 'Cor'); ?></th>
                        <th class="actions"><?php echo __('Ações'); ?></th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($eventTypes as $eventType): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td><?php echo $eventType['EventType']['name']; ?>&nbsp;</td>
                        <td><?php echo $eventType['EventType']['color']; ?>&nbsp;</td>
                        <td class="actions">
                            <div class="btn-group">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-pencil bigger-130')
                                    ),
                                    array(
                                        'plugin' => 'full_calendar',
                                        'action' => 'edit',
                                        $eventType['EventType']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-warning actions-tooltip tooltip-warning',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'editar produto',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                ?>
                                &nbsp;

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
        </p>
    </div>
</div>
