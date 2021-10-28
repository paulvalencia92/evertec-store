jQuery(document).ready(function () {

    $('.dispatch-order').jConfirm().on('confirm', function (e) {
        const btn = $(this);
        const route = btn.data("route");
        jQuery.ajax({
            method: "POST",
            url: route,
            success: function (data) {

                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Se ha despachado el producto correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })

                setTimeout(function () {
                    window.location.reload();
                },3000)


            },
            error: function (error) {
                alert(error)
                window.location.reload();
            }
        })
    });


    $('.delete-record').jConfirm().on('confirm', function (e) {

        const btn = $(this);
        const route = btn.data("route");
        jQuery.ajax({
            method: "DELETE",
            url: route,
            success: function (data) {
                window.location.reload();
            },
            error: function (error) {
                window.location.reload();
            }
        })
    });
});
