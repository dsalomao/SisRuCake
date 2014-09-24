<?php

/*
 * @var $this view
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Caderno de entrada');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Últimas entradas de produtos.
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
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('quantity', 'Qtd. de entrada'); ?></th>
                    <th><?php echo $this->Paginator->sort('measure_unit_id', 'Und. de medida'); ?></th>
                    <th><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>
                    <th><?php echo $this->Paginator->sort('price', 'Preço R$'); ?></th>
                    <th><?php echo $this->Paginator->sort('invoice', 'Nota fiscal'); ?></th>
                    <th><?php echo $this->Paginator->sort('date_of_entry', 'Data de entrada'); ?></th>
                    <th><?php echo $this->Paginator->sort('supplier_id', 'Fornecedor'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($suppliesProducts as $suppliesProduct): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td><?php echo h($suppliesProduct['SuppliesProduct']['id']); ?>&nbsp;</td>
                        <td style="text-align: right"><?php echo h($suppliesProduct['SuppliesProduct']['quantity']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($suppliesProduct['Product']['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $suppliesProduct['Product']['MeasureUnit']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($suppliesProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $suppliesProduct['Product']['id'])); ?>
                        </td>
                        <td>
                            <?php
                            $this->Number->addFormat('BRL', array('before' => 'R$', 'thousands' => '.', 'decimals' => ','));
                            echo $this->Number->currency($suppliesProduct['SuppliesProduct']['price'], 'BRL');
                            ?>&nbsp;
                        </td>
                        <td><?php echo h($suppliesProduct['SuppliesProduct']['invoice']); ?>&nbsp;</td>

                        <td><?php echo h(date("d-m-Y", strtotime($suppliesProduct['SuppliesProduct']['date_of_entry']))); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($suppliesProduct['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $suppliesProduct['Supplier']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
