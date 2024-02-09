@if (Session::has('flash_message'))
    <div class="alert alert-{{ Session::get('flash_message.alertType') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {!! Session::get('flash_message.message') !!}
    </div>
@endif