<?php
$this->Html->css('meals', array('inline' => false));

$this->Html->addCrumb('Planejamento de cardápío');
$this->Html->addCrumb('Refeições');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Tabela de refeições ativas
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
                    <th><?php echo $this->Paginator->sort('code'); ?></th>
                    <th class="hidden-md"><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($meals as $meal): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td><?php echo h($meal['Meal']['code']); ?>&nbsp;</td>
                        <td class="hidden-md"><?php echo h($meal['Meal']['description']); ?>&nbsp;</td>
                        <td><?php echo h($meal['Meal']['created']); ?>&nbsp;</td>
                        <td><?php echo h($meal['Meal']['modified']); ?>&nbsp;</td>
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
                                        array('class' => 'glyphicon glyphicon-remove')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $meal['Meal']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-inverse'
                                    ),
                                    __('Ao ser desativado esta refeição perderá qualquer informação sobre quantidade em receitas vinculadas. Deseja continuar com a operação?')
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
                                                        array('class' => 'glyphicon glyphicon-remove bigger-120')
                                                    ),
                                                    array(
                                                        'class' => 'inverse'
                                                    )
                                                ),
                                                array(
                                                    'controller' => 'meals',
                                                    'action' => 'logical_delete',
                                                    $meal['Meal']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => ' actions-tooltip tooltip-default',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'desativar refeição'
                                                ),
                                                __('Ao ser desativado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $meal['Meal']['code'])
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
            ?>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-eye')
                ).' Refeições desativadas',
                array(
                    'controller' => 'meals',
                    'action' => 'deleted_index'
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