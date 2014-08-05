jQuery(function($) {

    //spinners

    //fuelux
    $('#ProductLoadMin').ace_spinner({
        value:0,
        min:0,
        max:100,
        step:5,

        btn_up_class:'btn-info' ,
        btn_down_class:'btn-info'
    })
        .on('change', function(){
            //alert(this.value)
        });

    $('#ProductLoadMax').ace_spinner({
        value:0,
        min:0,
        max:100,
        step:5,

        btn_up_class:'btn-info' ,
        btn_down_class:'btn-info'
    })
        .on('change', function(){
            //alert(this.value)
        });

    $('#ProductLoadStock').ace_spinner({
        value:0,
        min:0,
        max:100,
        step:5,

        btn_up_class:'btn-info' ,
        btn_down_class:'btn-info'
    })
        .on('change', function(){
            //alert(this.value)
        });

    $('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');

});

