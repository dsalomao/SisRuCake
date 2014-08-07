<div class="page-header">
    <h1>Refeições<small><i class="ace-icon fa fa-angle-double-right"></i> receitas & produtos</small></h1>
</div>

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
    <?php foreach($relatedRecipes as $relatedRecipe): ?>
            <div class="col-sm-6">
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#atributes<?php echo h('_for_'.$relatedRecipe['Recipe']['id'])?>">
                                <i class="green ace-icon fa fa-home bigger-120"></i>
                                Atributos &nbsp;
                            </a>
                        </li>

                        <li class="">
                            <a data-toggle="tab" href="#description<?php echo h('_for_'.$relatedRecipe['Recipe']['id'])?>">
                                Descrição &nbsp;
                            </a>
                        </li>

                        <li class="">
                            <a data-toggle="tab" href="#instructions<?php echo h('_for_'.$relatedRecipe['Recipe']['id'])?>">
                                Instru&ccedil;&otilde;es &nbsp;
                            </a>
                        </li>

                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                Ações &nbsp;
                                <i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-info">
                                <li>
                                    <?php echo $this->Html->link(
                                        $this->Html->tag(
                                            'i',
                                            '',
                                            array('class' => 'ace-icon fa fa-search-plus')
                                        ).'&nbsp; ver receita',
                                        array(
                                            'controller' => 'Recipes',
                                            'action' => 'view',
                                            $relatedRecipe['Recipe']['id']
                                        ),
                                        array(
                                            'escape' => false
                                        )
                                    ); ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link(
                                        $this->Html->tag(
                                            'i',
                                            '',
                                            array('class' => 'glyphicon glyphicon-pencil')
                                        ).'&nbsp; Editar receita',
                                        array(
                                            'controller' => 'Recipes',
                                            'action' => 'edit',
                                            $relatedRecipe['Recipe']['id']
                                        ),
                                        array(
                                            'escape' => false
                                        )
                                    ); ?>
                                </li>
                                <li>
                                    <?php echo $this->Form->postlink(
                                        $this->Html->tag(
                                            'i',
                                            '',
                                            array('class' => 'glyphicon glyphicon-remove')
                                        ).'&nbsp; Remover receita',
                                        array(
                                            'controller' => 'RecipesForMeals',
                                            'action' => 'delete',
                                            $relatedRecipe['RecipesForMeal']['id']
                                        ),
                                        array(
                                            'escape' => false
                                        ),
                                        __('Esta operação irá apagar esta receita desta refeição, deseja continuar?')
                                    ); ?>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="atributes<?php echo h('_for_'.$relatedRecipe['Recipe']['id'])?>" class="tab-pane active">
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nome </div>

                                    <div class="profile-info-value">
                                        <span class="" id="recipe_name">
                                            <?php echo $this->Html->link(
                                                $relatedRecipe['Recipe']['name'],
                                                array(
                                                    'controller' => 'Recipes',
                                                    'action' => 'view',
                                                    $relatedRecipe['Recipe']['id']
                                                ),
                                                array(
                                                    'escape' => false
                                                )
                                            );?>&nbsp;
                                        </span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> C&oacute;digo </div>

                                    <div class="profile-info-value">
                                        <span class="" id="recipe_code"><?php echo h($relatedRecipe['Recipe']['code']); ?>&nbsp;</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Porcionamento </div>

                                    <div class="profile-info-value">
                                        <span class="" id="recipe_code"><?php echo h('x '.$relatedRecipe['RecipesForMeal']['quantity']); ?>&nbsp;</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Criado </div>

                                    <div class="profile-info-value">
                                        <span class="" id="recipe_created"><?php echo h(date("d-m-Y", strtotime($relatedRecipe['Recipe']['created']))); ?>&nbsp;</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Modificado </div>

                                    <div class="profile-info-value">
                                        <span class="" id="recipe_modified"><?php echo h(date("d-m-Y", strtotime($relatedRecipe['Recipe']['modified']))); ?>&nbsp;</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Status </div>

                                    <div class="profile-info-value">
                                        <span class="label label-sm <?php echo $class = ($relatedRecipe['Recipe']['status'] == 1) ? 'label-success':'label-danger';?>" id="recipe_status"><?php echo $status = ($relatedRecipe['Recipe']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="description<?php echo h('_for_'.$relatedRecipe['Recipe']['id'])?>" class="tab-pane">
                            <p><?php echo h($relatedRecipe['Recipe']['description']); ?>&nbsp;</p>
                        </div>

                        <div id="instructions<?php echo h('_for_'.$relatedRecipe['Recipe']['id'])?>" class="tab-pane">
                            <p><?php echo h($relatedRecipe['Recipe']['instructions']); ?>&nbsp;</p>
                        </div>

                    </div>
                </div>
            </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="header smaller lighter blue"> Ações </h4>
        <p>
            <?php
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
            ?>
        </p>
    </div>
</div>

<div class="meals view">
<h2><?php echo __('Meal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meal['Meal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($meal['Meal']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($meal['Meal']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($meal['Meal']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($meal['Meal']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meal'), array('action' => 'edit', $meal['Meal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meal'), array('action' => 'delete', $meal['Meal']['id']), null, __('Are you sure you want to delete # %s?', $meal['Meal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes For Meals'), array('controller' => 'recipes_for_meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes For Meal'), array('controller' => 'recipes_for_meals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Recipes For Meals'); ?></h3>
	<?php if (!empty($meal['RecipesForMeal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Recipe Id'); ?></th>
		<th><?php echo __('Meal Id'); ?></th>
		<th><?php echo __('Date Of Service'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($meal['RecipesForMeal'] as $recipesForMeal): ?>
		<tr>
			<td><?php echo $recipesForMeal['id']; ?></td>
			<td><?php echo $recipesForMeal['recipe_id']; ?></td>
			<td><?php echo $recipesForMeal['meal_id']; ?></td>
			<td><?php echo $recipesForMeal['date_of_service']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recipes_for_meals', 'action' => 'view', $recipesForMeal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recipes_for_meals', 'action' => 'edit', $recipesForMeal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recipes_for_meals', 'action' => 'delete', $recipesForMeal['id']), null, __('Are you sure you want to delete # %s?', $recipesForMeal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recipes For Meal'), array('controller' => 'recipes_for_meals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
