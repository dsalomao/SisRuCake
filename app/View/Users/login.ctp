<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 27/08/14
 * Time: 23:27
 */

    $this->layout = 'login_layout';
?>

<?php
echo $this->Form->create(
    'User',
    array(
        'class' => 'form-horizontal',
        'role' => 'form',
        'inputDefaults' => array(
            'label' => false,
            'div' => false
        )
    )
); ?>
    <fieldset>
        <label class="block clearfix">
            <span class="block input-icon input-icon-right">
                <?php echo $this->Form->input(
                    'User.username',
                    array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Username'
                    )
                ); ?>
                <i class="ace-icon fa fa-user"></i>
            </span>
        </label>

        <label class="block clearfix">
            <span class="block input-icon input-icon-right">
                <?php echo $this->Form->input(
                    'User.password',
                    array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' => 'Senha'

                    )
                ); ?>
                <i class="ace-icon fa fa-lock"></i>
            </span>
        </label>

        <div class="space"></div>

        <div class="clearfix">

            <?php echo $this->Form->button(
                $this->Html->tag(
                    'i',
                    '',
                    array(
                        'class' => 'ace-icon fa fa-key'
                    )
                ).$this->Html->tag(
                    'span',
                    'Entrar &nbsp;',
                    array(
                        'class' => 'bigger-110'
                    )
                ),
                array(
                    'type' => 'submit',
                    'class' => 'width-35 pull-right btn btn-sm btn-primary',
                    'escape' => false
                )
            ); ?>
        </div>

        <div class="space-4"></div>
    </fieldset>