<div class="recipesForMeals index">
	<h2><?php echo __('Recipes For Meals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('recipe_id'); ?></th>
			<th><?php echo $this->Paginator->sort('meal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recipesForMeals as $recipesForMeal): ?>
	<tr>
		<td><?php echo h($recipesForMeal['RecipesForMeal']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipesForMeal['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $recipesForMeal['Recipe']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recipesForMeal['Meal']['id'], array('controller' => 'meals', 'action' => 'view', $recipesForMeal['Meal']['id'])); ?>
		</td>
		<td><?php echo h($recipesForMeal['RecipesForMeal']['category']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recipesForMeal['RecipesForMeal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipesForMeal['RecipesForMeal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipesForMeal['RecipesForMeal']['id']), null, __('Are you sure you want to delete # %s?', $recipesForMeal['RecipesForMeal']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Recipes For Meal'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meals'), array('controller' => 'meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('controller' => 'meals', 'action' => 'add')); ?> </li>
	</ul>
</div>
