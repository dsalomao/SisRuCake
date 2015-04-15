<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */

$this->Html->script('libs/jquery.mask', array('inline' => false));
$this->Html->script('suppliers_edit', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Fornecedores', '/suppliers');
if(!$this->data['Supplier']['status']) {
    $this->Html->addCrumb('Fornecedores desativados', '/suppliers/deleted_index');
}
$this->Html->addCrumb($this->data['Supplier']['name']);
$this->Html->addCrumb('Editar fornecedor');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Editar fornecedor: <?php echo $this->data['Supplier']['name']; ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="suppliers form">

                        <?php echo $this->Form->create(
                            'Supplier',
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
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Razão social </label>

                                <?php echo $this->Form->input(
                                    'Supplier.business_name',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Nome Fantasia </label>

                                <?php echo $this->Form->input(
                                    'Supplier.name',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductDateOfEntryMonth"> Código </label>


                                <?php echo $this->Form->input(
                                    'Supplier.code',
                                    array(
                                        'div' => 'col-sm-9'

                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> CNPJ </label>

                                <?php echo $this->Form->input(
                                    'Supplier.cnpj',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Número para contato </label>

                                <?php echo $this->Form->input(
                                    'Supplier.contact',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Endere&ccedil;o </label>


                                <?php echo $this->Form->input(
                                    'Supplier.adress',
                                    array(
                                        'div' => 'col-sm-9'
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
                                    'class' => 'btn btn-sm btn-success',
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

