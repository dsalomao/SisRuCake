<?php

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));

$this->Html->addCrumb('Receituário padrão');
$this->Html->addCrumb('Receitas');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Livro de receitas
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
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('name', 'Preparação'); ?></th>
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('description', 'Descrição'); ?></th>
                    <th><?php echo $this->Paginator->sort('category', 'Categoria'); ?></th>
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
                    <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td class="hidden-xs hidden-sm"><?php echo h($recipe['Recipe']['id']); ?>&nbsp;</td>
                        <td><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</td>
                        <td class="hidden-xs hidden-sm"><?php echo h($recipe['Recipe']['code']); ?>&nbsp;</td>
                        <td class="hidden-xs hidden-sm"><?php echo h($recipe['Recipe']['description']); ?>&nbsp;</td>
                        <td>
                            <span class="label label-md <?php if($recipe['Recipe']['category'] == 'Entrada'){echo $class = 'label-yellow';}elseif($recipe['Recipe']['category'] == 'Prato base'){echo $class = 'label-light';}elseif($recipe['Recipe']['category'] == 'Prato proteico'){echo $class = 'label-danger';}elseif($recipe['Recipe']['category'] == 'Guarnição'){echo $class = 'label-purple';}elseif($recipe['Recipe']['category'] == 'Sobremesa'){echo $class = 'label-pink';}elseif($recipe['Recipe']['category'] == 'Suco'){echo $class = 'label-info';} ?>" id="recipe_status">
                                    <?php echo $recipe['Recipe']['category']; ?>
                                </span>
                        </td>
                        <td class="hidden-xs hidden-sm"><?php echo h($recipe['Recipe']['created']); ?>&nbsp;</td>
                        <td class="hidden-xs hidden-sm"><?php echo h($recipe['Recipe']['modified']); ?>&nbsp;</td>
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
                                        $recipe['Recipe']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-primary'
                                    )
                                );
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-pencil')
                                    ),
                                    array(
                                        'action' => 'edit',
                                        $recipe['Recipe']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-warning'
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
                                        $recipe['Recipe']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-inverse'
                                    ),
                                    __('Ao ser deletado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $recipe['Recipe']['id'])
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
                                        array(
                                            'action' => 'edit',
                                            $recipe['Recipe']['id']
                                        ),
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
                                                    $recipe['Recipe']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'tooltip-error',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'View'
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
                                                    $recipe['Recipe']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'tooltip-error',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'Edit'
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
                                                    $recipe['Recipe']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'tooltip-error',
                                                    'data-rel' => 'tooltip',
                                                    'data-original-title' => 'Delete'
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
                ).' Nova',
                array(
                    'controller' => 'recipes',
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
                ).' Receitas desativadas',
                array(
                    'controller' => 'recipes',
                    'action' => 'deleted_index'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            );
            ?>
        </p>
    </div>
</div>
