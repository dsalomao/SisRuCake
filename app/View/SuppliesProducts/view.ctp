<div class="suppliesProducts view">
<h2><?php echo __('Supplies Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($suppliesProduct['SuppliesProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($suppliesProduct['SuppliesProduct']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Entry'); ?></dt>
		<dd>
			<?php echo h($suppliesProduct['SuppliesProduct']['date_of_entry']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($suppliesProduct['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $suppliesProduct['Supplier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($suppliesProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $suppliesProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Measure Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($suppliesProduct['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $suppliesProduct['MeasureUnit']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supplies Product'), array('action' => 'edit', $suppliesProduct['SuppliesProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supplies Product'), array('action' => 'delete', $suppliesProduct['SuppliesProduct']['id']), null, __('Are you sure you want to delete # %s?', $suppliesProduct['SuppliesProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplies Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units'), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit'), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
