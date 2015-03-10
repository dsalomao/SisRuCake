<?php
$this->Html->script('ace/bootstrap-tooltip.js', array('inline' => false));
$this->Html->css('recipes', array('inline' => false));

$this->Html->addCrumb('Receituário padrão');
if($recipe['Recipe']['status'])
    $this->Html->addCrumb('Receitas', '/recipes');
else{
    $this->Html->addCrumb('Receitas', '/recipes');
    $this->Html->addCrumb('Receitas desativadas', '/recipes/deleted_index');
}
$this->Html->addCrumb($recipe['Recipe']['name']);
?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="tabbable">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a data-toggle="tab" href="#atributes">
                        <i class="green ace-icon fa fa-home bigger-120"></i>
                        Atributos &nbsp;
                    </a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#description">
                        Descrição &nbsp;
                    </a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#instructions">
                        Modo de preparo &nbsp;
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="atributes" class="tab-pane active">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Preparação </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_name"><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> C&oacute;digo </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_code"><?php echo h($recipe['Recipe']['code']); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Criado </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_created"><?php echo h(date("d-m-Y", strtotime($recipe['Recipe']['created']))); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Modificado </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_modified"><?php echo h(date("d-m-Y", strtotime($recipe['Recipe']['modified']))); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Status </div>

                            <div class="profile-info-value">
                                <span class="label label-sm <?php echo $class = ($recipe['Recipe']['status'] == 1) ? 'label-success':'label-danger';?>" id="recipe_status"><?php echo $status = ($recipe['Recipe']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Categoria </div>

                            <div class="profile-info-value">
                                <span class="label label-md <?php if($recipe['Recipe']['category'] == 'Entrada'){echo $class = 'label-yellow';}elseif($recipe['Recipe']['category'] == 'Prato base'){}elseif($recipe['Recipe']['category'] == 'Prato proteico'){echo $class = 'label-danger';}elseif($recipe['Recipe']['category'] == 'Guarnição'){echo $class = 'label-purple';}elseif($recipe['Recipe']['category'] == 'Sobremesa'){echo $class = 'labe-pink';}elseif($recipe['Recipe']['category'] == 'Suco'){echo $class = 'label-orange';} ?>" id="recipeStatus">
                                    <?php echo $recipe['Recipe']['category']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Rendimento </div>

                            <div class="profile-info-value">
                                <span class="badge badge-<?php if($recipe['Recipe']['category'] == 'Entrada'){echo $class = 'yellow';}elseif($recipe['Recipe']['category'] == 'Prato base'){}elseif($recipe['Recipe']['category'] == 'Prato proteico'){echo $class = 'danger';}elseif($recipe['Recipe']['category'] == 'Guarnição'){echo $class = 'purple';}elseif($recipe['Recipe']['category'] == 'Sobremesa'){echo $class = 'pink';}elseif($recipe['Recipe']['category'] == 'Suco'){echo $class = 'orange';} ?>" id="recipeIncome">
                                    <?php echo $recipe['Recipe']['income']; ?><small> pessoas</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="description" class="tab-pane">
                    <p><?php echo h($recipe['Recipe']['description']); ?>&nbsp;</p>
                </div>

                <div id="instructions" class="tab-pane">
                    <p><?php echo h($recipe['Recipe']['instructions']); ?>&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="space"></div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="widget-container-col ui-sortable" style="min-height: 184px;">
            <!-- #section:custom/widget-box.options.transparent -->

            <!-- /section:custom/widget-box.options.transparent -->
            <div class="widget-box transparent" style="opacity: 1; z-index: 0;">
                <div class="widget-header">
                    <h4 class="widget-title lighter"> Ingredientes </h4>

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
                                <?php if (!empty($related)): ?>
                                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('quantity', 'Quantidade'); ?></th>
                                            <th><?php echo $this->Paginator->sort('measure_unit_id', 'Unidade'); ?></th>
                                            <th><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>
                                            <th class="hidden-xs hidden-sm"><?php echo $this->Paginator->sort('recipe_id', 'Receita'); ?></th>
                                            <th class="actions"><?php echo __('Ações'); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($related as $related): ?>
                                        <tr>
                                            <td style="text-align: right"><?php echo $related['ProductsForRecipe']['quantity']; ?></td>
                                            <td><?php echo $related['Product']['MeasureUnit']['name']; ?></td>
                                            <td><?php echo $related['Product']['name']; ?></td>
                                            <td class="hidden-xs hidden-sm"><?php echo $related['Recipe']['name']; ?></td>
                                            <td class="actions">
                                                <div class="hidden-xs hidden-sm hidden-md btn-group">
                                                    <?php
                                                    echo $this->Html->link(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'ace-icon fa fa-pencil bigger-130')
                                                        ),
                                                        array(
                                                            'controller' => 'ProductsForRecipes',
                                                            'action' => 'edit',
                                                            $related['ProductsForRecipe']['id']
                                                        ),
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'btn btn-xs btn-warning actions-tooltip tooltip-warning',
                                                            'data-toggle' => 'tooltip',
                                                            'data-placement' => 'top',
                                                            'title' => 'editar ingrediente',
                                                            'data-trigger' => 'hover'
                                                        )
                                                    );
                                                    echo $this->Form->postlink(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'glyphicon glyphicon-trash')
                                                        ),
                                                        array(
                                                            'controller' => 'ProductsForRecipes',
                                                            'action' => 'delete',
                                                            $related['ProductsForRecipe']['id']
                                                        ),
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'btn btn-xs btn-danger actions-tooltip tooltip-error',
                                                            'data-toggle' => 'tooltip',
                                                            'data-placement' => 'top',
                                                            'title' => 'deletar ingrediente',
                                                            'data-trigger' => 'hover'
                                                        ),
                                                        __('Ao ser deletado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?')
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
                                                                            array('class' => 'ace-icon fa fa-pencil bigger-120')
                                                                        ),
                                                                        array(
                                                                            'class' => 'orange'
                                                                        )
                                                                    ),
                                                                    array(
                                                                        'controller' => 'ProductsForRecipes',
                                                                        'action' => 'edit',
                                                                        $related['ProductsForRecipe']['id']
                                                                    ),
                                                                    array(
                                                                        'escape' => false,
                                                                        'class' => 'actions-tooltip tooltip-warning',
                                                                        'data-toggle' => 'tooltip',
                                                                        'data-placement' => 'right',
                                                                        'title' => 'editar ingrediente',
                                                                        'data-trigger' => 'hover'
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
                                                                            array('class' => 'glyphicon glyphicon-trash bigger-120')
                                                                        ),
                                                                        array(
                                                                            'class' => 'red'
                                                                        )
                                                                    ),
                                                                    array(
                                                                        'controller' => 'ProductsForRecipes',
                                                                        'action' => 'delete',
                                                                        $related['ProductsForRecipe']['id']
                                                                    ),
                                                                    array(
                                                                        'escape' => false,
                                                                        'class' => 'actions-tooltip tooltip-error',
                                                                        'data-toggle' => 'tooltip',
                                                                        'data-placement' => 'right',
                                                                        'title' => 'deletar ingrediente',
                                                                        'data-trigger' => 'hover'
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <h4 class="header smaller lighter blue"> Ações </h4>
        <div class="btn-group">
            <?php
            if($recipe['Recipe']['status']){
                echo $this->Form->postLink(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-remove')
                    ).' Desativar receita',
                    array(
                        'controller' => 'Recipes',
                        'action' => 'logical_delete',
                        $recipe['Recipe']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-inverse btn-recipes'
                    )
                );
            } else {
                echo $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-plus')
                    ).' Adicionar ingrediente',
                    array(
                        'controller' => 'ProductsForRecipes',
                        'action' => 'add_ingredient',
                        $recipe['Recipe']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-success btn-recipes'
                    )
                );
            }
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'ace-icon fa fa-pencil')
                ).' Editar receita',
                array(
                    'controller' => 'Recipes',
                    'action' => 'edit',
                    $recipe['Recipe']['id']
                ),
                array(
                    'escape' => false,
                    'class' => 'btn btn-lg btn-yellow btn-recipes'
                )
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
