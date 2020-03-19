
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    {{ Form::label('title', 'Titre de la page') }}
                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                    {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    {{ Form::label('urlPath', 'URL') }}
                    {{ Form::text('urlPath', null, ['class' => 'form-control']) }}
                    {!! $errors->first('urlPath', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="col-md" style="display: flex;justify-content:center;align-items:center;">
                <div class="custom-control custom-switch">
                    {{ Form::checkbox('is_active', '1', true, ['class' => 'custom-control-input']) }}
                    {{ Form::label('is_active', 'Activer la page ?', ['class' => 'custom-control-label']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('content', 'Contenu de la page') }}
            {{ Form::textarea('content', null, ['class' => 'form-control content', 'rows' => 28]) }}
            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>

@push('after-scripts')
<script>
$(function () {
    tinymce.init({
        selector:'#content',
        language: 'fr_FR',
        file_picker_types: 'image media',
        content_css: ['/css/bulma.css', '/css/frontend.css'],
        formats: {
            // Changes the default format for h1 to have a class of heading
            // button: { block: 'a', classes: ['button', 'is-primary']},
        },
        style_formats: [
            { title: 'Headings', items: [
                { title: 'Heading 1', format: 'h1' },
                { title: 'Heading 2', format: 'h2' },
                { title: 'Heading 3', format: 'h3' },
                { title: 'Heading 4', format: 'h4' },
                { title: 'Heading 5', format: 'h5' },
                { title: 'Heading 6', format: 'h6' }
            ]},
            { title: 'Blocks', items: [
                { title: 'Paragraph', format: 'p' },
            ]},
        ],
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{ route('admin.media.tinymce_upload') }}');

            xhr.onload = function() {
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                var json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            var formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            formData.append('_token', '{{ csrf_token() }}');

            xhr.send(formData);
        },
        plugins: [
        'advlist autolink link image lists charmap hr anchor pagebreak',
        'wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help textcolor'
        ],
        toolbar: 'undo redo | styleselect | bold italic underline | forecolor | backcolor | alignleft aligncenter alignright alignjustify |' +
      ' bullist numlist | table | link image media emoticons | help',
        color_map: [
            "3d2a23", "Black",
            "4f82c1", "Bleu",
            "53b18f", "Vert",
            "e69845", "Orange",
            "ffffff", "Blanc",
        ],
    });
});
</script>
@endpush
    
