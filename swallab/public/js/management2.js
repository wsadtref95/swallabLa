$(document).ready(function() {
    $('#editForm').submit(function(event) {
        event.preventDefault(); // 防止表单默认提交

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '/backstage/management_menu1/store',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Menu item added successfully!');
                location.reload(); // 重新加载页面
            },
            error: function(response) {
                alert('An error occurred. Please try again.');
            }
        });
    });
});