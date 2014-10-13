<div class="productsForEvents view">
<h2><?php echo __('Products For Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productsForEvent['ProductsForEvent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($productsForEvent['ProductsForEvent']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Submition'); ?></dt>
		<dd>
			<?php echo h($productsForEvent['ProductsForEvent']['date_of_submition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsForEvent['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsForEvent['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsForEvent['Event']['title'], array('controller' => 'events', 'action' => 'view', $productsForEvent['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Products For Event'), array('action' => 'edit', $productsForEvent['ProductsForEvent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Products For Event'), array('action' => 'delete', $productsForEvent['ProductsForEvent']['id']), array(), __('Are you sure you want to delete # %s?', $productsForEvent['ProductsForEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products For Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products For Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
