/**
 * Created by Daniel on 11/08/2015.
 */
jQuery(function($) {
    $( document ).ready(function() {
        var selects = $('select');
        for(var i = 0; i < 7; i++ ) {
            var recipe_id = selects[i].options[0].getAttribute("value");
            var select_id = selects[i].id;
            var tag_name = select_id+'Tag_'+recipe_id;
            $('#'+tag_name).toggleClass('hidden');
        }
    });

    $('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');

    $('#ProteinPlate').change(function() {
        $('#ProteinPlateIncome').children('.label-info').addClass('hidden');
        var e = document.getElementById("ProteinPlate");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "ProteinPlateTag_";
        var tag_name = tag_name + recipe_id;
        var expected = $('#ProteinPlateExpectedIncome');
        expected.toggleClass('hidden');
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#ProteinPlatePortionMultiplier').change(function() {

        var selected_recipe = document.getElementById("ProteinPlate");
        var selected_recipe_income = selected_recipe.options[selected_recipe.selectedIndex].getAttribute('data-options-income');
        var expected = $('#ProteinPlateExpectedIncome');

        expected.empty();
        expected.append((this.value * selected_recipe_income)+' pessoas');
        if(!expected.is(':visible')){
            expected.toggleClass('hidden');
        }
    });

    $('#BasePlate').change(function() {
        $('#BasePlateIncome').children('.label-info').addClass('hidden');
        var e = document.getElementById("BasePlate");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "BasePlateTag_";
        var tag_name = tag_name + recipe_id;
        var expected = $('#BasePlateExpectedIncome');
        expected.toggleClass('hidden');
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#BasePlatePortionMultiplier').change(function() {

        var selected_recipe = document.getElementById("BasePlate");
        var selected_recipe_income = selected_recipe.options[selected_recipe.selectedIndex].getAttribute('data-options-income');
        var expected = $('#BasePlateExpectedIncome');

        expected.empty();
        expected.append((this.value * selected_recipe_income)+' pessoas');
        if(!expected.is(':visible')){
            expected.toggleClass('hidden');
        }
    });

    $('#Entrance').change(function() {
        $('#EntranceIncome').children('.label-info').addClass('hidden');
        var e = document.getElementById("Entrance");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "EntranceTag_";
        var tag_name = tag_name + recipe_id;
        var expected = $('#EntranceExpectedIncome');
        expected.toggleClass('hidden');
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#EntrancePortionMultiplier').change(function() {

        var selected_recipe = document.getElementById("Entrance");
        var selected_recipe_income = selected_recipe.options[selected_recipe.selectedIndex].getAttribute('data-options-income');
        var expected = $('#EntranceExpectedIncome');

        expected.empty();
        expected.append((this.value * selected_recipe_income)+' pessoas');
        if(!expected.is(':visible')){
            expected.toggleClass('hidden');
        }
    });

    $('#Salad').change(function() {
        $('#SaladIncome').children('.label-info').addClass('hidden');
        var e = document.getElementById("Salad");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "SaladTag_";
        var tag_name = tag_name + recipe_id;
        var expected = $('#SaladExpectedIncome');
        expected.toggleClass('hidden');
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#SaladPortionMultiplier').change(function() {

        var selected_recipe = document.getElementById("Salad");
        var selected_recipe_income = selected_recipe.options[selected_recipe.selectedIndex].getAttribute('data-options-income');
        var expected = $('#SaladExpectedIncome');

        expected.empty();
        expected.append((this.value * selected_recipe_income)+' pessoas');
        if(!expected.is(':visible')){
            expected.toggleClass('hidden');
        }
    });

    $('#Dessert').change(function() {
        $('#DessertIncome').children('.label-info').addClass('hidden');
        var e = document.getElementById("Dessert");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "DessertTag_";
        var tag_name = tag_name + recipe_id;
        var expected = $('#DessertExpectedIncome');
        expected.toggleClass('hidden');
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#DessertPortionMultiplier').change(function() {

        var selected_recipe = document.getElementById("Dessert");
        var selected_recipe_income = selected_recipe.options[selected_recipe.selectedIndex].getAttribute('data-options-income');
        var expected = $('#DessertExpectedIncome');

        expected.empty();
        expected.append((this.value * selected_recipe_income)+' pessoas');
        if(!expected.is(':visible')){
            expected.toggleClass('hidden');
        }
    });

    $('#Juice').change(function() {
        $('#JuiceIncome').children('.label-info').addClass('hidden');
        var e = document.getElementById("Juice");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "JuiceTag_";
        var tag_name = tag_name + recipe_id;
        var expected = $('#JuiceExpectedIncome');
        expected.toggleClass('hidden');
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#JuicePortionMultiplier').change(function() {

        var selected_recipe = document.getElementById("Juice");
        var selected_recipe_income = selected_recipe.options[selected_recipe.selectedIndex].getAttribute('data-options-income');
        var expected = $('#JuiceExpectedIncome');

        expected.empty();
        expected.append((this.value * selected_recipe_income)+' pessoas');
        if(!expected.is(':visible')){
            expected.toggleClass('hidden');
        }
    });
});