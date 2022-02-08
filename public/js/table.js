$(function(){

/* Toggle modal */

$('#add-new-button').on('click', function(){
    $('#add-new-modal').removeClass('hidden');
})

$('#cancel-button').on('click', function(){
    $('#add-new-modal').addClass('hidden');
    clearInputs();
})

function clearInputs(){
    $('#date').val('');
    $('#time').val('');
    $('#description').val('');
}

/* Add date and timepicker */

$('#date').datepicker({
    dayNamesMin: [ "V", "H", "Ke", "Sze", "Cs", "P", "Szo" ],
    dateFormat:'yy-mm-dd'
});


})
