<script src="{{ asset('admin-theme/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('admin-theme/js/demo-theme.min.js') }}?1684106062"></script>
<script type="text/javascript" src="{{asset('admin-theme/libs/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('template/js/font-awesome.min.js') }}"></script>
<script src="{{ asset('admin-theme/js/select2.min.js') }}"></script>
<script src="{{ asset('template/js/sweetalert2.all.js') }}"></script>

<script src="{{ asset('admin-theme/js/tabler.min.js') }}?1684106062" defer></script>
<script src="{{ asset('admin-theme/js/demo.min.js') }}?1684106062" defer></script>
<script>
    $(".select-tag").select2({
        placeholder: "Select or create items",
        tags: true,
        width: "100%",
    });

    tinymce.init({
        selector: "textarea.editor-tinymce",
        theme: "modern",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste responsivefilemanager textcolor code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
        toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code | fontsizeselect",
        image_advtab: true,
        fontsize_formats: '8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 18pt',
        content_style: "div, p { font-size: 14px; }",
        height: "400",
        relative_urls: false,
        remove_script_host: false,
        filemanager_crossdomain: true,
        file_browser_callback_types: 'image file media',
        file_browser_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },
        external_filemanager_path: "{{asset('filemanager')}}/",
        filemanager_title: "Filemanager",
        external_plugins: {
            "filemanager": "{{asset('filemanager/plugin.min.js')}}"
        },
    });

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