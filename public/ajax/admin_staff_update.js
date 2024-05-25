$(document).ready(function () {
    console.log('test works');
    let staffId = $('[name=staff-id]').val();
    let oldLastName = $('[name=last-name]').val();
    let oldFirstName = $('[name=first-name]').val();
    let oldLogin = $('[name=login]').val();
    let oldPassword = $('[name=password]').val();
    let oldEmail = $('[name=email]').val();
    let oldPosition = $('[name=position]').val();

    console.log(oldLastName, oldFirstName, oldLogin, oldPassword, oldEmail, oldPosition);

    $('.post-submit').click(function () {
        let newLastName = $('[name=last-name]').val();
        let newFirstName = $('[name=first-name]').val();
        let newLogin = $('[name=login]').val();
        let newPassword = $('[name=password]').val();
        let newEmail = $('[name=email]').val();
        let newPosition = $('[name=position]').val();
        console.log(newLastName, newFirstName, newLogin, newPassword, newEmail,)

        let formData = new FormData();
        formData.append('staff-id', staffId);
        formData.append('last-name', newLastName);
        formData.append('first-name', newFirstName);
        formData.append('login', newLogin);
        formData.append('password',  newPassword);
        formData.append('email', newEmail);
        formData.append('position', newPosition);

        $.ajax({
            url: '../admin/admin_staff_update_check.php',
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: formData,
            success: function (data) {
                console.log(data);
                if (data.status_code == 1) {
                    console.log(data);
                    let successHtml = `
                        <p><u>Статус</u>: ${data.status}</p>
                        <p><u>Фамилия</u>: ${data.last_name}</p>
                        <p><u>Имя</u>: ${data.first_name}</p>
                        <p><u>Логин</u>: ${data.login}</p>
                    `;
                    $('#ajax-status').html(successHtml);

                    $('.old-last-name .input-part').html(oldLastName);
                    $('.new-last-name .input-part').html(data.last_name);

                    $('.old-first-name .input-part').html(oldFirstName);
                    $('.new-first-name .input-part').html(data.first_name);

                    $('.old-login .input-part').html(oldLogin);
                    $('.new-login .input-part').html(data.login);

                    $('.old-password .input-part').html(oldPassword);
                    $('.new-password .input-part').html(data.password);

                    $('.old-email .input-part').html(oldEmail);
                    $('.new-email .input-part').html(data.email);

                    $('.old-position .input-part').html(oldPosition);
                    $('.new-position .input-part').html(data.position);

                    $('form').hide();
                    $('.ajax-hidden-div').show();
                }
                else {
                    let errHtml = `
                        <p><u>Статус</u>: ${data.status}</p>
                        <p><u>Фамилия</u>: ${data.last_name}</p>
                        <p><u>Имя</u>: ${data.first_name}</p>
                        <p><u>Логин</u>: ${data.login}</p>
                    `;
                    $('#ajax-status').html(errHtml);
                }

            }
        })
    })
})