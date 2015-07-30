<?php

$this->Html->script('ace/bootstrap-tooltip.js', array('inline' => false));
$this->Html->script('libs/jquery.easy-pie-chart.min.js', array('inline' => false));
$this->Html->script('products', array('inline' => false));
$this->Html->css('products', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Produtos', '/products');
if(!$product[0]['Product']['status']) {
    $this->Html->addCrumb('Produtos desativados', '/products/deleted_index');
}
$this->Html->addCrumb($product[0]['Product']['name']);
?>
<!--[if lte IE 8]>
<script src="path/to/assets/js/excanvas.min.js"></script>
<![endif]-->

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
            <div class="infobox infobox-red">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-heart-o"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php $infobox = ($product[0]['Product']['load_min']) ? h($product[0]['Product']['load_min']) : $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-ban-circle')); echo $infobox; ?></span>
                    <div class="infobox-content">estoque m&iacute;nimo</div>
                </div>

                <div class="badge">&nbsp;<?php echo $product[0]['MeasureUnit']['name']; ?>&nbsp;</div>
            </div>
            <div class="infobox infobox-green">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-check-square"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo h($product[0]['Product']['load_stock']); ?></span>
                    <div class="infobox-content">Quantidade estocada</div>
                </div>

                <div class="badge">&nbsp;<?php echo $product[0]['MeasureUnit']['name']; ?>&nbsp;</div>
            </div>
            <div class="infobox infobox-blue">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-heart"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php $infobox = ($product[0]['Product']['load_min']) ? h($product[0]['Product']['load_max']) : $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-ban-circle')); echo $infobox; ?></span>
                    <div class="infobox-content">Estoque m&aacute;ximo</div>
                </div>

                <div class="badge">&nbsp;<?php echo $product[0]['MeasureUnit']['name']; ?>&nbsp;</div>
            </div>

            <div class="space-6"></div>

            <?php
            $total = $product[0]['Product']['load_max'] - $product[0]['Product']['load_min'];
            $available = $product[0]['Product']['load_stock'] - $product[0]['Product']['load_min'];
            $percent_avail = ($available * 100) / $total;
            ?>

            <div class="infobox infobox-blue infobox-dark" style="padding-top: 8px;">
                <div class="infobox-progress" style="margin-right: 8px; margin-left: 8px;">
                    <!-- #section:pages/dashboard.infobox.easypiechart -->
                    <div class="easy-pie-chart percentage" data-percent="<?php echo $percent_avail; ?>" data-size="51" data-color="<?php echo $color = ($percent_avail >= 0) ? "" : 'rgba(240,128,128, 0.95)'; ?>" style="height: 51px; width: 51px; line-height: 51px;">
                        <span class="percent" style="font-size: 12px;"><?php echo $percent_avail; ?></span>%
                        <canvas height="51" width="51"></canvas>
                    </div>

                    <!-- /section:pages/dashboard.infobox.easypiechart -->
                </div>

                <div class="infobox-data">
                    <div class="infobox-content">do estoque cheio.</div>
                    <div class="infobox-content"><?php echo $available." ".$product[0]['MeasureUnit']['name'];?></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="space-12"></div>

<div class="row">
    <div class="col-sm-12 widget-container-col ui-sortable" style="min-height: 184px;">
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
                        <?php if($lastEntrys): ?>
                        <!-- <div class="table-responsive"> -->

                        <!-- <div class="dataTables_borderWrap"> -->
                        <table id="last-entrys" class="table table-striped table-bordered table-hover">
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
                            <div class="col-xs-12 col-sm-6">
                                <div class="dataTables_info products-list-info">
                                    <?php
                                    echo $this->Paginator->counter(array(
                                        'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="dataTables_paginate paging_bootstrap products-list-pagging">
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
                        <?php else: ?>
                            <h3 class="lighter smaller red">Este produto ainda não teve nenhuma quantidade adicionada em estoque. Certifique se de que ele está ativo para adicionar novas quantidades.</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
        <div class="btn-group">
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
                    'class' => 'btn btn-lg btn-yellow btn-products'
                )
            );
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
                        'class' => 'btn btn-lg btn-success btn-products'
                    )
                );
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
                        'class' => 'btn btn-lg btn-inverse btn-products'
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
                    ).' Ativar',
                    array(
                        'action' => 'logical_delete',
                        $product[0]['Product']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-success btn-products'
                    ),
                    __('As informações deste produto estão corretas? Ativá-lo permitirá que ele possa ser utilizado em outras partes do SisRuCake.')
                );
                echo $this->Form->postlink(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'ace-icon fa fa-trash-o')
                    ).' Deletar produto',
                    array(
                        'action' => 'delete',
                        $product[0]['Product']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-danger btn-products'
                    ),
                    __('Tem certeza que deseja deletar permanentemente o produto: %s?', $product[0]['Product']['name'])
                );
            }
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
                        'class' => 'btn btn-lg btn-danger btn-products'
                    )
                );
            }
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
                        'class' => 'btn btn-lg btn-products'
                    )
                );
            }
            ?>
        </div>
        <div class="space"></div>
    </div>
</div>