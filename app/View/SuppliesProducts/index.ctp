<?php

/*
 * @var $this view
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->css('supplies-products', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Caderno de entrada');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Últimas entradas em estoque.
        </div>

        <div class="table-responsive">

        <div class="dataTables_borderWrap">
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('quantity', 'Qtd. de entrada'); ?></th>
                    <th><?php echo $this->Paginator->sort('measure_unit_id', 'Und. de medida'); ?></th>
                    <th><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('price', 'Preço R$'); ?></th>
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('invoice', 'Nota fiscal'); ?></th>
                    <th><?php echo $this->Paginator->sort('date_of_entry', 'Data de entrada'); ?></th>
                    <th><?php echo $this->Paginator->sort('expiration', 'Data de validade'); ?></th>
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('supplier_id', 'Fornecedor'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($suppliesProducts as $suppliesProduct): ?>
                    <tr>
                        <td style="text-align: right">
                            <?php echo h($suppliesProduct['SuppliesProduct']['quantity']); ?>&nbsp;
                        </td>
                        <td>
                            <?php echo $this->Html->link($suppliesProduct['Product']['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $suppliesProduct['Product']['MeasureUnit']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($suppliesProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $suppliesProduct['Product']['id'])); ?>
                        </td>
                        <td class="hidden-xs hidden-sm">
                            <?php
                            $this->Number->addFormat('BRL', array('before' => 'R$', 'thousands' => '.', 'decimals' => ','));
                            echo $this->Number->currency($suppliesProduct['SuppliesProduct']['price'], 'BRL');
                            ?>&nbsp;
                        </td>
                        <td class="hidden-xs hidden-sm"><?php echo h($suppliesProduct['SuppliesProduct']['invoice']); ?>&nbsp;</td>

                        <td><?php echo h(date("d-m-Y", strtotime($suppliesProduct['SuppliesProduct']['date_of_entry']))); ?>&nbsp;</td>
                        <td><?php
                            if($suppliesProduct['SuppliesProduct']['expiration']) {
                                echo h(date("d-m-Y", strtotime($suppliesProduct['SuppliesProduct']['expiration'])));
                            } else{
                                echo $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-ban-circle'));
                            }
                            ?>&nbsp;
                        </td>
                        <td class="hidden-xs hidden-sm">
                            <?php echo $this->Html->link($suppliesProduct['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $suppliesProduct['Supplier']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_info entry-list-info" id="sample-table-2_info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_paginate paging_bootstrap entry-list-paging">
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
