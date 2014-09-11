<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('products_indexes', array('inline' => false));

$this->Html->addCrumb('Produtos');
?>
<div class="row">
    <div class="col-xs-12">

    </div>
</div>
<div class="row">
       <div class="col-xs-12">
           <div class="table-header">
               Lista de produtos ativos
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
                       <th class="hidden-md"><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
                       <th class="hidden-md"><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
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
                           <td class="hidden-md"><?php echo h(date("d-m-Y", strtotime($product['Product']['created']))); ?>&nbsp;</td>
                           <td class="hidden-md"><?php echo h(date("d-m-Y", strtotime($product['Product']['modified']))); ?>&nbsp;</td>
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
                                           $product['Product']['id']
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
                                           array('class' => 'glyphicon glyphicon-remove')
                                       ),
                                       array(
                                           'action' => 'logical_delete',
                                           $product['Product']['id']
                                       ),
                                       array(
                                           'escape' => false,
                                           'class' => 'btn btn-xs btn-inverse actions-tooltip tooltip-default',
                                           'data-toggle' => 'tooltip',
                                           'data-placement' => 'top',
                                           'title' => 'desativar produto',
                                           'data-trigger' => 'hover'
                                       ),
                                       __('Ao ser deletado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $product['Product']['name'])
                                   );
                                   echo $this->Html->link(
                                       $this->Html->tag(
                                           'i',
                                           '',
                                           array('class' => 'glyphicon glyphicon-plus')
                                       ),
                                       array(
                                           'controller' => 'suppliesProducts',
                                           'action' => 'add_load_stock',
                                           $product['Product']['id']
                                       ),
                                       array(
                                           'escape' => false,
                                           'class' => 'btn btn-xs btn-success actions-tooltip tooltip-success',
                                           'data-toggle' => 'tooltip',
                                           'data-placement' => 'top',
                                           'title' => 'adicionar quantidade',
                                           'data-trigger' => 'hover'
                                       )
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
                        ).' Produtos desativados',
                        array(
                            'controller' => 'products',
                            'action' => 'deleted_index'
                        ),
                        array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
                    );
                    ?>
            </p>
        </div>
</div>