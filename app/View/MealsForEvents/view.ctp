<div class="mealsForEvents view">
<h2><?php echo __('Meals For Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mealsForEvent['MealsForEvent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mealsForEvent['Meal']['code'], array('controller' => 'meals', 'action' => 'view', $mealsForEvent['Meal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mealsForEvent['Event']['title'], array('controller' => 'events', 'action' => 'view', $mealsForEvent['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meals For Event'), array('action' => 'edit', $mealsForEvent['MealsForEvent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meals For Event'), array('action' => 'delete', $mealsForEvent['MealsForEvent']['id']), array(), __('Are you sure you want to delete # %s?', $mealsForEvent['MealsForEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meals For Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meals For Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meals'), array('controller' => 'meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('controller' => 'meals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
