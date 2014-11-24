<div class="manualAdjustments form">
<?php echo $this->Form->create('ManualAdjustment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Manual Adjustment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ManualAdjustment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ManualAdjustment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manual Adjustments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
