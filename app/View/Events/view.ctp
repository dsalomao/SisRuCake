<?php
/*
 * View/Events/view.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
$this->Html->addCrumb('Planejamento de cardápio');
$this->Html->addCrumb('Eventos', '/events');
$this->Html->addCrumb($event['Event']['title']);
?>

<div class="row">
    <div class="col-sm-5">
        <h3 class="header smaller lighter green"> Evento:  <?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?></h3>
        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> Título </div>

                <div class="profile-info-value">
                    <span class="editable" id="event_title"><?php echo $event['Event']['title']; ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Detalhes </div>

                <div class="profile-info-value">
                    <span class="editable" id="event_details"><?php echo $event['Event']['details']; ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Status </div>

                <div class="profile-info-value">
                        <span class="editable" id="event_status"><?php echo $event['Event']['status']; ?>&nbsp;</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Início </div>

                <div class="profile-info-value">
                    <span id="event_start"><?php echo $event['Event']['start']; ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Fim </div>

                <div class="profile-info-value">
                    <span class="editable" id="event_end"><?php echo $event['Event']['end']; ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Integral </div>

                <div class="profile-info-value">
                    <span class="editable" id="event_all_day">
                        <?php
                        if($event['Event']['all_day'])
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
                    </span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Refeição </div>

                <div class="profile-info-value">
                     <span class="editable" id="event_all_day">
                        <?php echo $this->Html->link($event['MealsForEvent'][0]['Meal']['code'], array('plugin' => false, 'controller' => 'meals', 'action' => 'view', $event['MealsForEvent'][0]['Meal']['id'])); ?>
                     </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-7">
        <h4 class="header smaller lighter blue"> Receitas </h4>

        <div id="accordion" class="accordion-style1 panel-group">
            <?php foreach($event['MealsForEvent'][0]['Meal']['RecipesForMeal'] as $relatedRecipe): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#recipeTabId<?php echo $relatedRecipe['Recipe']['id']; ?>">
                                <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
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
                                        <div class="widget-box transparent collapsed">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title lighter">
                                                    <i class="ace-icon fa fa-star orange"></i>Rendimento Padrão: <small><?php echo $relatedRecipe['Recipe']['income']; ?> pessoas</small>
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

                                                                <th>
                                                                    <i class="ace-icon fa fa-caret-right blue"></i>Em estoque
                                                                </th>

                                                                <th class="hidden-480">
                                                                    <i class="ace-icon fa fa-caret-right blue"></i>Unidade
                                                                </th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php foreach($relatedRecipe['Recipe']['ProductsForRecipe'] as $relatedProduct): ?>
                                                                <tr>
                                                                    <td style="text-align: right"><?php echo $relatedProduct['quantity']; ?></td>

                                                                    <td><?php echo $relatedProduct['Product']['MeasureUnit']['name']; ?></td>

                                                                    <td class="hidden-480"><?php echo $relatedProduct['Product']['code']; ?></td>

                                                                    <td>
                                                                        <span class="label label-sm <?php echo $class = ($relatedProduct['quantity'] <= $relatedProduct['Product']['load_stock']) ? 'label-success':'label-danger';?>" id="certify_quantity"><?php echo $relatedProduct['Product']['load_stock']; echo $class = ($class == 'label-success') ? '&nbsp;<i class="glyphicon glyphicon-ok"></i>':'&nbsp;<i class="glyphicon glyphicon-remove"></i>'; ?></span>
                                                                    </td>

                                                                    <td class="hidden-480"><?php echo $relatedProduct['Product']['MeasureUnit']['name']; ?></td>
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
                                                    <i class="ace-icon fa fa-star orange"></i>Rendimento aproximado (<?php echo $relatedRecipe['portion_multiplier']; ?>x):<small> <?php echo $float_income = $relatedRecipe['Recipe']['income']*$relatedRecipe['portion_multiplier']; ?> pessoas</small>
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

                                                                <th>
                                                                    <i class="ace-icon fa fa-caret-right blue"></i>Em estoque
                                                                </th>

                                                                <th class="hidden-480">
                                                                    <i class="ace-icon fa fa-caret-right blue"></i>Unidade
                                                                </th>

                                                                <th class="actions"><?php echo __('Ações'); ?></th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php foreach($relatedRecipe['Recipe']['ProductsForRecipe'] as $relatedProduct): ?>
                                                                <tr>
                                                                    <?php $portion_quantified = $relatedProduct['quantity']*$relatedRecipe['portion_multiplier']; ?>
                                                                    <td style="text-align: right"><?php echo $portion_quantified; ?></td>

                                                                    <td><?php echo $relatedProduct['Product']['MeasureUnit']['name']; ?></td>

                                                                    <td class="hidden-480"><?php echo $relatedProduct['Product']['code']; ?></td>

                                                                    <td>
                                                                        <span class="label label-sm <?php echo $class = ($portion_quantified <= $relatedProduct['Product']['load_stock']) ? 'label-success':'label-danger';?>" id="certify_quantity"><?php echo $relatedProduct['Product']['load_stock']; echo $tagI = ($class == 'label-success') ? '&nbsp;<i class="glyphicon glyphicon-ok"></i>':'&nbsp;<i class="glyphicon glyphicon-remove"></i>'; ?></span>
                                                                    </td>

                                                                    <td class="hidden-480"><?php echo $relatedProduct['Product']['MeasureUnit']['name']; ?></td>

                                                                    <td class="actions">
                                                                        <div class="btn-group">
                                                                            <?php
                                                                            if($class == 'label-success'){
                                                                                echo $this->Html->link(
                                                                                    $this->Html->tag(
                                                                                        'i',
                                                                                        '',
                                                                                        array('class' => 'ace-icon fa fa-cog')
                                                                                    ),
                                                                                    array(
                                                                                        'controller' => 'productOutput',
                                                                                        'action' => 'manual_submit',
                                                                                        $relatedProduct['Product']['id']
                                                                                    ),
                                                                                    array(
                                                                                        'escape' => false,
                                                                                        'class' => 'btn btn-xs btn-primary actions-tooltip tooltip-info',
                                                                                        'data-toggle' => 'tooltip',
                                                                                        'data-placement' => 'top',
                                                                                        'title' => 'ver produto',
                                                                                        'data-trigger' => 'hover'
                                                                                    )
                                                                                );
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </td>
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

    <div class="col-sm-12">
        <h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
        <div class="row">
            <div class="col-sm-6">
                <p>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag(
                            'i',
                            '',
                            array('class' => 'glyphicon glyphicon-minus')
                        ).' Retirar refeição em estoque',
                        '/events/output_meal/'.$event['MealsForEvent'][0]['id'].'/'.+$event['Event']['id'],
                        array(
                            'escape' => false,
                            'class' => 'btn btn-lg btn-danger'
                        )
                    );
                    ?>
                </p>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>\