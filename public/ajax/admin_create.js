$(document).ready( function () {
    console.log('test works');

    $('input[type=button]').click(function () {
        let postTitle = $('[name=post-title]').val();
        let fileInput = $('[name=pic-path]')[0];
        let picPath = fileInput.files[0];
        let isImportant = $('[name=important]').val();
        let postText = $('[name=post-text]').val();
        let authorId = $('[name=author_id]').val();

        console.log(postTitle, picPath, isImportant, postText);
        let formData = new FormData();
        formData.append('post-title', postTitle);
        formData.append('post-text', postText);
        formData.append('important', isImportant);
        formData.append('author_id', authorId);
        formData.append('pic-path', picPath);

        // {
        //     'post-title': postTitle,
        //     'post-text': postText,
        //     'important': isImportant,
        //     'author_id': authorId,
        //     'pic-path': picPath
        // },

        $.ajax({
            url: '../admin/admin_create_check.php',
            method: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: formData,
            success: function (data) {
                console.log(data);
                if (data.status_code) {
                    let successHtml = `
                        <p><u>Статус</u>: ${data.status}</p>
                        <p><u>Название статьи</u>: ${data.post_title}</p>
                        <p><u>Дата добавления</u>: ${data.add_datetime}</p>
                        <p><u>Длина статьи</u>: ${data.post_len} символов</p>
                    `;
                    $('#ajax-status').html(successHtml);
                    // $('#ajax-status').css({'border': '1px solid green'});
                }
                else {
                    let errHtml = `
                        <p><u>Статус</u>: ${data.status}</p>
                        <p><u>Название статьи</u>: ${data.post_title}</p>
                        <p><u>Дата попытки операции</u>: ${data.add_datetime}</p>
                    `;
                    $('#ajax-status').html(errHtml);
                    // $('#ajax-status').css({'border': '1px solid red'});
                }
            }
        })
    })
});
