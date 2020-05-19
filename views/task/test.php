<h1>Show action</h1>


<button class="btn btn-success" id="btn">Click me...</button>


<?php

$js = <<<JS
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
JS;

$this->registerJs($js);

?>