<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/08/14
 * Time: 03:16
 */
?>
<div class="page-header">
    <h1>Livro de refeições
        <small><i class="ace-icon fa fa-angle-double-right"></i></small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header" style="background-color: darkred">
            Tabela de cardápios desativados
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
                    <th><?php echo $this->Paginator->sort('code'); ?></th>
                    <th class="hidden-md"><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($meals as $meal): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td><?php echo h($meal['Meal']['code']); ?>&nbsp;</td>
                        <td class="hidden-md"><?php echo h($meal['Meal']['description']); ?>&nbsp;</td>
                        <td><?php echo h($meal['Meal']['created']); ?>&nbsp;</td>
                        <td><?php echo h($meal['Meal']['modified']); ?>&nbsp;</td>
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
                                        $meal['Meal']['id']
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
                                        $meal['Meal']['id']
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
                                        array('class' => 'glyphicon glyphicon-ok')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $meal['Meal']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-success'
                                    ),
                                    __('Esta operção iá restaurar o cardápio. Deseja continuar com a operação?', $meal['Meal']['id'])
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
                    'controller' => 'meals',
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
                ).' Refeições ativas',
                array(
                    'controller' => 'meals',
                    'action' => 'index'
                ),
                array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
            );
            ?>
        </p>
    </div>
</div>