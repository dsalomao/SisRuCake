<?php

$this->Html->addCrumb('Planejamento de cardápío');
if($meal['Meal']['status'])
    $this->Html->addCrumb('Refeições', '/meals');
else{
    $this->Html->addCrumb('Refeições', '/meals');
    $this->Html->addCrumb('Refeições desativadas', '/meals/deleted_index');
}
$this->Html->addCrumb($meal['Meal']['code']);
?>
<div class="row">
    <div class="col-sm-5">
        <h3 class="header smaller lighter green"> Atributos </h3>
        <div class="profile-user-info profile-user-info-striped">

            <div class="profile-info-row">
                <div class="profile-info-name"> Código </div>

                <div class="profile-info-value">
                    <span class="editable" id="meal_code"><?php echo h($meal['Meal']['code']); ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Status </div>

                <div class="profile-info-value">
                    <span class="label label-sm <?php echo $class = ($meal['Meal']['status'] == 1) ? 'label-success':'label-danger';?>" id="meal_status"><?php echo $status = ($meal['Meal']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Criado </div>

                <div class="profile-info-value">
                    <span class="editable" id="meal_created"><?php echo h(date("d-m-Y", strtotime($meal['Meal']['created']))); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Modificado </div>

                <div class="profile-info-value">
                    <span class="editable" id="meal_modified"><?php echo h(date("d-m-Y", strtotime($meal['Meal']['modified']))); ?>&nbsp;</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="col-sm-12 widget-container-col ui-sortable" style="min-height: 184px;">
            <!-- #section:custom/widget-box.options.transparent -->

            <!-- /section:custom/widget-box.options.transparent -->
            <div class="widget-box transparent" style="opacity: 1; z-index: 0;">
                <div class="widget-header">
                    <h4 class="widget-title lighter"> Descrição </h4>

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
                            <?php echo h($meal['Meal']['description']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space-24"></div>

<div class="row">
    <h4 class="header smaller lighter blue"> Receitas </h4>

    <div id="accordion" class="accordion-style1 panel-group">
        <?php foreach($related as $related): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#recipeTabId<?php echo $related['Recipe']['id']; ?>">
                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                        <?php echo $related['Recipe']['category']; ?>
                    </a>
                </h4>
            </div>

            <div class="panel-collapse collapse" id="recipeTabId<?php echo $related['Recipe']['id']; ?>">
                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a data-toggle="tab" href="#recipeId<?php echo h($related['Recipe']['id']); ?>atributes">
                                    <i class="green ace-icon fa fa-home bigger-120"></i>
                                    Atributos &nbsp;
                                </a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#recipeId<?php echo h($related['Recipe']['id']); ?>description">
                                    Descrição &nbsp;
                                </a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#recipeId<?php echo h($related['Recipe']['id']); ?>instructions">
                                    Modo de preparo &nbsp;
                                </a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#recipeId<?php echo h($related['Recipe']['id']); ?>products">
                                    Produtos&nbsp;
                                </a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    Ações&nbsp;<i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-info">
                                    <li>
                                        <?php
                                        echo $this->Form->postLink(
                                            $this->Html->tag(
                                                'span',
                                                ' Remover receita',
                                                array('class' => 'fa fa-sign-out fa-fw')
                                            ),
                                            array(
                                                'controller' => 'RecipesForMeals',
                                                'action' => 'delete',
                                                $related['RecipesForMeal']['id']
                                            ),
                                            array(
                                                'escape' => false
                                            )
                                        );
                                        ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="recipeId<?php echo h($related['Recipe']['id']); ?>atributes" class="tab-pane active">
                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Preparação </div>

                                        <div class="profile-info-value">
                                            <span class="" id="RecipeName"><?php echo $related['Recipe']['name']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Código </div>

                                        <div class="profile-info-value">
                                            <span class="" id="recipe_code"><?php echo $related['Recipe']['code']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Criado </div>

                                        <div class="profile-info-value">
                                            <span class="" id="recipe_created"><?php echo $related['Recipe']['created']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Modificado </div>

                                        <div class="profile-info-value">
                                            <span class="" id="recipe_modified"><?php echo $related['Recipe']['modified']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Status </div>

                                        <div class="profile-info-value">
                                            <span class="label label-sm <?php echo $class = ($related['Recipe']['status'] == 1) ? 'label-success':'label-danger';?>" id="related_recipe_status"><?php echo $status = ($related['Recipe']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Categoria </div>

                                        <div class="profile-info-value">
                                            <span class="label label-md <?php if($related['Recipe']['category'] == 'Entrada'){echo $class = 'label-yellow';}elseif($related['Recipe']['category'] == 'Prato base'){}elseif($related['Recipe']['category'] == 'Prato proteico'){echo $class = 'label-danger';}elseif($related['Recipe']['category'] == 'Guarnição'){echo $class = 'label-purple';}elseif($related['Recipe']['category'] == 'Sobremesa'){echo $class = 'labe-pink';}elseif($related['Recipe']['category'] == 'Suco'){echo $class = 'label-orange';} ?>" id="relatedRecipeCategory">
                                                <?php echo $related['Recipe']['category']; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Rendimento </div>

                                        <div class="profile-info-value">
                                            <span class="badge badge-<?php if($related['Recipe']['category'] == 'Entrada'){echo $class = 'yellow';}elseif($related['Recipe']['category'] == 'Prato base'){}elseif($related['Recipe']['category'] == 'Prato proteico'){echo $class = 'danger';}elseif($related['Recipe']['category'] == 'Guarnição'){echo $class = 'purple';}elseif($related['Recipe']['category'] == 'Sobremesa'){echo $class = 'pink';}elseif($related['Recipe']['category'] == 'Suco'){echo $class = 'orange';} ?>" id="relatedRecipeIncome">
                                                <?php echo $related['Recipe']['income']; ?><small> pessoas</small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="recipeId<?php echo h($related['Recipe']['id']); ?>description" class="tab-pane">
                                <p><?php echo h($related['Recipe']['description']); ?>&nbsp;</p>
                            </div>

                            <div id="recipeId<?php echo h($related['Recipe']['id']); ?>instructions" class="tab-pane">
                                <p><?php echo h($related['Recipe']['instructions']); ?>&nbsp;</p>
                            </div>

                            <div id="recipeId<?php echo h($related['Recipe']['id']); ?>products" class="tab-pane">
                                <div class="widget-box transparent collapsed">
                                    <div class="widget-header widget-header-flat">
                                        <h4 class="widget-title lighter">
                                            <i class="ace-icon fa fa-star orange"></i>Rendimento Padrão: <small><?php echo $related['Recipe']['income']; ?> pessoas</small>
                                        </h4>

                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-down"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body"><div class="widget-body-inner" style="display: block;">
                                            <div class="widget-main no-padding">
                                                <table class="table table-bordered table-striped">
                                                    <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>Quantidade
                                                        </th>

                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>Unidade
                                                        </th>

                                                        <th class="hidden-480">
                                                            <i class="ace-icon fa fa-caret-right blue"></i>Producto
                                                        </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php foreach($related['Recipe']['ProductsForRecipe'] as $relatedProduct): ?>
                                                        <tr>
                                                            <td style="text-align: right"><?php echo $relatedProduct['quantity']; ?></td>

                                                            <td><?php echo $relatedProduct['Product']['MeasureUnit']['name']; ?></td>

                                                            <td class="hidden-480"><?php echo $relatedProduct['Product']['name']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.widget-main -->
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div>

                                <div class="widget-box transparent collapsed">
                                    <div class="widget-header widget-header-flat">
                                        <h4 class="widget-title lighter">
                                            <i class="ace-icon fa fa-star orange"></i>Rendimento Aproximado (<?php echo $related['RecipesForMeal']['portion_multiplier'] ?>x):<small> <?php echo $float_income = $related['Recipe']['income']*$related['RecipesForMeal']['portion_multiplier']; ?> pessoas</small>
                                        </h4>

                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-down"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body"><div class="widget-body-inner" style="display: block;">
                                            <div class="widget-main no-padding">
                                                <table class="table table-bordered table-striped">
                                                    <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>Quantidade
                                                        </th>

                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>Unidade
                                                        </th>

                                                        <th class="hidden-480">
                                                            <i class="ace-icon fa fa-caret-right blue"></i>Producto
                                                        </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php foreach($related['Recipe']['ProductsForRecipe'] as $relatedProduct): ?>
                                                        <tr>
                                                            <?php $portion_quantified = $relatedProduct['quantity']*$related['RecipesForMeal']['portion_multiplier']; ?>
                                                            <td style="text-align: right"><?php echo $portion_quantified; ?></td>

                                                            <td><?php echo $relatedProduct['Product']['MeasureUnit']['name']; ?></td>

                                                            <td class="hidden-480"><?php echo $relatedProduct['Product']['name']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.widget-main -->
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="header smaller lighter blue"> Ações </h4>
        <p>
            <?php
            if($meal['Meal']['status']){
                echo $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-plus')
                    ).' Adicionar receita',
                    array(
                        'controller' => 'RecipesForMeals',
                        'action' => 'add',
                        $meal['Meal']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-success'
                    )
                );
            }
            ?>&nbsp;
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'ace-icon fa fa-pencil')
                ).' Editar refeição',
                array(
                    'controller' => 'meals',
                    'action' => 'edit',
                    $meal['Meal']['id']
                ),
                array(
                    'escape' => false,
                    'class' => 'btn btn-lg btn-yellow'
                )
            );
            ?>
            &nbsp;
            <?php
            if($meal['Meal']['status']){
                echo $this->Form->postlink(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-remove')
                    ).' Desativar refeição',
                    array(
                        'controller' => 'meals',
                        'action' => 'logical_delete',
                        $meal['Meal']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-inverse'
                    ),
                    __('Ao ser desativado esta refeição não perderá mais ser utilizada. Deseja continuar com a operação?')
                );
            }
            else{
                echo $this->Form->postlink(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-ok')
                    ).' Reativar refeição',
                    array(
                        'controller' => 'meals',
                        'action' => 'logical_delete',
                        $meal['Meal']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-success'
                    ),
                    __('Ao ser desativado esta refeição não perderá mais ser utilizada. Deseja continuar com a operação?')
                );
            }
            ?>
        </p>
    </div>
</div>

