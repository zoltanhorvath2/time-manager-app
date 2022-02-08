$(function(){

/* Handle csrf tokens in ajax requests */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});

/* Toggle modal */

$('#add-new-button').on('click', function(){
    $('#add-new-modal').removeClass('hidden');
})

$('#cancel-button').on('click', function(){
    //Clear form inputs and close modal
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

/* Add new record to the tasks table */

$('#save-button').on('click', function(){
    $('#new-task-form').on('submit', function(e){
        e.preventDefault();
    })
    const date = $('#date').val();
    const hours = $('#hours').val();
    const description = $('#description').val();
    const path = window.location.href.split('dashboard')[0];
    $.ajax({
        url: path  + "tasks/new",
        method: "POST",
        data: { date : date, hours: hours, description: description },
        dataType: "json",
        success: function(data){
            console.log(data);
        },
        error: function(error){
            console.log(error);
        }
    })

    //Clear form inputs and close modal
    $('#add-new-modal').addClass('hidden');
    clearInputs();
})


})
