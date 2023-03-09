const form = $('#rating-user');
let error = false;

form.submit(function(e) {
    e.preventDefault();

    const arr = $(this).serializeArray();
    const data = arr.reduce((acc, {
        name,
        value
    }) => ({
        ...acc,
        [name]: value
    }), {});

    const alert = $('.message');

    if (data.name !== '' && data.rating !== '') {
        alert.removeClass('alert-danger').html('')
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                name: data.name,
                message: data.rating,
                action: "review"
            },
            success: function(msg) {
                $('.rating-user').append(msg.message)
            },
            error: function(err) {
                console.log(err);
            }
        })
    } else {
        alert.addClass('alert-danger').html('Введите значение')
        error = true;
    }
});

const createList = () => {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {
            action: "init"
        },
        success: function(msg) {
            $('.rating-user').append(msg.message)
        },
        error: function(err) {
            console.log(err);
        }
    })
}

createList();