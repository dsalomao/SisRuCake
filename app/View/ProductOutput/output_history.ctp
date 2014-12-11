<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 10/12/14
 * Time: 20:52
 */

$this->Html->addCrumb('Logística & Suprimentos');
if($ProductOutputs[0]['Product']['status'])
    $this->Html->addCrumb('Produtos', '/products');
else{
    $this->Html->addCrumb('Produtos', '/products');
    $this->Html->addCrumb('Produtos desativados', '/products/deleted_index');
}
$this->Html->addCrumb($ProductOutputs[0]['Product']['name'], '/products/view/'.+$ProductOutputs[0]['Product']['id']);
$this->Html->addCrumb('Histórico de baixa em estoque');
?>
<div class="table-header">
    Histórico de baixa em estoque
</div>
<div id="product_output">
    <table id="lastInput" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('quantity', 'Qtd. de entrada'); ?></th>
            <th><?php echo $this->Paginator->sort('measure_unit_id', 'Und. de medida'); ?></th>
            <th class="hidden-480"><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>
            <th><?php echo $this->Paginator->sort('date_of_submission', 'Data de entrada'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($ProductOutputs as $productOutput): ?>
            <tr>
                <td style="text-align: right"><?php echo h($productOutput['ProductOutput']['quantity']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($productOutput['Product']['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $productOutput['Product']['MeasureUnit']['id'])); ?>
                </td>
                <td class="hidden-480">
                    <?php echo $this->Html->link($productOutput['Product']['code'], array('controller' => 'products', 'action' => 'view', $productOutput['Product']['id'])); ?>
                </td>
                <td><?php echo h(date("d-m-Y", strtotime($productOutput['ProductOutput']['date_of_submission']))); ?>&nbsp;</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-xs-6">
            <div class="dataTables_info" id="lastInput_info">
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