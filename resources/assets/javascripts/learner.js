function AddUser(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#users-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while creating a new user.", function () {
            });
        }
    });
}

function DeleteUser(url, id, token) {
    bootbox.confirm("Are you sure?", function (result) {
        if (result == true) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {_token: token, id: id},
                dataType: 'html',
                success: function (code_html, statut) {
                    $(code_html).replaceAll("#users-table").hide().fadeIn("slow");
                },
                error: function () {
                    bootbox.alert("Oups. There was a problem while deleting user.", function () {
                    });
                }
            });
        }
    });
}


function EditUser(url, id, username, token) {
    var message = '<div class="row">' +
        '<div class="col-md-12">' +
        '<form class="form-horizontal">';
    message += '<div class="form-group">' +
    '<label class="col-md-4 control-label" for="awesomeness">Username</label>' +
    '<div class="col-md-4">' +
    '<input id="username" name="username" type="text" value="' + username + '" class="form-control input-md">' +
    '</div></div>' +
    '<div class="form-group">' +
    '<label class="col-md-4 control-label" for="awesomeness">Password</label>' +
    '<div class="col-md-4">' +
    '<input id="password" name="password" type="password" class="form-control input-md">' +
    '</div></div>';
    message += '</form></div></div>';
    bootbox.dialog({
            onEscape: function () {
            },
            title: "Editing a user",
            message: message,
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        var privileges = $("input[name='awesomeness']:checked").val()
                        var username = $("#username").val()
                        var password = $("#password").val()
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _token: token,
                                id: id,
                                privileges: privileges,
                                username: username,
                                password: password
                            },
                            dataType: 'html',
                            success: function (code_html, statut) {
                                $(code_html).replaceAll("#users-table").hide().fadeIn("slow");
                            },
                            error: function () {
                                bootbox.alert("Oups. There was a problem while editing user.", function () {
                                });
                            }
                        });
                    }
                },
                failure: {
                    label: "Cancel",
                    className: "btn-primary"
                }
            }
        }
    );
}

function handleForms() {
    $('#form-selector').change(function(event) {
        SwitchForm($('#form-selector').val());
    });
}

$(document).ready(handleForms);

function SwitchForm(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#diapo-form").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while getting the form.", function () {
            });
        }
    })

}
