<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 14/07/14
 * Time: 18:52
 */

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php


$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('products_indexes', array('inline' => false));

$this->Html->css('products', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Produtos', array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb('Produtos desativados');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header" style="background-color: darkred">
            Tabela de produtos desativados
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <!-- config heading titles and there paginator options -->
                    <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                    <th><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
                    <th><?php echo $this->Paginator->sort('load_stock', 'Qtd. em estoque'); ?></th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('measure_unit_id', 'Und. de medida'); ?></th>
                    <th class="hidden-md hidden-sm hidden-xs"><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
                    <th class="hidden-md hidden-sm hidden-xs"><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                    <th class="hidden-md hidden-sm hidden-xs"><?php echo $this->Paginator->sort('restaurant_id', 'Und. UNESP'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
                        <td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
                        <td style="text-align: right;"><?php echo h($product['Product']['load_stock']); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo $this->Html->link($product['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $product['MeasureUnit']['id'])); ?>&nbsp;</td>
                        <td class="hidden-md hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($product['Product']['created']))); ?>&nbsp;</td>
                        <td class="hidden-md hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($product['Product']['modified']))); ?>&nbsp;</td>
                        <td class="hidden-md hidden-sm hidden-xs"><?php echo $this->Html->link($product['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $product['Restaurant']['id'])); ?></td>
                        <td class="actions">
                            <div class="hidden-md hidden-sm hidden-xs btn-group">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-search-plus')
                                    ),
                                    array(
                                        'action' => 'view',
                                        $product['Product']['id']
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
                                echo $this->Form->postLink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'glyphicon glyphicon-ok')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $product['Product']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-success'
                                    ),
                                    __('Esta operação irá restaurar este produto entre os produtos em estoque. Deseja continuar?', $product['Product']['name'])
                                );
                                ?>
                                &nbsp;
                                <?php
                                echo $this->Form->postLink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-trash-o')
                                    ),
                                    array(
                                        'action' => 'delete',
                                        $product['Product']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-danger actions-tooltip tooltip-info'
                                    ),
                                    __('Tem certeza que deseja deletar permanentemente o produto: %s?', $product['Product']['name'])
                                );
                                ?>
                            </div>

                            <!-- buttons inside the md, sm and xs cog button -->
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
                                                    $product['Product']['id']
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
                                            echo $this->form->postLink(
                                                $this->Html->tag(
                                                    'span',
                                                    $this->Html->tag(
                                                        'i',
                                                        '',
                                                        array('class' => 'glyphicon glyphicon-ok')
                                                    ),
                                                    array(
                                                        'class' => 'green'
                                                    )
                                                ),
                                                array(
                                                    'action' => 'logical_delete',
                                                    $product['Product']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-success',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'ativar produto'
                                                ),
                                                __('Esta operação irá restaurar este produto entre os produtos em estoque. Deseja continuar?', $product['Product']['name'])
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
                                                        array('class' => 'ace-icon fa fa-trash-o bigger-120')
                                                    ),
                                                    array(
                                                        'class' => 'red'
                                                    )
                                                ),
                                                array(
                                                    'action' => 'delete',
                                                    $product['Product']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-error',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'deletar produto'
                                                ),
                                                __('Tem certeza que deseja deletar permanentemente o produto: %s?', $product['Product']['name'])
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
                    'controller' => 'products',
                    'action' => 'add'
                ),
                array('class' => 'btn btn-lg btn-primary btn-products', 'escape' => false)
            );
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-eye')
                ).' Produtos ativos',
                array(
                    'controller' => 'products',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-inverse btn-products', 'escape' => false)
            );
            ?>
        </div>

        <div class="space"></div>
    </div>
</div>