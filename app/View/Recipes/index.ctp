<?php


$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));

?>

<div class="page-header">
    <h1>Livro de receitas
        <small><i class="ace-icon fa fa-angle-double-right"></i></small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Results for "Latest Registered Domains"
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">
                        <label class="position-relative">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th><?php echo $this->Paginator->sort('code'); ?></th>
                    <th class="hidden-md"><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td><?php echo h($recipe['Recipe']['id']); ?>&nbsp;</td>
                        <td><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</td>
                        <td><?php echo h($recipe['Recipe']['code']); ?>&nbsp;</td>
                        <td class="hidden-md"><?php echo h($recipe['Recipe']['description']); ?>&nbsp;</td>
                        <td><?php echo h($recipe['Recipe']['created']); ?>&nbsp;</td>
                        <td><?php echo h($recipe['Recipe']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <div class="hidden-xs action-buttons">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-search-plus bigger-130')
                                    ),
                                    array(
                                        'action' => 'view',
                                        $recipe['Recipe']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'blue'
                                    )
                                );
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-pencil bigger-130')
                                    ),
                                    array(
                                        'action' => 'edit',
                                        $recipe['Recipe']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'orange'
                                    )
                                );
                                ?>
                                &nbsp;
                                <?php
                                echo $this->Form->postlink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'glyphicon glyphicon-remove')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $recipe['Recipe']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-inverse'
                                    ),
                                    __('Ao ser deletado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $recipe['Recipe']['id'])
                                );
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h4> A&ccedil;&otilde;es </h4>
        <div class="hr dotted"></div>
        <p>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Nova',
                array(
                    'controller' => 'recipes',
                    'action' => 'add'
                ),
                array('class' => 'btn btn-lg btn-primary', 'escape' => false)
            );
            ?>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-eye')
                ).' Receitas desativadas',
                array(
                    'controller' => 'recipes',
                    'action' => 'deleted_index'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            );
            ?>
        </p>
    </div>
</div>

<div class="recipes index">
	<h2><?php echo __('Recipes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('instructions'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo h($recipe['Recipe']['id']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['code']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['description']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['instructions']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['created']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipe['Recipe']['id']), null, __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products For Recipes'), array('controller' => 'products_for_recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products For Recipe'), array('controller' => 'products_for_recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes For Meals'), array('controller' => 'recipes_for_meals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes For Meal'), array('controller' => 'recipes_for_meals', 'action' => 'add')); ?> </li>
	</ul>
</div>
