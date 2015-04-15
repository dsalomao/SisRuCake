<?php

/*
 * @var $this view
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->css('product-output', array('inline' => false));


$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Caderno de saída');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Últimas baixas em estoque.
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('quantity', 'Quantidade'); ?></th>
                    <th><?php echo $this->Paginator->sort('measure_unit', 'Unidade'); ?></th>
                    <th><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>
                    <th><?php echo $this->Paginator->sort('date_of_submission', 'Data de saída'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($ProductOutputs as $productOutput): ?>
                    <tr>
                        <td style="text-align: right;"><?php echo h($productOutput['ProductOutput']['quantity']); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($productOutput['Product']['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'index')); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($productOutput['Product']['name'], array('controller' => 'products', 'action' => 'view', $productOutput['Product']['id'])); ?>
                        </td>
                        <td><?php echo h(date("d-m-Y", strtotime($productOutput['ProductOutput']['date_of_submission']))); ?>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_info output-history-list-info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_paginate paging_bootstrap output-history-list-paging">
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
