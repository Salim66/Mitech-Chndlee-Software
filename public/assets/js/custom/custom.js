(function($){
    $(document).ready(function () {

        // CKEDITOR.replace('table_id');

        // DataTable
        $("#table_id").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        // Delete data by sweet alert
        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            let link = $(this).attr('href');

            Swal.fire({
            title: 'Are you sure?',
            text: "Delete this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })

        });


    });
})(jQuery);
