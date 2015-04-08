<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/12/14
 * Time: 21:36
 */
$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));

$this->Html->css('events', array('inline' => false));

$this->Html->addCrumb('Planejamento de cardápio');
$this->Html->addCrumb('Eventos');
?>


<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Lista de eventos cadastrados
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="hidden-xs"><?php echo $this->Paginator->sort('type', 'Tipo'); ?></th>
                        <th><?php echo $this->Paginator->sort('details', 'Detalhes'); ?></th>
                        <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
                        <th><?php echo $this->Paginator->sort('start', 'Data de Início'); ?></th>
                        <th class="hidden-md hidden-sm hidden-xs"><?php echo $this->Paginator->sort('all_day', 'Integral'); ?></th>
                        <th class="actions"><?php echo __('Ações'); ?></th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td class="hidden-xs"><?php echo h($event['EventType']['name']); ?>&nbsp;</td>
                        <td><?php echo h($event['Event']['details']); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h($event['Event']['status']); ?>&nbsp;</td>
                        <td><?php echo h(date("d-m-Y / H:i:s", strtotime($event['Event']['start']))); ?>&nbsp;</td>
                        <td class="hidden-md hidden-sm hidden-xs">
                            <?php
                            if($event['Event']['all_day'])
                                echo $this->Html->tag(
                                    'span',
                                    $this->Html->tag('i', '',array('class' => 'glyphicon glyphicon-ok')),
                                    array(
                                        'class' => 'label label-sm label-success',
                                        'escape' => false
                                    )
                                );
                            else
                                echo $this->Html->tag(
                                    'span',
                                    $this->Html->tag('i', '',array('class' => 'glyphicon glyphicon-remove')),
                                    array(
                                        'class' => 'label label-sm label-inverse',
                                        'escape' => false
                                    )
                                );
                            ?>&nbsp;
                        </td>
                        <td class="actions">
                            <div class="hidden-xs hidden-sm hidden-md btn-group">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-search-plus')
                                    ),
                                    array(
                                        'action' => 'view',
                                        $event['Event']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-primary actions-tooltip tooltip-info',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'right',
                                        'title' => 'ver evento',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                ?>
                            </div>
                            <div class="hidden-lg">
                                <div class="inline position-relative">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag(
                                            'i',
                                            '',
                                            array('class' => 'ace-icon fa fa-cog icon-only bigger-110')
                                        ),
                                        '',
                                        array(
                                            'escape' => false,
                                            'class' => 'btn btn-minier btn-primary dropdown-toggle',
                                            'data-toggle' => 'dropdown',
                                            'data-position' => 'auto'
                                        )
                                    );
                                    ?>
                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <?php
                                            echo $this->Html->link(
                                                $this->Html->tag(
                                                    'span',
                                                    $this->Html->tag(
                                                        'i',
                                                        '',
                                                        array('class' => 'ace-icon fa fa-search-plus bigger-120')
                                                    ),
                                                    array(
                                                        'class' => 'blue'
                                                    )
                                                ),
                                                array(
                                                    'action' => 'view',
                                                    $event['Event']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-info',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'ver evento'
                                                )
                                            );
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_info measure-units-list-info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_paginate paging_bootstrap measure-units-list-paging">
                        <ul class="pagination">
                            <?php
                            echo $this->Paginator->prev(
                                $this->Html->tag('i', '', array('class' => 'fa fa-angle-double-left')),
                                array(
                                    'tag' => 'li',
                                    'escape' => false,
                                ),
                                $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-angle-double-left')), '', array('escape' => false)),
                                array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false,)
                            );
                            echo $this->Paginator->numbers(array(
                                'separator' => '',
                                'tag' => 'li',
                                'currentClass' => 'active',
                                'currentTag' => 'a'
                            ));
                            echo $this->Paginator->next(
                                $this->Html->tag('i', '', array('class' => 'fa fa-angle-double-right')),
                                array(
                                    'tag' => 'li',
                                    'escape' => false,
                                ),
                                $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-angle-double-right')), '', array('escape' => false)),
                                array('class' => 'next disabled', 'tag' => 'li', 'escape' => false,)
                            );
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                array('class' => 'btn btn-lg btn-primary btn-events', 'escape' => false)
            );
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-calendar')
                ).' Calendário',
                array(
                    'controller' => 'events',
                    'action' => 'calendar'
                ),
                array('class' => 'btn btn-lg btn-inverse btn-events', 'escape' => false)
            );
            ?>
        <div class="space"></div>
    </div>
</div>

<script>
    jQuery(function($) {
        $('.actions-tooltip').tooltip();
    });
</script>