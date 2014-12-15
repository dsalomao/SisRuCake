<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/12/14
 * Time: 21:36
 */
$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));

$this->Html->addCrumb('Planejamento de cardápio');
$this->Html->addCrumb('Eventos');
?>


<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Lista de eventos ativos
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('title', 'Título'); ?></th>
                        <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                        <th><?php echo $this->Paginator->sort('type', 'Tipo'); ?></th>
                        <th><?php echo $this->Paginator->sort('start', 'Data de Início'); ?></th>
                        <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('all_day', 'Integral'); ?></th>
                        <th class="actions"><?php echo __('Ações'); ?></th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?php echo h($event['Event']['title']); ?>&nbsp;</td>
                        <td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
                        <td><?php echo h($event['EventType']['name']); ?>&nbsp;</td>
                        <td class="hidden-md hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($event['Event']['start']))); ?>&nbsp;</td>
                        <td class="hidden-md hidden-sm hidden-xs"><?php echo h($event['Event']['all_day']); ?>&nbsp;</td><td class="actions">
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
                                        'data-placement' => 'top',
                                        'title' => 'ver produto',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-pencil bigger-130')
                                    ),
                                    array(
                                        'action' => 'edit',
                                        $event['Event']['id']
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
                                <?php
                                echo $this->Form->postlink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'glyphicon glyphicon-remove')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $event['Event']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-inverse actions-tooltip tooltip-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'desativar produto',
                                        'data-trigger' => 'hover'
                                    ),
                                    __('Ao ser desativado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $event['Event']['title'])
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
                                                    'data-original-title' => 'ver produto'
                                                )
                                            );
                                            ?>
                                        </li>

                                        <li>
                                            <?php
                                            echo $this->Html->link(
                                                $this->Html->tag(
                                                    'span',
                                                    $this->Html->tag(
                                                        'i',
                                                        '',
                                                        array('class' => 'ace-icon fa fa-pencil bigger-120')
                                                    ),
                                                    array(
                                                        'class' => 'orange'
                                                    )
                                                ),
                                                array(
                                                    'action' => 'edit',
                                                    $event['Event']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-warning',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'editar produto'
                                                )
                                            );
                                            ?>
                                        </li>

                                        <li>
                                            <?php
                                            echo $this->Html->link(
                                                $this->Html->tag(
                                                    'span',
                                                    $this->Html->tag(
                                                        'i',
                                                        '',
                                                        array('class' => 'glyphicon glyphicon-remove bigger-120')
                                                    ),
                                                    array(
                                                        'class' => 'inverse'
                                                    )
                                                ),
                                                array(
                                                    'action' => 'logical_delete',
                                                    $event['Product']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => ' actions-tooltip tooltip-default',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'desativar produto'
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
                <div class="col-xs-6">
                    <div class="dataTables_info" id="sample-table-2_info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="dataTables_paginate paging_bootstrap">
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
                    'controller' => 'events',
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