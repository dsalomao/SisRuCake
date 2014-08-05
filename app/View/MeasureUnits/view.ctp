<div class="measureUnits view">
<h2><?php echo __('Measure Unit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($measureUnit['MeasureUnit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($measureUnit['MeasureUnit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($measureUnit['MeasureUnit']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($measureUnit['MeasureUnit']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Measure Unit'), array('action' => 'edit', $measureUnit['MeasureUnit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Measure Unit'), array('action' => 'delete', $measureUnit['MeasureUnit']['id']), null, __('Are you sure you want to delete # %s?', $measureUnit['MeasureUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products For Recipes'), array('controller' => 'products_for_recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products For Recipe'), array('controller' => 'products_for_recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies Products'), array('controller' => 'supplies_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplies Product'), array('controller' => 'supplies_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($measureUnit['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Load Min'); ?></th>
		<th><?php echo __('Load Max'); ?></th>
		<th><?php echo __('Load Stock'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Restaurant Id'); ?></th>
		<th><?php echo __('Measure Unit Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($measureUnit['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['code']; ?></td>
			<td><?php echo $product['load_min']; ?></td>
			<td><?php echo $product['load_max']; ?></td>
			<td><?php echo $product['load_stock']; ?></td>
			<td><?php echo $product['status']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td><?php echo $product['restaurant_id']; ?></td>
			<td><?php echo $product['measure_unit_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Products For Recipes'); ?></h3>
	<?php if (!empty($measureUnit['ProductsForRecipe'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Recipe Id'); ?></th>
		<th><?php echo __('Measure Unit Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($measureUnit['ProductsForRecipe'] as $productsForRecipe): ?>
		<tr>
			<td><?php echo $productsForRecipe['id']; ?></td>
			<td><?php echo $productsForRecipe['quantity']; ?></td>
			<td><?php echo $productsForRecipe['product_id']; ?></td>
			<td><?php echo $productsForRecipe['recipe_id']; ?></td>
			<td><?php echo $productsForRecipe['measure_unit_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products_for_recipes', 'action' => 'view', $productsForRecipe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products_for_recipes', 'action' => 'edit', $productsForRecipe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products_for_recipes', 'action' => 'delete', $productsForRecipe['id']), null, __('Are you sure you want to delete # %s?', $productsForRecipe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Products For Recipe'), array('controller' => 'products_for_recipes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Supplies Products'); ?></h3>
	<?php if (!empty($measureUnit['SuppliesProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Date Of Entry'); ?></th>
		<th><?php echo __('Supplier Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Measure Unit Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($measureUnit['SuppliesProduct'] as $suppliesProduct): ?>
		<tr>
			<td><?php echo $suppliesProduct['id']; ?></td>
			<td><?php echo $suppliesProduct['quantity']; ?></td>
			<td><?php echo $suppliesProduct['date_of_entry']; ?></td>
			<td><?php echo $suppliesProduct['supplier_id']; ?></td>
			<td><?php echo $suppliesProduct['product_id']; ?></td>
			<td><?php echo $suppliesProduct['measure_unit_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'supplies_products', 'action' => 'view', $suppliesProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'supplies_products', 'action' => 'edit', $suppliesProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'supplies_products', 'action' => 'delete', $suppliesProduct['id']), null, __('Are you sure you want to delete # %s?', $suppliesProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Supplies Product'), array('controller' => 'supplies_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
