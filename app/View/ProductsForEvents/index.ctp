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
                    <th class="center">
                        <label class="position-relative">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
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
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td><?php echo h($productsForEvent['ProductsForEvent']['id']); ?>&nbsp;</td>
                        <td><?php echo h($productsForEvent['ProductsForEvent']['quantity']); ?>&nbsp;</td>
                        <td><?php echo h($productsForEvent['Product']['MeasureUnit']['name']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($productsForEvent['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsForEvent['Product']['id'])); ?>
                        </td>
                        <td><?php echo h($productsForEvent['ProductsForEvent']['date_of_submission']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($productsForEvent['Event']['title'], array('controller' => 'events', 'action' => 'view', $productsForEvent['Event']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
