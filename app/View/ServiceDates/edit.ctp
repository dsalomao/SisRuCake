<div class="serviceDates form">
<?php echo $this->Form->create('ServiceDate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Service Date'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('service_date');
		echo $this->Form->input('meal_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ServiceDate.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ServiceDate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Service Dates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Meals'), array('controller' => 'meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('controller' => 'meals', 'action' => 'add')); ?> </li>
	</ul>
</div>
