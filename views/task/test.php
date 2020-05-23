<h1>Show action</h1>


<button class="btn btn-success" id="btn">Click me...</button>


<?php


$this->registerJs("
    $(document).on('ready pjax:success', function() {
        $('.pjax-delete-link').on('click', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('delete-url');
            var pjaxContainer = $(this).attr('pjax-container');
            var result = confirm('Delete this item, are you sure?');                                
            if(result) {
                $.ajax({
                    url: deleteUrl,
                    type: 'post',
                    error: function(xhr, status, error) {
                        alert('There was an error with your request.' + xhr.responseText);
                    }
                }).done(function(data) {
                    $.pjax.reload('#' + $.trim(pjaxContainer), {timeout: 3000});
                });
            }
        });

    });
");

//$js = <<<JS
//// Отправка заявки
//$('#btn').on('click', function() {
//    $.ajax({
//        url: '".Url::to(['task/deletetask', 'id' => $model->id])."',
//        type: 'POST',
//        success  : function(response) {
//                 $('.link-del').html(response);
//                 $('.postImg').remove();
//             }
//        error: function() {
//            alert('Error');
//        }
//    })
//});
//JS;

//$this->registerJs($js);

?>