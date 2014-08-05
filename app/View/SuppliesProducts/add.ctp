<div class="suppliesProducts form">
<?php echo $this->Form->create('SuppliesProduct'); ?>
	<fieldset>
		<legend><?php echo __('Add Supplies Product'); ?></legend>
	<?php
		echo $this->Form->input('quantity');
		echo $this->Form->input('date_of_entry');
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('measure_unit_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Supplies Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units'), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit'), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
