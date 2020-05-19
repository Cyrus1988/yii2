// Отправка заявки
$('#btn').on('click', function() {
    $.ajax({
        url: 'index',
        type: 'POST',
        success: function(res) {
            console.log(res);
        },
        error: function() {
            alert('Error');
        }
    })
});