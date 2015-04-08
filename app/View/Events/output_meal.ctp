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
$this->Html->addCrumb($event['Event']['title'], '/events/view/'.+$event['Event']['id']);
$this->Html->addCrumb('Retirar em estoque');
?>

<div class="page-header">
    <h1>
        Sumário
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            sumário de produtos a serem retirados para a refeição:
            <?php echo $this->Html->link($event['Event']['title'], array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <ul class="list-group">
            <?php foreach($mealIngredients as $mealIngredient) : ?>
                <li class="list-group-item" data-id="product_<?php echo $mealIngredient['product_id']; ?>">
                    <span class="badge"><?php echo $mealIngredient['quantity']; ?> <?php echo $mealIngredient['measure_unit']; ?></span> <?php echo $mealIngredient['name']; ?> <?php echo $mealIngredient['code']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-6">

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
