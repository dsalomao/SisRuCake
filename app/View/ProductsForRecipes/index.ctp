<div class="productsForRecipes index">
	<h2><?php echo __('Products For Recipes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('recipe_id'); ?></th>
			<th><?php echo $this->Paginator->sort('measure_unit_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($productsForRecipes as $productsForRecipe): ?>
	<tr>
		<td><?php echo h($productsForRecipe['ProductsForRecipe']['id']); ?>&nbsp;</td>
		<td><?php echo h($productsForRecipe['ProductsForRecipe']['quantity']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productsForRecipe['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsForRecipe['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($productsForRecipe['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $productsForRecipe['Recipe']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($productsForRecipe['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $productsForRecipe['MeasureUnit']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $productsForRecipe['ProductsForRecipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $productsForRecipe['ProductsForRecipe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $productsForRecipe['ProductsForRecipe']['id']), null, __('Are you sure you want to delete # %s?', $productsForRecipe['ProductsForRecipe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Products For Recipe'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units'), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit'), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
