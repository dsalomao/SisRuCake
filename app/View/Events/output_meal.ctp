<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/12/14
 * Time: 23:26
 */
echo $this->Html->script('libs/jquery.nestable');
echo $this->Html->script('events_output_meal');

$this->Html->css('events', array('inline' => false));

$this->Html->addCrumb('Planejamento de cardápio');
$this->Html->addCrumb('Eventos', '/events');
$this->Html->addCrumb('Refeição '.$event['Event']['start'], '/events/view/'.+$event['Event']['id']);
$this->Html->addCrumb('Retirar em estoque');
?>

<div class="page-header">
    <h1>
        Sumário
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            sumário de produtos a serem retirados para a refeição:
            <?php echo $this->Html->link($event['Event']['details'], array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="hidden-xs"><?php echo 'Nome'; ?></th>
                <th><?php echo 'Código'; ?></th>
                <th class="hidden-sm hidden-xs"><?php echo 'Quantidade em estoque'; ?></th>
                <th><?php echo 'Quantidade a retirar'; ?></th>
                <th class="actions"><?php echo __('Ações'); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($mealIngredients as $mealIngredient) : ?>
                <tr>
                    <td class="hidden-xs"><?php echo $mealIngredient['name']; ?></td>
                    <td><?php echo $mealIngredient['code']; ?></td>
                    <td class="hidden-sm hidden-xs"><?php echo $mealIngredient['load_stock'].' '.$mealIngredient['measure_unit']; ?></td>
                    <td>
                        <p class=" <?php echo $class = ($mealIngredient['load_stock'] <= $mealIngredient['output']) ? 'red':'green';?>" id="certify_quantity"><?php echo $mealIngredient['output']; echo $class = ($class == 'green') ? '&nbsp;<i class="glyphicon glyphicon-ok"></i>':'&nbsp;<i class="glyphicon glyphicon-remove"></i>'; ?></p>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="col-xs-12">
        <h4 class="header smaller lighter blue"> A&ccedil;&otilde;es </h4>
        <div class="btn-group">
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-plus')
                ).' Dar baixa',
                array(
                    'controller' => 'products',
                    'action' => 'add'
                ),
                array('class' => 'btn btn-lg btn-primary btn-events', 'escape' => false)
            );
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-eye')
                ).' Relatório',
                array(
                    'controller' => 'products',
                    'action' => 'deleted_index'
                ),
                array('class' => 'btn btn-lg btn-inverse btn-events', 'escape' => false)
            );
            ?>
        </div>
    </div>
</div>
