{{-- imported into dashboard JS --}}
<script>
    //PUBLIC ALERTS
    //=========================================================
    //for showing success message when a process done successfully.
    window.addEventListener('swal:Success', function() {
        Swal.fire({
            title: 'افزودن اطلاعات',
            text: "عملیات مورد نظر با موفقیت انجام شد!",
            icon: 'success',
            confirmButtonText: 'تایید',
        });
    });

    //for showing success message when a process done successfully.
    window.addEventListener('swal:UpdateSuccess', function() {
        Swal.fire({
            title: 'ویرایش اطلاعات',
            text: "اطلاعات مورد نظر با موفقیت بروز رسانی شد!",
            icon: 'success',
            confirmButtonText: 'تایید',
        });
    });


    //for showing success message when item deleted successfully.
    window.addEventListener('swal:DeleteSuccess', function(e) {
        Swal.fire({
            title: 'حذف اطلاعات',
            text: "اطلاعات مورد نظر با موفقیت حذف شد!",
            icon: 'success',
            confirmButtonText: 'تایید',
        });
    });



    //for showing warning message when items are incomplete.
    window.addEventListener('swal:IncompleteData', function(e) {
        Swal.fire({
            title: 'تکمیل اطلاعات',
            text: "تمامی اطلاعات مورد را تکمیل نمایید!",
            icon: 'warning',
            confirmButtonText: 'تایید',
        });
    });


    //for get confirmaion on delete an item from DB
    window.addEventListener('swal:AddItemError', function(e) {
        Swal.fire({
            title: e.detail.title,
            text: e.detail.text,
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'تایید!',
        });
    });



    //for get confirmaion on delete an item from DB
    window.addEventListener('swal:itemDelConfirm', function(e) {
        Swal.fire({
            title: 'آیا مطمئن هستید؟',
            text: "در صورت حذف، غیرقابل بازیابی خواهد بود!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله!',
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(e.detail);
                window.livewire.emit(e.detail.callback, [e.detail.ElementId, e.detail.ItemId]);
            }
        });
    });




    //for editing api
    window.addEventListener('swal:EditForm', function(e) {
        (async () => {

            let api_name = e.detail.Data['api_name'];
            let api_key = e.detail.Data['api_key'];
            let api_secret = e.detail.Data['api_secret'];
            let api_passphrase = e.detail.Data['api_passphrase'];

            const {
                value: formValues
            } = await Swal.fire({
                title: 'ویرایش اطلاعات',
                html: '<input id="swal-input1" value="' + api_name + '" class="swal2-input">' +
                    '<input id="swal-input2" value="' + api_key + '" class="swal2-input">' +
                    '<input id="swal-input3" value="' + api_secret + '" class="swal2-input">' +
                    '<input id="swal-input4" value="' + api_passphrase + '" class="swal2-input">',
                focusConfirm: false,
                preConfirm: () => {
                    let updatedApi = {
                        'api_name': document.getElementById('swal-input1').value, //api_name
                        'api_key': document.getElementById('swal-input2').value, //api_key
                        'api_secret': document.getElementById('swal-input3').value, //api_secret
                        'api_passphrase': document.getElementById('swal-input4').value //api_passphrase
                    };
                    //redirect to api-item component
                    window.livewire.emit(e.detail.function, e.detail.id, updatedApi);

                }
            })
        })()
    });
</script>
