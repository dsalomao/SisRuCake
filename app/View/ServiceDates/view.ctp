<div class="serviceDates view">
<h2><?php echo __('Service Date'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($serviceDate['ServiceDate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Date'); ?></dt>
		<dd>
			<?php echo h($serviceDate['ServiceDate']['service_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($serviceDate['Meal']['description'], array('controller' => 'meals', 'action' => 'view', $serviceDate['Meal']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Service Date'), array('action' => 'edit', $serviceDate['ServiceDate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Service Date'), array('action' => 'delete', $serviceDate['ServiceDate']['id']), array(), __('Are you sure you want to delete # %s?', $serviceDate['ServiceDate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Dates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Date'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meals'), array('controller' => 'meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal'), array('controller' => 'meals', 'action' => 'add')); ?> </li>
	</ul>
</div>
