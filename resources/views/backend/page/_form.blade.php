
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
            {{ Form::textarea('content', null, ['class' => 'form-control']) }}
            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>
<p>
    <input class="btn btn-success" type="submit" value="Créer la page" />
</p>