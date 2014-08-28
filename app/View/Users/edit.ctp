<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */

$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('users_add', array('inline' => false));

?>

<div class="page-header">
    <h1>Editar usuário<small><i class="ace-icon fa fa-angle-double-right"></i> <?php echo $this->request->data['User']['username']; ?></small></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Novo usuário</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="products form">
                        <?php echo $this->Form->create(
                            'User',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                                )
                            )
                        ); ?>
                        <fieldset style="padding: 16px">
                            <?php echo $this->Form->input('id'); ?>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserUsername"> Username </label>


                                <?php echo $this->Form->input(
                                    'User.username',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserPassword"> Senha </label>


                                <?php echo $this->Form->input(
                                    'User.password',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserFirstName"> Nome </label>

                                <?php echo $this->Form->input(
                                    'User.first_name',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserLastName"> Sobrenome </label>


                                <?php echo $this->Form->input(
                                    'User.last_name',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserEmail"> Email </label>


                                <?php echo $this->Form->input(
                                    'User.email',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserRestaurantId"> Unidade UNESP </label>


                                <?php echo $this->Form->input(
                                    'User.restaurant_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha uma UAN'
                                    )
                                ); ?>

                            </div>

                        </fieldset>

                        <div class="form-actions center">
                            <?php echo $this->Form->button(
                                'editar &nbsp;'.$this->Html->tag(
                                    'i',
                                    '',
                                    array(
                                        'class' => '"ace-icon fa fa-arrow-right icon-on-right bigger-110'
                                    )
                                ),
                                array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-warning',
                                    'escape' => false
                                )
                            ); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
