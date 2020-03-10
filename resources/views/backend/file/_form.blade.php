
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    {{ Form::label('file', 'Fichier') }}
                    {{ Form::file('file', null, ['class' => 'form-control']) }}
                    {!! $errors->first('file', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
