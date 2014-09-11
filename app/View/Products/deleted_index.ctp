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
                    <th class="center">
                        <label class="position-relative">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                    <th><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
                    <th><?php echo $this->Paginator->sort('load_stock', 'Qtd. em estoque'); ?></th>
                    <th><?php echo $this->Paginator->sort('measure_unit_id', 'Und. de medida'); ?></th>
                    <th><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                    <th><?php echo $this->Paginator->sort('restaurant_id', 'Und. UNESP'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
                        <td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
                        <td style="text-align: right;"><?php echo h($product['Product']['load_stock']); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($product['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $product['MeasureUnit']['id'])); ?>&nbsp;</td>
                        <td><?php echo h(date("d-m-Y", strtotime($product['Product']['created']))); ?>&nbsp;</td>
                        <td><?php echo h(date("d-m-Y", strtotime($product['Product']['modified']))); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($product['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $product['Restaurant']['id'])); ?></td>
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
                                        $product['Product']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'blue'
                                    )
                                );
                                echo $this->Form->postLink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-trash-o bigger-130')
                                    ),
                                    array(
                                        'action' => 'delete',
                                        $product['Product']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'red'
                                    ),
                                    __('Tem certeza que deseja deletar permanentemente o produto: %s?', $product['Product']['name'])
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
                                        $product['Product']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-success'
                                    ),
                                    __('Esta operção irá restaurar este produto entre os produtos em estoque. Deseja continuar?', $product['Product']['name'])
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
                    'controller' => 'products',
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
                ).' Produtos ativos',
                array(
                    'controller' => 'products',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            );
            ?>
        </p>
    </div>
</div>