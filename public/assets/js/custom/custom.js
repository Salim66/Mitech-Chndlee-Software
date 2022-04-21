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

        // Select2
        $('.select2').select2({
            closeOnSelect: false
        });


        account_load_data();
        function account_load_data( from_date = '', to_date = '', passenger_id = '' ) {
            // alert(passenger_id +" "+ from_date +" "+ to_date);
            $('#account').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                // rowReorder: {
                //     selector: 'td:nth-child(2)'
                // },
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url: '',
                    data: {from_date:from_date, to_date:to_date, passenger_id:passenger_id}
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'entry.name',
                        name: 'entry.name'
                    },
                    {
                        data: 'entry.passport_no',
                        name: 'entry.passport_no'
                    },
                    {
                        data: 'entry.mobile_no',
                        name: 'entry.mobile_no'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data, type, full, meta) {
                            let date = new Date(data);
                            return date.toLocaleDateString();
                        }
                    },
                    {
                        data: 'purpose',
                        name: 'purpose'
                    },
                    {
                        data: 'payment_receive_status',
                        name: 'payment_receive_status'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                drawCallback:function(data){

                    let total = 0;
                    data.aoData.map(data => {
                        total = Number(total) + Number(data._aData.amount);
                    });
                    $('.total_account').html(total);
                }
            });

        }


        // Data filter
        $('#filter').click(function(e){
            e.preventDefault();
            let from_date = moment($('#from_data').val()).format('YYYY-MM-DD');
            let to_date =  moment($('#to_data').val()).format('YYYY-MM-DD');
            let passenger_id = $('#passenger_id').val();

            // alert(passenger_id);
            // alert(from_date + ' ' + to_date);


            if( passenger_id != null && passenger_id != ''){

                $('#account').DataTable().destroy();
                account_load_data(from_date, to_date, passenger_id);

                return false;
            }

            if(from_date != '' &&  to_date != '')
            {

                $('#account').DataTable().destroy();
                account_load_data(from_date, to_date);

            }


        });

        // Data refresh
        $('#refresh').click(function(){
            $('#from_data').val('');
            $('#to_data').val('');
            $('#account').DataTable().destroy();
            account_load_data();
        });


        //Account Data Edit
        $(document).on('click', '.edit_account_data', function(e){
            e.preventDefault();
            let id = $(this).attr('edit_id');
            // alert(id);
            $.ajax({
                method:"GET",
                url: '/accounts/edit/' + id,
                success: function(data){
                    // console.log(data);

                    $('.account_name').html(data.passen);
                    $('.account_amount').val(data.amount);
                    $('.account_purpose').val(data.purpose);
                    $('.account_payment_receive_status').val(data.payment_receive_status);
                    $('.account_id').val(data.id);


                    $('.account_edit').modal('show');

                }
            });

        });


        // Account Data Update
        $(document).on('submit', '#edit_account_form', function(e){
            e.preventDefault();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                method:"POST",
                url: '/accounts/update',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data){
                    // console.log(data);
                    $('#edit_account_form')[0].reset();
                    $('.account_edit').modal('hide');
                    $('#account').DataTable().ajax.reload();
                }
            });

        });

        // delete Account form
        $(document).on('submit', '.account_delete_form', function (e) {
            e.preventDefault();
            let id = $(this).attr('delete_id');
            // alert(id);

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
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                                "content"
                            ),
                        },
                        url: '/accounts/delete',
                        method: 'POST',
                        data: { id: id },
                        success: function (data) {

                            $('#account').DataTable().ajax.reload();

                        }
                    });

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
