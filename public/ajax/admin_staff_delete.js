$(document).ready(function () {
    console.log('JS is connected');

    $('.link-delete').click(function () {
        console.log('link-delete listener');
        let parentDiv = $(this).closest('.staff');
        let staffId = $(this).data('id');
        let staffName = parentDiv.find('.staff-name').text();
        let staffPosition = parentDiv.find('.staff-position').text();

        let formData = new FormData();
        formData.append('staff_id', staffId);
        formData.append('staff_name', staffName);
        formData.append('staff_position', staffPosition);

        console.log(staffId, staffName, staffPosition);

        $.ajax({
            url: '../admin/admin_staff_delete.php',
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: formData,
            success: function (data) {
                console.log(data);
                if (data.status_code == 1) {
                    let successHtml = `
                    <p><u>Статус</u>: ${data.status}</p>
                    <p><u>Имя сотрудника</u>: ${data.staff_name}</p>
                    <p><u>Должность сотрудника</u>: ${data.staff_position}</p>
                    <p><u>Дата операции</u>: ${data.delete_time}</p>
                    `;
                    $('#ajax-status').html(successHtml);
                    parentDiv.remove()
                } else {
                    console.log(data.status);
                }
            }
        })
    })
})