$(function () {
    $(".delete").click(function () {
        Swal.fire({
            title: titleDeleteMessage,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: yes,
            cancelButtonText: no,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteURL + $(this).data("id"),
                })
                    .done(function (data) {
                        Swal.fire(successDeleteMessage, "", "success").then(
                            function () {
                                window.location.reload();
                            }
                        );
                    })
                    .fail(function (data) {
                        Swal.fire(
                            "Oops...",
                            data.responseJSON.message,
                            "error"
                        );
                    });
            }
        });
    });
    $("#succes-msg").delay(2000).fadeOut("slow");
});
