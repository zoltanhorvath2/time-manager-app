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
    $('#error-messages').text('');
}

/* Add date and timepicker */

$('#date').datepicker({
    dayNamesMin: [ "V", "H", "Ke", "Sze", "Cs", "P", "Szo" ],
    dateFormat:'yy-mm-dd'
});

/* Add new record to the tasks table */

$('#save-button').on('click', function(){
    $('#error-messages').text('');
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
            if(data.code === 1){
                toastr.success(data.success_message)
                $('#add-new-modal').addClass('hidden');
                clearInputs();
            }else{
                $('#error-messages').text('');
                for(let i = 0; i < data.error_messages.length; i++){
                    $('#error-messages').append(`
                        <li class="text-red-500">${data.error_messages[i]}</li>
                    `);
                }
            }

        },
        error: function(error){
            console.log(error);
        }
    })
})

function renderTable(data){

}


})
