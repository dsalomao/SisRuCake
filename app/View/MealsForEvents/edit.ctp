<div class="mealsForEvents form">
<?php echo $this->Form->create('MealsForEvent'); ?>
	<fieldset>
		<legend><?php echo __('Edit Meals For Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('meal_id');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MealsForEvent.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('MealsForEvent.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Meals For Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Meals'), array('controller' => 'meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('controller' => 'meals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
