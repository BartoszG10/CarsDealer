$("#succes-msg").delay(2000).fadeOut("slow");

$(document).ready(function () {
    $(".role").click(function () {
        var id = $(this).data("id");
        Swal.fire({
            title: titleRoleMessage,
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: yes,
            cancelButtonText: no,
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "/roleChange/" + id,
                    data: { id: id },
                })
                    .done(function (data) {
                        Swal.fire(successRoleMessage, "", "success").then(
                            function () {
                                window.location.reload();
                            }
                        );
                    })
                    .fail(function (xhr) {
                        Swal.fire("Oops...", xhr.responseJSON.error, "error");
                    });
            }
        });
    });
    $("#success-msg").delay(2000).fadeOut("slow");
});
