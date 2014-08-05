<div class="productsForRecipes view">
<h2><?php echo __('Products For Recipe'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productsForRecipe['ProductsForRecipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($productsForRecipe['ProductsForRecipe']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsForRecipe['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsForRecipe['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsForRecipe['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $productsForRecipe['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Measure Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsForRecipe['MeasureUnit']['name'], array('controller' => 'measure_units', 'action' => 'view', $productsForRecipe['MeasureUnit']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Products For Recipe'), array('action' => 'edit', $productsForRecipe['ProductsForRecipe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Products For Recipe'), array('action' => 'delete', $productsForRecipe['ProductsForRecipe']['id']), null, __('Are you sure you want to delete # %s?', $productsForRecipe['ProductsForRecipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products For Recipes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products For Recipe'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units'), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit'), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
