<?php

/*
 * @var $this view
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('measure_units', array('inline' => false));

?>

<div class="page-header">
    <h1>Unidade de Medida
        <small><i class="ace-icon fa fa-angle-double-right"></i></small>
    </h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Unidades de medida cadastradas.
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
                    <td><?php echo $this->Paginator->sort('id'); ?>&nbsp;</td>
                    <td><?php echo $this->Paginator->sort('name', 'Nome'); ?>&nbsp;</td>
                    <td><?php echo $this->Paginator->sort('int_only', 'Unitária'); ?>&nbsp;</td>
                    <th><?php echo $this->Paginator->sort('created', 'Criado'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?>&nbsp;</th>
                    <th class="actions"><?php echo __('Ações'); ?>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($measureUnits as $measureUnit): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td><?php echo h($measureUnit['MeasureUnit']['id']); ?>&nbsp;</td>
                        <td><?php echo h($measureUnit['MeasureUnit']['name']); ?>&nbsp;</td>
                        <td>
                            <?php
                                if($measureUnit['MeasureUnit']['int_only'])
                                    echo $this->Html->tag(
                                        'span',
                                        $this->Html->tag('i', '',array('class' => 'glyphicon glyphicon-ok')),
                                        array(
                                            'class' => 'label label-sm label-success',
                                            'escape' => false
                                        )
                                    );
                                else
                                    echo $this->Html->tag(
                                        'span',
                                        $this->Html->tag('i', '',array('class' => 'glyphicon glyphicon-remove')),
                                        array(
                                            'class' => 'label label-sm label-inverse',
                                            'escape' => false
                                        )
                                    );
                            ?>&nbsp;
                        </td>
                        <td><?php echo h(date("d-m-Y", strtotime($measureUnit['MeasureUnit']['created']))); ?>&nbsp;</td>
                        <td><?php echo h(date("d-m-Y", strtotime($measureUnit['MeasureUnit']['modified']))); ?>&nbsp;</td>
                        <td class="actions">
                            <div class="hidden-xs action-buttons">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-pencil bigger-130')
                                    ),
                                    array(
                                        'action' => 'edit',
                                        $measureUnit['MeasureUnit']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'orange actions-tooltip tooltip-warning',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'editar unidade',
                                        'data-trigger' => 'hover'
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
                                        $measureUnit['MeasureUnit']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'red actions-tooltip tooltip-error',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'deletar unidade',
                                        'data-trigger' => 'hover'
                                    ),
                                    __('Tem certeza que deseja deletar fornecedor: %s?', $measureUnit['MeasureUnit']['name'])
                                );
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Novo',
                array(
                    'controller' => 'MeasureUnits',
                    'action' => 'add'
                ),
                array('class' => 'btn btn-lg btn-primary', 'escape' => false)
            );
            ?>
        </div>
    </div>
</div>
