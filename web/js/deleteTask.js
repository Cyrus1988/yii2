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
