$(document).ready(function () {
    console.log('test works');
    $('input[type=button]').click(function () {
        console.log('button listener');

        let parentDiv = $(this).closest('.create');
        let lastName = $('input[name="last-name"]').val();
        let firstName = $('input[name="first-name"]').val();
        let login = $('input[name="login"]').val();
        let password = $('input[name="password"]').val();
        let email = $('input[name="email"]').val();
        let position = $('input[name="position"]').val();
        let formData = new FormData();
        formData.append('last_name', lastName);
        formData.append('first_name', firstName);
        formData.append('login', login);
        formData.append('password', password);
        formData.append('email', email);
        formData.append('position', position);
        console.log(formData);

        if (!lastName || !firstName || !login || !password || !email || !position) {
            let errorMessage = 'Вы не до конца заполнили форму!';
            $('#ajax-status').html(`<p><b>${errorMessage}</b></p>`);
                return
        }

        $.ajax({
            url: '../admin/admin_staff_add_check.php',
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
                        <p><u>Фамилия</u>: ${data.last_name}</p>
                        <p><u>Имя</u>: ${data.first_name}</p>
                        <p><u>Логин</u>: ${data.login}</p>
                        <p><u>Email</u>: ${data.email}</p>
                        <p><u>Должность</u>: ${data.position}</p>
                        <p><u>Дата выполнения операции:</u> ${data.add_time}</p>
                    `;
                    $('#ajax-status').html(successHtml);
                    $('.create form').fadeOut();
                    $('.hidden-div-ajax').show();
                }
                else {
                    let errHtml = `
                        <p><u>Статус</u>: ${data.status}</p>
                        <p><u>Фамилия</u>: ${data.last_name}</p>
                        <p><u>Имя</u>: ${data.first_name}</p>
                        <p><u>Логин</u>: ${data.login}</p>
                        <p><u>Email</u>: ${data.email}</p>
                        <p><u>Должность</u>: ${data.position}</p>
                        <p><u>Дата попытки выполнения операции:</u> ${data.add_time}</p>
                    `;
                    $('#ajax-status').html(errHtml);
                }
            }
        })
    })
})