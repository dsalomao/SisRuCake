<?php

$this->Html->script('ace/bootstrap-tooltip.js', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
if($product[0]['Product']['status'])
    $this->Html->addCrumb('Produtos', '/products');
else{
    $this->Html->addCrumb('Produtos', '/products');
    $this->Html->addCrumb('Produtos desativados', '/products/deleted_index');
}
$this->Html->addCrumb($product[0]['Product']['name']);
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
            <div class="infobox infobox-blue">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-check-square"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo h($product[0]['Product']['load_stock']); ?></span>
                    <div class="infobox-content">Quantidade estocada</div>
                </div>

                <div class="badge"><?php echo $product[0]['MeasureUnit']['name']; ?>&nbsp;</div>
            </div>
            <div class="infobox infobox-green">
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
                        <div>
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
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
                                <?php foreach ($related as $related): ?>
                                    <tr>
                                        <td style="text-align: right"><?php echo h($related['SuppliesProduct']['quantity']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($product[0]['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $product[0]['MeasureUnit']['id'])); ?>
                                        </td>
                                        <td class="hidden-480">
                                            <?php echo $this->Html->link($related['Product']['name'], array('controller' => 'products', 'action' => 'view', $related['Product']['id'])); ?>
                                        </td>
                                        <td class="hidden-480"><?php
                                            $this->Number->addFormat('BRL', array('before' => 'R$', 'thousands' => '.', 'decimals' => ','));
                                            echo $this->Number->currency($related['SuppliesProduct']['price'], 'BRL');
                                            ?>&nbsp;
                                        </td>
                                        <td><?php echo h(date("d-m-Y", strtotime($related['SuppliesProduct']['date_of_entry']))); ?>&nbsp;</td>
                                        <td><?php echo h(date("d-m-Y", strtotime($related['SuppliesProduct']['expiration']))); ?>&nbsp;</td>
                                        <td class="hidden-480">
                                            <?php echo $this->Html->link($related['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $related['Supplier']['id'])); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
        <div class="row">
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
    </div>
</div>