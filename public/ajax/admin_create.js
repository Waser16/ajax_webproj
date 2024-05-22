$(document).ready( function () {
    console.log('test works');

    $('[name=post-title]').change(function () {
        console.log($(this).val());
    })

    $('input[type=button]').click(function () {
        let postTitle = $('[name=post-title]').val();
        // let picPath = $('[name=pic-path]').prop('files')[0];
        var fileInput = $('[name=pic-path]')[0];
        var picPath = fileInput.files[0];
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
                $('#ajax-status').html(`${data.short_path} <br> 
                    ${data.path} <br>
                    ${data.pic}`);
            }
        })
    })
});
