<?php
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
        <?php foreach($relatedRecipes as $relatedRecipe): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#recipeTabId<?php echo $relatedRecipe['Recipe']['id']; ?>">
                        <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                        <?php echo $relatedRecipe['Recipe']['category']; ?>
                    </a>
                </h4>
            </div>

            <div class="panel-collapse collapse" id="recipeTabId<?php echo $relatedRecipe['Recipe']['id']; ?>">
                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a data-toggle="tab" href="#recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>atributes">
                                    <i class="green ace-icon fa fa-home bigger-120"></i>
                                    Atributos &nbsp;
                                </a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>description">
                                    Descrição &nbsp;
                                </a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>instructions">
                                    Modo de preparo &nbsp;
                                </a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>products">
                                    Produtos&nbsp;
                                </a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="tab" href="#recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>products">
                                    Ações&nbsp;
                                </a>
                                <ul class="dropdown-menu dropdown-info">
                                    <li>
                                        <?php echo $this->Html->link('Remover receita', array('controller' => 'RecipesForMeal', 'action' => 'delete', ))?>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>atributes" class="tab-pane active">
                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Preparação </div>

                                        <div class="profile-info-value">
                                            <span class="" id="RecipeName"><?php echo $relatedRecipe['Recipe']['name']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Código </div>

                                        <div class="profile-info-value">
                                            <span class="" id="recipe_code"><?php echo $relatedRecipe['Recipe']['code']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Criado </div>

                                        <div class="profile-info-value">
                                            <span class="" id="recipe_created"><?php echo $relatedRecipe['Recipe']['created']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Modificado </div>

                                        <div class="profile-info-value">
                                            <span class="" id="recipe_modified"><?php echo $relatedRecipe['Recipe']['modified']; ?>&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Status </div>

                                        <div class="profile-info-value">
                                            <span class="label label-sm <?php echo $class = ($relatedRecipe['Recipe']['status'] == 1) ? 'label-success':'label-danger';?>" id="related_recipe_status"><?php echo $status = ($relatedRecipe['Recipe']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Categoria </div>

                                        <div class="profile-info-value">
                                            <span class="label label-md <?php if($relatedRecipe['Recipe']['category'] == 'Entrada'){echo $class = 'label-yellow';}elseif($relatedRecipe['Recipe']['category'] == 'Prato base'){}elseif($relatedRecipe['Recipe']['category'] == 'Prato proteico'){echo $class = 'label-danger';}elseif($relatedRecipe['Recipe']['category'] == 'Guarnição'){echo $class = 'label-purple';}elseif($relatedRecipe['Recipe']['category'] == 'Sobremesa'){echo $class = 'labe-pink';}elseif($relatedRecipe['Recipe']['category'] == 'Suco'){echo $class = 'label-orange';} ?>" id="relatedRecipeCategory">
                                                <?php echo $relatedRecipe['Recipe']['category']; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Rendimento </div>

                                        <div class="profile-info-value">
                                            <span class="badge badge-<?php if($relatedRecipe['Recipe']['category'] == 'Entrada'){echo $class = 'yellow';}elseif($relatedRecipe['Recipe']['category'] == 'Prato base'){}elseif($relatedRecipe['Recipe']['category'] == 'Prato proteico'){echo $class = 'danger';}elseif($relatedRecipe['Recipe']['category'] == 'Guarnição'){echo $class = 'purple';}elseif($relatedRecipe['Recipe']['category'] == 'Sobremesa'){echo $class = 'pink';}elseif($relatedRecipe['Recipe']['category'] == 'Suco'){echo $class = 'orange';} ?>" id="relatedRecipeIncome">
                                                <?php echo $relatedRecipe['Recipe']['income']; ?><small> pessoas</small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>description" class="tab-pane">
                                <p><?php echo h($relatedRecipe['Recipe']['description']); ?>&nbsp;</p>
                            </div>

                            <div id="recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>instructions" class="tab-pane">
                                <p><?php echo h($relatedRecipe['Recipe']['instructions']); ?>&nbsp;</p>
                            </div>

                            <div id="recipeId<?php echo h($relatedRecipe['Recipe']['id']); ?>products" class="tab-pane">
                                <?php foreach($relatedRecipe['Recipe']['ProductsForRecipe'] as $relatedProduct): ?>
                                <?php endforeach; ?>
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

