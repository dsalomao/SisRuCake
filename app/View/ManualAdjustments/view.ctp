<div class="manualAdjustments view">
<h2><?php echo __('Manual Adjustment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($manualAdjustment['ManualAdjustment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($manualAdjustment['ManualAdjustment']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($manualAdjustment['ManualAdjustment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($manualAdjustment['ManualAdjustment']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($manualAdjustment['Product']['name'], array('controller' => 'products', 'action' => 'view', $manualAdjustment['Product']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manual Adjustment'), array('action' => 'edit', $manualAdjustment['ManualAdjustment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manual Adjustment'), array('action' => 'delete', $manualAdjustment['ManualAdjustment']['id']), array(), __('Are you sure you want to delete # %s?', $manualAdjustment['ManualAdjustment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manual Adjustments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manual Adjustment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
