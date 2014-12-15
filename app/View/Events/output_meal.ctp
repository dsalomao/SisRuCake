<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/12/14
 * Time: 23:26
 */
echo $this->Html->script('libs/jquery.nestable');
echo $this->Html->script('events_output_meal');

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

<div class="dd">
    <ol class="dd-list">
        <?php foreach($mealIngredients as $mealIngredient) : ?>
            <li class="dd-item dd-collapsed" data-id="product_<?php echo $mealIngredient['product_id']; ?>">
                <div class="dd-handle">
                    <?php echo $mealIngredient['name']; ?>
                </div>
                <ol class="dd-list">
                    <li class="dd-item">
                        <div class="dd-handle">
                            <?php echo $mealIngredient['quantity']; ?> <?php echo $mealIngredient['measure_unit']; ?>
                        </div>
                    </li>
                    <li class="dd-item">
                        <div class="dd-handle">
                            Código do produto: <?php echo $this->Html->link($mealIngredient['code'], array('controller' => 'product', 'action' => 'view', $mealIngredient['product_id'])); ?>
                        </div>
                    </li>
                </ol>
            </li>
        <?php endforeach; ?>
    </ol>
</div>