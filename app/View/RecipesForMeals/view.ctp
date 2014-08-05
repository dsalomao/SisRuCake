<div class="recipesForMeals view">
<h2><?php echo __('Recipes For Meal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipesForMeal['RecipesForMeal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipesForMeal['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $recipesForMeal['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipesForMeal['Meal']['id'], array('controller' => 'meals', 'action' => 'view', $recipesForMeal['Meal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Service'); ?></dt>
		<dd>
			<?php echo h($recipesForMeal['RecipesForMeal']['date_of_service']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipes For Meal'), array('action' => 'edit', $recipesForMeal['RecipesForMeal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipes For Meal'), array('action' => 'delete', $recipesForMeal['RecipesForMeal']['id']), null, __('Are you sure you want to delete # %s?', $recipesForMeal['RecipesForMeal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes For Meals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes For Meal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meals'), array('controller' => 'meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('controller' => 'meals', 'action' => 'add')); ?> </li>
	</ul>
</div>
