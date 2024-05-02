@if(is_null(Auth::user()->trainee))
    <div class="alert alert-warning" role="alert">
        Please add these detail before make any changes and get your dashboard with full details.
    </div>
@endif
@if ($errors->has('success'))
    <div class="alert alert-success" role="alert">{{ $errors->first('success') }}</div>
@endif