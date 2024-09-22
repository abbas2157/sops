@if((Auth::user()->type != 'admin' && Auth::user()->type != 'trainee') && is_null(Auth::user()->email_verified_at))
    <div class="alert alert-warning" role="alert">
        First, you must complete your registration by verifing your email address, and then you’ll officially be a part of the SOPS community
    </div>
@endif
@if((Auth::user()->type != 'admin' && Auth::user()->type != 'trainee') && is_null(Auth::user()->trainer))
    <div class="alert alert-warning" role="alert">
        Please add these detail before make any changes and get your dashboard with full details.
    </div>
@endif
@if((Auth::user()->type != 'admin' && Auth::user()->type != 'trainer') && is_null(Auth::user()->email_verified_at))
    <div class="alert alert-warning" role="alert">
        First, you must complete your registration by verifing your email address, and then you’ll officially be a part of the SOPS community
    </div>
@endif
@if((Auth::user()->type != 'admin' && Auth::user()->type != 'trainer') && is_null(Auth::user()->trainee))
    <div class="alert alert-warning" role="alert">
        Please add these detail before make any changes and get your dashboard with full details.
    </div>
@endif
@if(!is_null(Auth::user()->pending_payment))
    <div class="alert alert-warning" role="alert">
        Please Pay your Purchased course fee then you will get access modules. Like intro, Fundamental and Full Skill.
    </div>
@endif
<!-- @if ($errors->has('success'))
    <div class="container">
        <div class="alert alert-success" role="alert">{{ $errors->first('success') }}</div>
    </div>
@endif -->