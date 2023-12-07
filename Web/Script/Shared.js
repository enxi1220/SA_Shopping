(() => {
    'use strict';
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                event.stopImmediatePropagation();
                console.log('error');
            }
            form.classList.add('was-validated');
        }, false);
    });
})();

function submitData(name, value) {
    return {
        name: name,
        value: value
    }
}

// successHandler & afterSuccess & errorHandler optional
function post(url, dataArr, successHandler, afterSuccess, errorHandler) {
    var form = new FormData();
    for (let item of dataArr) {
        form.append(item.name, item.value);
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        enctype: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        success: function (success) {
            console.log(success);
            var data = JSON.parse(success);
            if (successHandler) {
                successHandler(data.message);
            } else {
                //default success version
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    html: data.message,
                    timer: 99999,
                    showConfirmButton: false
                }).then(function () {
                    if (afterSuccess) {
                        afterSuccess();
                    }
                    if (data.url) {
                        // redirect using absolute url
                        location.href = window.location.origin + data.url;
                    }
                });
            }
        },
        error: function (error) {
            if (errorHandler) {
                //user-defined error version
                errorHandler(error);
            } else {
                //default error version

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: error.responseText,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showCloseButton: false
                });

            }
        }
    });
}

function get(url, data, successHandler, errorHandler, afterError, afterSuccess) {
    $.ajax({
        type: "GET",
        url: url,
        data: data,
        success: function (success) {
            if (successHandler) {
                //user-defined success version
                successHandler(success);
            } else {
                //default success version
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    html: success,
                    timer: 1900,
                    showConfirmButton: false
                }).then(function () {
                    if (afterSuccess) {
                        afterSuccess();
                    }
                });
            }
        },
        error: function (error) {
            if (errorHandler) {
                //user-defined error version
                errorHandler(error);
            } else {
                //default error version
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.responseText,
                    // timer: 99999
                }).then(function () {
                    if (afterError) {
                        afterError();
                    }
                    history.back();
                });
            }
        }
    });
}

function checkDate(id, min, max) {
    // Attach a change event listener to the datetime input field
    $('#datetime').on('change', function () {
        // Get the value of the datetime input field
        var inputDate = new Date($(this).val());

        // Get the current date and time
        var currentDate = new Date();

        // Disable the submit button if the input date is in the past
        if (inputDate < currentDate) {
            $('button[type="submit"]').prop('disabled', true);
        } else {
            $('button[type="submit"]').prop('disabled', false);
        }
    });
}

$('.toggle-visibility').click(function () {
    $(this).toggleClass("fa-eye-slash fa-eye");

    if ($(this).siblings("input").attr("type") === "password") {
        $(this).siblings("input").attr("type", "text");
    } else {
        $(this).siblings("input").attr("type", "password");
    }
});

function copyToClipboard(textToCopy) {
    var dummy = $('<input>').val(textToCopy).appendTo('body').select();
    document.execCommand('copy');
    $(dummy).remove();
}

$('#txt-confirm-password').on('input', function (event) {
    event.preventDefault();

    var password = $('#txt-password').val();
    var confirmPassword = $(this).val();

    var feedbackDiv = $(this).siblings('.invalid-feedback');

    if (!confirmPassword) {
        feedbackDiv.text('Required');
        $(this).addClass('is-invalid');
    } else if (password !== confirmPassword) {
        feedbackDiv.text('Unmatch password');
        $(this).addClass('is-invalid');
    }
    else {
        feedbackDiv.text('');
        $(this).removeClass('is-invalid');
    }
});

const baseUrl = "/SA_Shopping/Controller/";

$('#txt-password').on('input', function (event) {
    event.preventDefault();
    var password = $(this).val();
    const lengthPattern = /^.{8,20}$/;
    const lowercasePattern = /^(?=.*[a-z]).*$/;
    const uppercasePattern = /^(?=.*[A-Z]).*$/;
    const digitPattern = /^(?=.*\d).*$/;
    const specialCharacterPattern = /^(?=.*[@$!%?&]).*$/;
    const regexPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$/;
    
    var isValid = lengthPattern.test(password);
    if (isValid) {
        $('#length').find('i').addClass('fas').removeClass('far');
    }else{
        $('#length').find('i').addClass('far').removeClass('fas');
    }
    var isValid = lowercasePattern.test(password);
    if (isValid) {
        $('#lowercase').find('i').addClass('fas').removeClass('far');
    }else{
        $('#lowercase').find('i').addClass('far').removeClass('fas');
    }
    var isValid = uppercasePattern.test(password);
    if (isValid) {
        $('#uppercase').find('i').addClass('fas').removeClass('far');
    }else{
        $('#uppercase').find('i').addClass('far').removeClass('fas');
    }
    var isValid = digitPattern.test(password);
    if (isValid) {
        $('#digit').find('i').addClass('fas').removeClass('far');
    }else{
        $('#digit').find('i').addClass('far').removeClass('fas');
    }
    var isValid = specialCharacterPattern.test(password);
    if (isValid) {
        $('#special-char').find('i').addClass('fas').removeClass('far');
    }else{
        $('#special-char').find('i').addClass('far').removeClass('fas');
    }

    var isValid = regexPattern.test(password);
    isValid ? $('#password-hint').addClass('d-none') : $('#password-hint').removeClass('d-none');

    var confirmPassword = $('#txt-confirm-password').val();

    var feedbackDiv = $('#txt-confirm-password').siblings('.invalid-feedback');

    if (!confirmPassword) {
        feedbackDiv.text('Required');
        $('#txt-confirm-password').addClass('is-invalid');
    } else if (password !== confirmPassword) {
        feedbackDiv.text('Unmatch password');
        $('#txt-confirm-password').addClass('is-invalid');
    }
    else {
        feedbackDiv.text('');
        $('#txt-confirm-password').removeClass('is-invalid');
    }
});