<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/08/14
 * Time: 03:16
 */
$this->Html->css('meals', array('inline' => false));

$this->Html->addCrumb('Planejamento de cardápío');
$this->Html->addCrumb('Refeições', '/meals');
$this->Html->addCrumb('Refeições desativadas');
?>
<div class="row">
    <div class="col-xs-12">

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header" style="background-color: darkred">
            Tabela de refeições desativadas
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
                    <th><?php echo $this->Paginator->sort('description', 'Descrição '); ?></th>
                    <th><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($meals as $meal): ?>
                    <tr>
                        <td><?php echo h($meal['Meal']['code']); ?>&nbsp;</td>
                        <td><?php echo h($meal['Meal']['description']); ?>&nbsp;</td>
                        <td><?php echo h($meal['Meal']['created']); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h($meal['Meal']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <div class="hidden-xs hidden-sm action-buttons btn-group">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-search-plus')
                                    ),
                                    array(
                                        'action' => 'view',
                                        $meal['Meal']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-primary actions-tooltip tooltip-info',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'ver refeição',
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
                                        $meal['Meal']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-warning actions-tooltip tooltip-warning',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'editar refeição',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                echo $this->Form->postlink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'glyphicon glyphicon-ok')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $meal['Meal']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-success'
                                    )
                                );
                                ?>
                            </div>
                            <div class="hidden-md hidden-lg">
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
                                                    $meal['Meal']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-info',
                                                    'data-rel' => 'tooltip',
                                                    'data-placement' => 'right',
                                                    'data-original-title' => 'ver refeição'
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
                                                    $meal['Meal']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-warning',
                                                    'data-rel' => 'tooltip',
                                                    'data-placement' => 'right',
                                                    'data-original-title' => 'editar refeição'
                                                )
                                            );
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            echo $this->form->postLink(
                                                $this->Html->tag(
                                                    'span',
                                                    $this->Html->tag(
                                                        'i',
                                                        '',
                                                        array('class' => 'glyphicon glyphicon-ok bigger-120')
                                                    ),
                                                    array(
                                                        'class' => 'green'
                                                    )
                                                ),
                                                array(
                                                    'controller' => 'meals',
                                                    'action' => 'logical_delete',
                                                    $meal['Meal']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => ' actions-tooltip tooltip-success',
                                                    'data-rel' => 'tooltip',
                                                    'data-placement' => 'right',
                                                    'data-original-title' => 'ativar refeição'
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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_info meals-list-info">
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
            ));
            ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_paginate paging_bootstrap meals-list-paging">
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
<div class="row">
    <div class="col-xs-12">
        <h4> A&ccedil;&otilde;es </h4>
        <div class="hr dotted"></div>
        <div class="btn-group">
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Nova',
                array(
                    'controller' => 'meals',
                    'action' => 'add'

                ),
                array('class' => 'btn btn-lg btn-primary btn-meals', 'escape' => false)
            );
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-eye')
                ).' Refeições ativas',
                array(
                    'controller' => 'meals',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-inverse btn-meals', 'escape' => false)
            );
            ?>
        </div>
        <div class="space"></div>
    </div>
</div>

<script>
    jQuery(function($) {
        $('.actions-tooltip').tooltip();
    });
</script>