<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 28/08/14
 * Time: 14:20
 */

    $this->Html->css('dashboard', array('inline' => false));
?>

<div class="page-header">
    <h1>Área de trabalho
        <small><i class="ace-icon fa fa-angle-double-right"></i></small>
    </h1>
</div>
<div class="container">
    <div class="row">
        <h2>Logística & suprimentos</h2>
        <div class="well text-center">
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-folder-open')
                ).' Caderno de entrada',
                array(
                    'controller' => 'suppliesProducts',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-dafault', 'escape' => false)
            ); ?>
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-plane')
                ).' Fornecedores',
                array(
                    'controller' => 'suppliers',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            ); ?>
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-glass')
                ).' Produtos',
                array(
                    'controller' => 'products',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-primary', 'escape' => false)
            ); ?>
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-tint')
                ).' Unidades de medida',
                array(
                    'controller' => 'measureUnits',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-success', 'escape' => false)
            ); ?>
        </div>
    </div>
    <div class="row">
        <h2>Planejamento de cardápio</h2>
        <div class="well text-center">
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-book')
                ).' Livro de cardápios',
                array(
                    'controller' => 'meals',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-default', 'escape' => false)
            ); ?>
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-calendar')
                ).' Calendário',
                array(
                    'controller' => 'meals',
                    'action' => 'calendar'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            ); ?>
        </div>
    </div>
    <div class="row">
        <h2>Receituário padrão</h2>
        <div class="well text-center">
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-book')
                ).' Livro de receitas',
                array(
                    'controller' => 'recipes',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-default', 'escape' => false)
            ); ?>
        </div>
    </div>
</div>