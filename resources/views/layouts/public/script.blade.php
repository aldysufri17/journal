<script src="{{asset('html/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{asset('html/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('html/js/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('template/js/sweetalert2.all.js') }}"></script>
<script>
$(".nav-link").each(function() {
    if ($(this).attr("href") === window.location.href) {
        $(this).addClass("active");
        $(this).attr("aria-current", "page");
    }
});
</script>
<script>
    $('.nav-link').on('click', function () {
        $('.nav-link').siblings('.sub-menu').collapse('hide');
    })
    $('.nav-sub-item').on('click', function () {
        var submenuId = $(this).closest('.nav-menu').data('menu');
        var targetSubmenu = $(this).data('submenu');
        if (submenuId === targetSubmenu) {
            $('.sub-menu').collapse('hide');
        }
    });
    $(document).on('click', function (e) {
        if ($(e.target).closest(".sub-menu").length === 0) {
            $('.nav-link').siblings('.sub-menu').collapse('hide');
        }
    })
</script>
<script>
    $('#form-contact').submit(function (e) {
        e.preventDefault();
        var data = new FormData($(this)[0])
        $.ajax({
            type: "POST",
            url: "{{ route('contact-us') }}",
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function () {
                $('.btn-submit').attr('disabled', true);
                $('#load-submit').show();
            },
            success: function (response) {
                console.log(response);
                $('.btn-submit').removeAttr('disabled');
                $('#load-submit').hide();
                if (response.status == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Message has Been Sent',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#form-contact').trigger('reset');
                } else {
                    $.each(response.data, function (i, v) {
                        $('#' + i).addClass('is-invalid');
                        $("#msg-" + i).html(v).show();
                    });
                }
            },
            error: function (response,XMLHttpRequest, textStatus, errorThrown) {
                console.log(response);
                $('.btn-submit').removeAttr('disabled');
                $('#load-submit').hide();
                alert("Error: " + errorThrown);
            }
        });
    });
</script>
<script>
    function showSuccess(text) {
        $('#success-message').html(text);
        $('#alert-success').fadeIn();

        setTimeout(function () {
            $('#alert-success').fadeOut();
        }, 3000)
    }

    function showError(text) {

        $('#error-message').html(text);
        $('#alert-error').fadeIn();

        setTimeout(function () {
            $('#alert-error').fadeOut();
        }, 3000)
    }
</script>
@if ($message = Session::get('success'))
<script>
    showSuccess("{{ $message }}")
</script>
@endif

@if ($message = Session::get('error'))
<script>
    showError("{{ $message }}")
</script>
@endif
@yield('scripts')