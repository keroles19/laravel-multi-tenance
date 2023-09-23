<script>
    // Alert With Functional Confirm Button
    function swAlert(link, confirm_button_text = '{{ __('common.swl.are_you_sure') }}', data = null, method = null) {
        Swal.fire({
            title: confirm_button_text,
            // text: text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: '{{ __('common.confirm') }}',
            cancelButtonText: '{{ __('common.cancel') }}',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.value) {
                location.href = link;
            }
        });
    }


    // form submit
    $('form.submit_form_loader_btn').submit(function (e) {
        let form = $(this);
        let btn = form.find('button[type="submit"]');
        btn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> {{ __('common.loading') }}');
        btn.attr('disabled', true);
    });


    // Stop Loader
    $(window).on('load', function () {
        $('.overlay__loader').hide();
        $(".form-prevent-multiple-submits").on("submit", function (event) {
            $(".button-prevent-multiple-submits").attr("disabled", true);
            $(".spinner").css("display", "inherit");
        });
    })
</script>
