<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->css('users', array('inline' => false));
//$this->Html->script('users_index', array('inline' => false));

$this->Html->addCrumb('Usuários');
?>
<div class="row">
    <div class="col-xs-12">

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Usuários do SisRuCake do <?php echo $users[0]['Restaurant']['name']; ?>.
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('usernamename', 'Username'); ?></th>
                    <th><?php echo $this->Paginator->sort('first_name', 'Nome'); ?></th>
                    <th class="hidden-md hidden-sm hidden-xs"><?php echo $this->Paginator->sort('last_name', 'Sobrenomee'); ?></th>
                    <th><?php echo $this->Paginator->sort('role', 'Papel'); ?></th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                    <th class="hidden-xs"><?php echo $this->Paginator->sort('restaurant_id', 'Und. UNESP'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="hidden-sm hidden-xs"><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
                        <td class="hidden-md hidden-sm hidden-xs"><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($user['User']['created']))); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($user['User']['modified']))); ?>&nbsp;</td>
                        <td class="hidden-xs"><?php echo $this->Html->link($user['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $user['Restaurant']['id'])); ?></td>
                        <td class="actions">
                            <div class="hidden-sm hidden-xs btn-group">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-search-plus')
                                    ),
                                    array(
                                        'action' => 'view',
                                        $user['User']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-primary actions-tooltip tooltip-info',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'ver usuário',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-pencil')
                                    ),
                                    array(
                                        'action' => 'edit',
                                        $user['User']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-warning actions-tooltip tooltip-warning',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'editar usuário',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                echo $this->Form->postlink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'glyphicon glyphicon-remove')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $user['User']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-inverse actions-tooltip tooltip-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'desativar usuário',
                                        'data-trigger' => 'hover'
                                    ),
                                    __('Um usuário desativado não poderá mais acessar o SisRuCake. Deseja continuar com a operação?')
                                );
                                ?>
                            </div>
                            <div class="hidden-lg hidden-md">
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
                                                    $user['User']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-info',
                                                    'data-rel' => 'tooltip',
                                                    'data-placement' => 'right',
                                                    'data-original-title' => 'ver usuário'
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
                                                    $user['User']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-warning',
                                                    'data-rel' => 'tooltip',
                                                    'data-placement' => 'right',
                                                    'data-original-title' => 'editar usuário'
                                                )
                                            );
                                            ?>
                                        </li>

                                        <li>
                                            <?php
                                            echo $this->form->postLink(
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
                                                    $user['User']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => ' actions-tooltip tooltip-default',
                                                    'data-rel' => 'tooltip',
                                                    'data-placement' => 'right',
                                                    'data-original-title' => 'desativar usuário'
                                                ),
                                                __('Um usuário desativado não poderá mais acessar o SisRuCake. Deseja continuar com a operação?')
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
                    <div class="dataTables_info products-list-info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_paginate paging_bootstrap products-list-pagging">
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
        <div class="btn-group">
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Novo',
                array(
                    'controller' => 'users',
                    'action' => 'add'
                ),
                array('class' => 'btn btn-lg btn-primary btn-users', 'escape' => false)
            );
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-eye')
                ).' Usuários desativados',
                array(
                    'controller' => 'users',
                    'action' => 'deleted_index'
                ),
                array('class' => 'btn btn-lg btn-inverse btn-users', 'escape' => false)
            );
            ?>
        </div>
    </div>
</div>

<script>
    jQuery(function($) {
        $('.actions-tooltip').tooltip();
    });
</script>