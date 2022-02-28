$(function () {
    // 分頁
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();

        // 為選到的 li 加上 active
        $('.pagination li').removeClass('active');
        $(this).parent('li').addClass('active');

        // 取得服務器位址
        let target = $(this).attr('href');

        $.ajax({
            type: "GET",
            url: target,
            dataType: 'html',
            success: function (response) {
                $('#list').empty().html(response);
            },
            error: function (thrownError) {
                alert('No response from server')
            }
        });
    });

    // 消息通知
    $('#notification-link').on('click', function (event) {
        event.preventDefault();
        // 取得服務器位址
        let target = $(this).attr('href');

        $.ajax({
            type: "GET",
            url: target,
            dataType: 'html',
            success: function (response) {
                $('#notification-area').empty().html(response);
            },
            error: function (thrownError) {
                alert('No response from server')
            }
        });
    });
});