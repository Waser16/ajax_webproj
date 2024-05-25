$(document).ready(function() {
    let picInput = $('[name=pic-path]');
    let oldPicPath = picInput.data('path');
    let oldPostTitle = $('[name=post-title]').text();
    let oldImportance = $('input[name=important]:checked').val();
    let oldPostText = $('[name=post-text]').text();

    console.log(picInput, oldPicPath, oldPostTitle, oldImportance, oldPostText);

    $('.post-submit').click(function () {
        console.log('button listener');
        let newPicPath = $('[name=pic-path]')[0].files[0];
        let newPostTitle = $('[name=post-title]').val();
        let newImportance = $('input[name=important]:checked').val();
        let newPostText = $('[name=post-text]').val();
        let splitText = newPostText.split('\n');

        for(let i = 0; i < splitText.length; i++) {
            splitText[i] = `<p>${splitText[i]}</p>`;
        }
        newPostText = splitText.join('');

        console.log(newPicPath, newPostTitle, newImportance, newPostText);

        if (!newPicPath || !newPostTitle || !newImportance || !newPostText) {
            let errorMessage = 'Вы не до конца заполнили форму!';
            $('#ajax-status').html(`<p>${errorMessage}</p>`);
            return
        }

        let formData = new FormData();
        formData.append('post-title', newPostTitle);
        formData.append('post-text', newPostText);
        formData.append('important', newImportance);
        formData.append('pic-path', newPicPath)

        // $.ajax({
        //     url: '../admin/admin_update_check.php',
        //     method: 'POST',
        //     processData: false,
        //     contentType: false,
        //     dataType: 'json',
        //     data: formData,
        //     success: function (data) {
        //         if (data.status_code == 1) {
        //             let successHtml = `
        //                 <p><u>Статус</u>: ${data.status}</p>
        //                 <p><u>Название статьи</u>: ${data.post_title}</p>
        //                 <p><u>Дата добавления</u>: ${data.upd_time}</p>
        //                 <p>${data.pic_name}</p>
        //                 <p>${data.path}</p>
        //                 <p>${data.short_path}</p>
        //             `;
        //             $('#ajax-status').html(successHtml);
        //             // $('.hidden-div-ajax').show();
        //             // $('.create form').fadeOut();
        //         }
        //         else {
        //             let errHtml = `
        //                 <p><u>Статус</u>: ${data.status}</p>
        //                 <p><u>Название статьи</u>: ${data.post_title}</p>
        //                 <p><u>Дата попытки операции</u>: ${data.upd_time}</p>
        //             `;
        //             $('#ajax-status').html(errHtml);
        //         }
        //     }
        // });
    })
})