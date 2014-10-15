<?php

/*
 * @var $this view
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Caderno de saída');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Últimas saídas em estoque.
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('quantity', 'Quantidade debitada'); ?></th>
                    <th><?php echo $this->Paginator->sort('measure_unit', 'Unidade'); ?></th>
                    <th><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>
                    <th><?php echo $this->Paginator->sort('date_of_submiion', 'Data subm.'); ?></th>
                    <th><?php echo $this->Paginator->sort('event_id', 'Evento'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($productsForEvents as $productsForEvent): ?>
                    <tr>
                        <td class="hidden-sm hidden-xs"><?php echo h($productsForEvent['ProductsForEvent']['id']); ?>&nbsp;</td>
                        <td><?php echo h($productsForEvent['ProductsForEvent']['quantity']); ?>&nbsp;</td>
                        <td><?php echo h($productsForEvent['Product']['MeasureUnit']['name']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($productsForEvent['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsForEvent['Product']['id'])); ?>
                        </td>
                        <td><?php echo h(date("d-m-Y", strtotime($productsForEvent['ProductsForEvent']['date_of_submission']))); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($productsForEvent['Event']['title'], array('controller' => 'events', 'action' => 'view', $productsForEvent['Event']['id'])); ?>
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
