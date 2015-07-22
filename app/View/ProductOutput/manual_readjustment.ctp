<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/06/15
 * Time: 16:41
 */

$this->Html->css('bootstrap-datetimepicker', array('inline' => false));
$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('libs/moment', array('inline' => false));
$this->Html->script('libs/bootstrap-datetimepicker', array('inline' => false));
$this->Html->script('libs/bootstrap-datetimepicker.pt-BR', array('inline' => false));
$this->Html->script('productOutput', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Produtos', '/products');
$this->Html->addCrumb('Reajuste Manual');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title col-sm-6">Reajuste manual</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="productOutput form">
                        <?php echo $this->Form->create(
                            'ProductOutput',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                                )
                            )
                        ); ?>
                        <fieldset style="padding: 16px">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ProductOutputQuantity"> Quantidade </label>

                                <?php echo $this->Form->input(
                                    'quantity',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-xs-6 col-sm-2',
                                        'class' => 'input-mini'
                                    )
                                ); ?>
                                <div class="col-xs-6 col-sm-7">
                                    <?php
                                    $control[] = null;
                                    foreach($products as $product){
                                        if(!in_array($product['MeasureUnit']['id'], $control)){
                                            echo $this->Html->tag(
                                                'span',
                                                $product['MeasureUnit']['name'],
                                                array(
                                                    'class' => 'label label-lg label-info arrowed-right hidden',
                                                    'id' => 'tag_'.$product['MeasureUnit']['id']
                                                )
                                            );
                                            $control[] = $product['MeasureUnit']['id'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="ProductOutputProductId"> Produto </label>

                                <div class="col-sm-9">
                                    <select name="data[ProductOutput][product_id]" class="chosen-select" placeholder="Escolha um produto" id="ProductOutputProductId">
                                        <?php foreach($products as $product): ?>
                                            <option value="<?php echo $product['Product']['id']; ?>" data-measure-unit-id="<?php echo $product['MeasureUnit']['id']?>"><?php echo $product['Product']['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>