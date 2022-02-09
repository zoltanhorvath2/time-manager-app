$(function(){

const path = window.location.href.split('dashboard')[0];

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
    dateFormat:'yy-mm-dd',
    beforeShowDay: $.datepicker.noWeekends
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
                renderTable();
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

function renderTable(){
        $.ajax({
            url: path  + "tasks/list",
            method: "GET",
            dataType: "json",
            success: function(data){
                console.log(data)
                clearTable()
                drawTable(data);
            },
            error: function(error){
             console.log(error);
        }
    })
};

/* Render table onload */
renderTable();

function drawTable(data){
    for(let key of Object.keys(data.weeks)){
        $('tbody.table-hover').append(`
        <tr>
            <td class="text-left days-${key}" id="Monday"></td>
            <td class="text-left days-${key}" id="Tuesday"></td>
            <td class="text-left days-${key}" id="Wednesday"></td>
            <td class="text-left days-${key}" id="Thursday"></td>
            <td class="text-left days-${key}" id="Friday"></td>
            <td class="text-left"></td>
            <td class="text-left">${key}</td>
        </tr>
        `)
        $(`.days-${key}`).each(function(){
            data.weeks[key].forEach((item) => {
                if(item.day = $(`.days-${key}`).attr('id')){
                    $(`.days-${key}`).append(item.hours + " - " + item.description + "<br>")
                }
            })
        })
    }

}

function clearTable(){
    $('tbody.table-hover').text('');
}


})
