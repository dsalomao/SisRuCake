<?php

$this->Html->script('ace/bootstrap-tooltip.js', array('inline' => false));

c
?>

<div class="row">
    <div class="col-sm-5">
        <h3 class="header smaller lighter green"> Atributos </h3>
        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> Nome </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_name"><?php echo h($product[0]['Product']['name']); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Código </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_code"><?php echo h($product[0]['Product']['code']); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Unidade de medida </div>

                <div class="profile-info-value">
                        <span class="editable" id="product_unit_measure">
                                <?php
                                echo $this->Html->link(
                                    $product[0]['MeasureUnit']['name'],
                                    array(
                                        'controller' => 'measure_units',
                                        'action' => 'view',
                                        $product[0]['MeasureUnit']['id']
                                    )
                                );
                                ?>
                            &nbsp;
                        </span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Status </div>

                <div class="profile-info-value">
                    <span class="label label-sm <?php echo $class = ($product[0]['Product']['status'] == 1) ? 'label-success':'label-danger';?>" id="product_code"><?php echo $status = ($product[0]['Product']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Criado </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_created"><?php echo h(date("d-m-Y", strtotime($product[0]['Product']['created']))); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Modificado </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_modified"><?php echo h(date("d-m-Y", strtotime($product[0]['Product']['modified']))); ?>&nbsp;</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Unidade UNESP </div>

                <div class="profile-info-value">
                    <?php
                        echo $this->Html->link(
                            $product[0]['Restaurant']['name'],
                            array(
                                'controller' => 'restaurants',
                                'action' => 'view',
                                $product[0]['Restaurant']['id']
                            )
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <h3 class="header smaller lighter purple"> Quantidades em estoque </h3>
        <div class="col-sm-12 infobox-container">
            <!-- #section:pages/dashboard.infobox -->
            <div class="infobox infobox-red">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-heart-o"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo h($product[0]['Product']['load_min']); ?></span>
                    <div class="infobox-content">estoque m&iacute;nimo</div>
                </div>
                <div class="badge"><?php echo $product[0]['MeasureUnit']['name']; ?>&nbsp;</div>
            </div>
            <div class="infobox infobox-green">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-check-square"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo h($product[0]['Product']['load_stock']); ?></span>
                    <div class="infobox-content">Quantidade estocada</div>
                </div>

                <div class="badge"><?php echo $product[0]['MeasureUnit']['name']; ?>&nbsp;</div>
            </div>
            <div class="infobox infobox-blue">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-heart"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo h($product[0]['Product']['load_max']); ?></span>
                    <div class="infobox-content">Estoque m&aacute;ximo</div>
                </div>

                <!-- #section:pages/dashboard.infobox.stat -->
                <div class="badge"><?php echo $product[0]['MeasureUnit']['name']; ?>&nbsp;</div>

                <!-- /section:pages/dashboard.infobox.stat -->
            </div>

            <!-- /section:pages/dashboard.infobox -->
            <div class="space-6"></div>

        </div>
    </div>
</div>

<div class="space-24"></div>

<div class="row">
    <div class="col-sm-12 widget-container-col ui-sortable" style="min-height: 184px;">
        <!-- #section:custom/widget-box.options.transparent -->

        <!-- /section:custom/widget-box.options.transparent -->
        <div class="widget-box transparent" style="opacity: 1; z-index: 0;">
            <div class="widget-header">
                <h4 class="widget-title lighter"> Últimas entradas em estoque & Fornecedores </h4>

                <div class="widget-toolbar no-border">
                    <a href="#" data-action="settings">
                        <i class="ace-icon fa fa-cog"></i>
                    </a>

                    <a href="#" data-action="reload">
                        <i class="ace-icon fa fa-refresh"></i>
                    </a>

                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <a href="#" data-action="close">
                        <i class="ace-icon fa fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-body-inner" style="display: block;">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">
                        <!-- <div class="table-responsive"> -->

                        <!-- <div class="dataTables_borderWrap"> -->
                        <div id="productsIncome">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('quantity', 'Qtd. de entrada'); ?></th>
                                    <th><?php echo $this->Paginator->sort('measure_unit_id', 'Und. de medida'); ?></th>
                                    <th class="hidden-480"><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>
                                    <th class="hidden-480"><?php echo $this->Paginator->sort('price', 'Preço'); ?></th>
                                    <th><?php echo $this->Paginator->sort('date_of_entry', 'Data de entrada'); ?></th>
                                    <th><?php echo $this->Paginator->sort('date_of_entry', 'Data de validade'); ?></th>
                                    <th class="hidden-480"><?php echo $this->Paginator->sort('supplier_id', 'Fornecedor'); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($lastEntrys as $lastEntry): ?>
                                    <tr>
                                        <td style="text-align: right"><?php echo h($lastEntry['SuppliesProduct']['quantity']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($product[0]['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $product[0]['MeasureUnit']['id'])); ?>
                                        </td>
                                        <td class="hidden-480">
                                            <?php echo $this->Html->link($product[0]['Product']['name'], array('controller' => 'products', 'action' => 'view', $product[0]['Product']['id'])); ?>
                                        </td>
                                        <td class="hidden-480"><?php
                                            $this->Number->addFormat('BRL', array('before' => 'R$', 'thousands' => '.', 'decimals' => ','));
                                            echo $this->Number->currency($lastEntry['SuppliesProduct']['price'], 'BRL');
                                            ?>&nbsp;
                                        </td>
                                        <td><?php echo h(date("d-m-Y", strtotime($lastEntry['SuppliesProduct']['date_of_entry']))); ?>&nbsp;</td>
                                        <td><?php echo h(date("d-m-Y", strtotime($lastEntry['SuppliesProduct']['expiration']))); ?>&nbsp;</td>
                                        <td class="hidden-480">
                                            <?php echo $this->Html->link($lastEntry['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $lastEntry['Supplier']['id'])); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="dataTables_info" id="sample-table-1_info">
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
                                                    'model' => 'SuppliesProduct',
                                                    'tag' => 'li',
                                                    'escape' => false,
                                                ),
                                                $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-angle-double-left')), '', array('escape' => false)),
                                                array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false,)
                                            );
                                            echo $this->Paginator->numbers(array(
                                                'model' => 'SuppliesProduct',
                                                'separator' => '',
                                                'tag' => 'li',
                                                'currentClass' => 'active',
                                                'currentTag' => 'a'
                                            ));
                                            echo $this->Paginator->next(
                                                $this->Html->tag('i', '', array('class' => 'fa fa-angle-double-right')),
                                                array(
                                                    'model' => 'SuppliesProduct',
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
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
        <div class="row">
            <div class="col-sm-6">
                <p>
                    <?php
                    if($product[0]['Product']['status']){
                        echo $this->Html->link(
                            $this->Html->tag(
                                'i',
                                '',
                                array('class' => 'glyphicon glyphicon-plus')
                            ).' Adicionar quantidade',
                            array(
                                'controller' => 'suppliesProducts',
                                'action' => 'add_load_stock',
                                $product[0]['Product']['id']
                            ),
                            array(
                                'escape' => false,
                                'class' => 'btn btn-lg btn-success'
                            )
                        );
                    }
                    ?>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag(
                            'i',
                            '',
                            array('class' => 'ace-icon fa fa-pencil')
                        ).' Editar',
                        array(
                            'controller' => 'products',
                            'action' => 'edit',
                            $product[0]['Product']['id']
                        ),
                        array(
                            'escape' => false,
                            'class' => 'btn btn-lg btn-yellow'
                        )
                    );
                    ?>

                    <?php
                    if($product[0]['Product']['status']){
                        echo $this->Form->postlink(
                            $this->Html->tag(
                                'i',
                                '',
                                array('class' => 'glyphicon glyphicon-remove')
                            ).' Desativar',
                            array(
                                'action' => 'logical_delete',
                                $product[0]['Product']['id']
                            ),
                            array(
                                'escape' => false,
                                'class' => 'btn btn-lg btn-inverse'
                            ),
                            __('Ao ser desativado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?')
                        );
                    }
                    else{
                        echo $this->Form->postlink(
                            $this->Html->tag(
                                'i',
                                '',
                                array('class' => 'glyphicon glyphicon-ok')
                            ).' Reativar',
                            array(
                                'action' => 'logical_delete',
                                $product[0]['Product']['id']
                            ),
                            array(
                                'escape' => false,
                                'class' => 'btn btn-lg btn-success'
                            ),
                            __('Ao ser desativado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?')
                        );
                    }
                    ?>
                </p>
            </div>
            <div class="col-sm-6">
                <p>
                    <?php
                    if($product[0]['Product']['load_stock'] > $product[0]['Product']['load_min']){
                        echo $this->Html->link(
                            $this->Html->tag(
                                'i',
                                '',
                                array('class' => 'ace-icon fa fa-cloud-download')
                            ).' Remover em estoque',
                            array(
                                'controller' => 'product_output',
                                'action' => 'manual_submit',
                                $product[0]['Product']['id']
                            ),
                            array(
                                'escape' => false,
                                'class' => 'btn btn-lg btn-danger'
                            )
                        );
                    }
                    ?>
                </p>
                <p>
                    <?php
                    if(!empty($product[0]['ProductOutput'])){
                        echo $this->Html->link(
                            $this->Html->tag(
                                'i',
                                '',
                                array('class' => 'ace-icon fa fa-cloud-upload')
                            ).' Histórico de saída',
                            array(
                                'controller' => 'product_output',
                                'action' => 'output_history',
                                $product[0]['Product']['id']
                            ),
                            array(
                                'escape' => false,
                                'class' => 'btn btn-lg'
                            )
                        );
                    }
                    ?>
                </p>
            </div>
            <p></p>
        </div>
    </div>
</div>