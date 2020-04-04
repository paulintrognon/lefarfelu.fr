 @if($errors->any())
    <div class="message is-danger alert alert-danger" role="alert">
        <div class="message-header">
            <p>Erreur</p>
            <button type="button" class="delete close" data-dismiss="alert" aria-label="delete"></button>
        </div>

        <div class="message-body">
            @foreach($errors->all() as $error)
                {!! $error !!}<br/>
            @endforeach
        </div>  
    </div>
@elseif(session()->get('flash_success'))
    <div class="message is-success alert alert-success" role="alert">
        <div class="message-header">
            <p>Succès</p>
            <button type="button" class="delete close" data-dismiss="alert" aria-label="delete"></button>
        </div>

        <div class="message-body">
            @if(is_array(json_decode(session()->get('flash_success'), true)))
                {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_success') !!}
            @endif
        </div>
    </div>
@elseif(session()->get('flash_warning'))
    <div class="message is-warning alert alert-warning" role="alert">
        <div class="message-header">
            <p>Attention</p>
            <button type="button" class="delete close" data-dismiss="alert" aria-label="delete"></button>
        </div>

        <div class="message-body">
            @if(is_array(json_decode(session()->get('flash_warning'), true)))
                {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_warning') !!}
            @endif
        </div>
    </div>
@elseif(session()->get('flash_info'))
    <div class="message is-info alert alert-info" role="alert">
        <div class="message-header">
            <p>Information</p>
            <button type="button" class="delete close" data-dismiss="alert" aria-label="delete"></button>
        </div>

        <div class="message-body">
            @if(is_array(json_decode(session()->get('flash_info'), true)))
                {!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_info') !!}
            @endif
        </div>
    </div>
@elseif(session()->get('flash_danger'))
    <div class="message is-danger alert alert-danger" role="alert">
        <div class="message-header">
            <p>Erreur</p>
            <button type="button" class="delete close" data-dismiss="alert" aria-label="delete"></button>
        </div>

        <div class="message-body">
            @if(is_array(json_decode(session()->get('flash_danger'), true)))
                {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_danger') !!}
            @endif
        </div>
    </div>
@elseif(session()->get('flash_message'))
    <div class="message is-info alert alert-info" role="alert">
        <div class="message-header">
            <p>Info</p>
            <button type="button" class="delete close" data-dismiss="alert" aria-label="delete"></button>
        </div>

        <div class="message-body">
            @if(is_array(json_decode(session()->get('flash_message'), true)))
                {!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_message') !!}
            @endif
        </div>
    </div>
@endif
