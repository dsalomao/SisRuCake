/**
 * Created by daniel on 13/08/14.
 */

jQuery(function($) {
    $('#SupplierCnpj').mask('00.000.000/0000-00');
    $('#SupplierContact').mask('(00) 0000-0000');

    $( "#SupplierName" ).on('input', function() {
        var input = $.trim($(this).val().replace(/\s+/g, ''));
        console.log(input);

        $("#SupplierCode").val(input + '0000');

        if(!input) {
            $("#SupplierCode").val("");
        }
    });
});
