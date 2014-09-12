    <?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/08/14
 * Time: 01:39
 */
$this->html->css('fullcalendar', array('inline' => false));

$this->html->script('ace/jquery-ui.custom', array('inline' => false));
$this->html->script('ace/fullcalendar', array('inline' => false));
$this->html->script('calendar', array('inline' => false));

    $this->Html->addCrumb('Calendário');
?>

<div class="col-sm-9">
    <div class="space"></div>

    <!-- #section:plugins/data-time.calendar -->
    <div id="calendar"></div>

    <!-- /section:plugins/data-time.calendar -->
</div>

<div class="col-sm-3">
    <div class="widget-box transparent">
        <div class="widget-header">
            <h4>Lista de cardápios</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <div id="external-events">
                    <?php foreach($meals as $meal): ?>
                        <div class="external-event label-info" data-class="label-grey">
                            <i class="ace-icon fa fa-arrows"></i>
                            <?php echo $meal['Meal']['code']; ?>
                        </div>
                    <?php endforeach; ?>
                    <label>
                        <input type="checkbox" class="ace ace-checkbox" id="drop-remove" />
                        <span class="lbl"> Remove after drop</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>