<div class="recipesForMeals form">
<?php echo $this->Form->create('RecipesForMeal'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recipes For Meal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('meal_id');
		echo $this->Form->input('date_of_service');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RecipesForMeal.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RecipesForMeal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes For Meals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meals'), array('controller' => 'meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('controller' => 'meals', 'action' => 'add')); ?> </li>
	</ul>
</div>
