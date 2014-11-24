<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('products_indexes', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Produtos');
?>
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
                               <div class="hidden-xs hidden-sm hidden-md btn-group">
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
                                           'class' => 'btn btn-xs btn-warning actions-tooltip tooltip-warning',
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
                                       __('Ao ser desativado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $product['Product']['name'])
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
                                   echo $this->Html->link(
                                       $this->Html->tag(
                                           'i',
                                           '',
                                           array(
                                               'class' => 'glyphicon glyphicon-minus'
                                           )
                                       ),
                                       array(
                                           'controller' => 'manual_adjustments',
                                           'action' => 'manual_submit',
                                           $product['Product']['id']
                                       ),
                                       array(
                                           'escape' => false,
                                           'class' => 'btn btn-xs btn-danger actions-tooltip tooltip-error',
                                           'data-toggle' => 'tooltip',
                                           'data-placement' => 'top',
                                           'title' => 'retirar quantidade',
                                           'data-trigger' => 'hover'
                                       )
                                   );
                                   ?>
                               </div>
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
                                               echo $this->Html->link(
                                                   $this->Html->tag(
                                                       'span',
                                                       $this->Html->tag(
                                                           'i',
                                                           '',
                                                           array('class' => 'ace-icon fa fa-pencil bigger-120')
                                                       ),
                                                       array(
                                                           'class' => 'orange'
                                                       )
                                                   ),
                                                   array(
                                                       'action' => 'edit',
                                                       $product['Product']['id']
                                                   ),
                                                   array(
                                                       'escape' => false,
                                                       'class' => 'actions-tooltip tooltip-warning',
                                                       'data-rel' => 'tooltip',
                                                       'data-original-title' => 'editar produto'
                                                   )
                                               );
                                               ?>
                                           </li>

                                           <li>
                                               <?php
                                               echo $this->Html->link(
                                                   $this->Html->tag(
                                                       'span',
                                                       $this->Html->tag(
                                                           'i',
                                                           '',
                                                           array('class' => 'glyphicon glyphicon-remove bigger-120')
                                                       ),
                                                       array(
                                                           'class' => 'inverse'
                                                       )
                                                   ),
                                                   array(
                                                       'action' => 'logical_delete',
                                                       $product['Product']['id']
                                                   ),
                                                   array(
                                                       'escape' => false,
                                                       'class' => ' actions-tooltip tooltip-default',
                                                       'data-rel' => 'tooltip',
                                                       'data-original-title' => 'desativar produto'
                                                   )
                                               );
                                               ?>
                                           </li>
                                           <li>
                                               <?php
                                               echo $this->Html->link(
                                                   $this->Html->tag(
                                                       'span',
                                                       $this->Html->tag(
                                                           'i',
                                                           '',
                                                           array('class' => 'glyphicon glyphicon-plus bigger-120')
                                                       ),
                                                       array(
                                                           'class' => 'green'
                                                       )
                                                   ),
                                                   array(
                                                       'action' => 'add_load_stock',
                                                       $product['Product']['id']
                                                   ),
                                                   array(
                                                       'escape' => false,
                                                       'class' => ' actions-tooltip tooltip-success',
                                                       'data-rel' => 'tooltip',
                                                       'data-original-title' => 'adicionar quantidade'
                                                   )
                                               );
                                               ?>
                                           </li>
                                           <li>
                                               <?php
                                               echo $this->Html->link(
                                                   $this->Html->tag(
                                                       'span',
                                                       $this->Html->tag(
                                                           'i',
                                                           '',
                                                           array('class' => 'glyphicon glyphicon-minus bigger-120')
                                                       ),
                                                       array(
                                                           'class' => 'red'
                                                       )
                                                   ),
                                                   array(
                                                       'controller' => 'manual_adjustments',
                                                       'action' => 'manual_submit',
                                                       $product['Product']['id']
                                                   ),
                                                   array(
                                                       'escape' => false,
                                                       'class' => ' actions-tooltip tooltip-error',
                                                       'data-rel' => 'tooltip',
                                                       'data-original-title' => 'retirar quantidade'
                                                   )
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

<div class="products index">
    <h2><?php echo __('Products'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('code'); ?></th>
            <th><?php echo $this->Paginator->sort('load_min'); ?></th>
            <th><?php echo $this->Paginator->sort('load_max'); ?></th>
            <th><?php echo $this->Paginator->sort('load_stock'); ?></th>
            <th><?php echo $this->Paginator->sort('status'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
            <th><?php echo $this->Paginator->sort('measure_unit_id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['load_min']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['load_max']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['load_stock']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['status']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['modified']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($product['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $product['Restaurant']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($product['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $product['MeasureUnit']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Measure Units'), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Measure Unit'), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products For Recipes'), array('controller' => 'products_for_recipes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Products For Recipe'), array('controller' => 'products_for_recipes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Supplies Products'), array('controller' => 'supplies_products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Supplies Product'), array('controller' => 'supplies_products', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products For Events'), array('controller' => 'products_for_events', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Products For Event'), array('controller' => 'products_for_events', 'action' => 'add')); ?> </li>
    </ul>
</div>