<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 27/08/14
 * Time: 21:27
 */

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
//$this->Html->script('users_index', array('inline' => false));

?>

<div class="page-header">
    <h1>Lista de usuários
        <small><i class="ace-icon fa fa-angle-double-right"></i></small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header" style="background-color: darkred;">
            Results for "Latest Registered Domains"
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
                    <th><?php echo $this->Paginator->sort('usernamename', 'Username'); ?></th>
                    <th><?php echo $this->Paginator->sort('first_name', 'Nome'); ?></th>
                    <th><?php echo $this->Paginator->sort('last_name', 'Sobrenomee'); ?></th>
                    <th><?php echo $this->Paginator->sort('role', 'Papel'); ?></th>
                    <th class="hidden-md"><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
                    <th class="hidden-md"><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                    <th><?php echo $this->Paginator->sort('restaurant_id', 'Und. UNESP'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                        <td class="hidden-md"><?php echo h(date("d-m-Y", strtotime($user['User']['created']))); ?>&nbsp;</td>
                        <td class="hidden-md"><?php echo h(date("d-m-Y", strtotime($user['User']['modified']))); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($user['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $user['Restaurant']['id'])); ?></td>
                        <td class="actions">
                            <div class="hidden-xs action-buttons">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-search-plus bigger-130')
                                    ),
                                    array(
                                        'action' => 'view',
                                        $user['User']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'blue actions-tooltip tooltip-info',
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
                                        $user['User']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'orange actions-tooltip tooltip-warning',
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
                                        array('class' => 'glyphicon glyphicon-ok')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $user['User']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-success actions-tooltip tooltip-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'desativar produto',
                                        'data-trigger' => 'hover'
                                    ),
                                    __('Ao ser deletado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $user['User']['username'])
                                );
                                ?>
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
                    'controller' => 'users',
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
                ).' Usuários ativos',
                array(
                    'controller' => 'users',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            );
            ?>
        </p>
    </div>
</div>