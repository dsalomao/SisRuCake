/**
 * Created by daniel on 31/07/14.
 */
jQuery(function($) {
    $( document ).ready(function() {
        var e = document.getElementById("RecipesForMealRecipeId");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "tag_";
        var tag_name = tag_name + recipe_id;
        $('#'+tag_name).toggleClass('hidden');
    });

    $('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');

    $('#RecipesForMealRecipeId').change(function() {
        $('.label-info').addClass('hidden');
        var e = document.getElementById("RecipesForMealRecipeId");
        var recipe_id = e.options[e.selectedIndex].getAttribute("value");
        var tag_name = "tag_";
        var tag_name = tag_name + recipe_id;
        var expected = $('#ExpectedIncome');
        expected.toggleClass('hidden');
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#RecipesForMealPortionMultiplier').change(function() {

        var selected_recipe = document.getElementById("RecipesForMealRecipeId");
        var selected_recipe_income = selected_recipe.options[selected_recipe.selectedIndex].getAttribute('data-options-income');
        var expected = $('#ExpectedIncome');


        expected.empty();
        expected.append((this.value * selected_recipe_income)+' pessoas');
        if(!expected.is(':visible')){
            expected.toggleClass('hidden');
        }
    });
});