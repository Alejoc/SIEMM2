// Add Record
function addRecord() {
    // get values
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var clave = $("#clave").val();
    var email = $("#email").val();
    var perfil = $("#perfil").val();
    var tdoc = $("#tdoc").val();
    var doc = $("#doc").val();
    var dir_user = $("#dir_user").val();
    var tel_user = $("#tel_user").val();
    var rm_profesional = $("#rm_profesional").val();
    var especialidad = $("#especialidad").val();
    var estado = $("#estado").val();
    // Add record
    $.post("ajax/addRecord.php", {
        first_name: first_name,
        last_name: last_name,
        email: email
        perfil: perfil
        tdoc: tdoc
        doc: doc
        dir_user: dir_user
        tel_user: tel_user
        rm_profesional: rm_profesional
        especialidad: especialidad
        estado: estado
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#first_name").val("");
        $("#last_name").val("");
        $("#clave").val();
        $("#email").val("");
        $("#perfil").val();
        $("#tdoc").val();
        $("#doc").val();
        $("#dir_user").val();
        $("#tel_user").val();
        $("#rm_profesional").val();
        $("#especialidad").val();
        $("#estado").val();
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var email = $("#update_email").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            first_name: first_name,
            last_name: last_name,
            email: email
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
