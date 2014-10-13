<div class="productsForEvents form">
<?php echo $this->Form->create('ProductsForEvent'); ?>
	<fieldset>
		<legend><?php echo __('Edit Products For Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('date_of_submition');
		echo $this->Form->input('product_id');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProductsForEvent.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ProductsForEvent.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Products For Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
