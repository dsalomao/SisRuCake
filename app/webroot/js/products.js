jQuery(function($) {

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

    //$('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');


    $( "#ProductName" ).on('input', function() {
        var input = $(this).val();

        $("#ProductCode").val(input + '0000');

        if(!input) {
            $("#ProductCode").val("");
        }
    });

    $('.easy-pie-chart.percentage').each(function(){
        var $box = $(this).closest('.infobox');
        var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
        var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
        console.log($(this).data());
        var size = parseInt($(this).data('size')) || 50;
        $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size/10),
            animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
            size: size
        });
    })

});

