@extends('layouts.auth_layout')

@section('content')
@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class='row'> 
                    <div class="alert alert-error alert-dismissible " role="alert">
                        
                        {{$error}} 
                    </div>
                </div>  
        @endforeach
@endif
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">

        <form method="POST" action="{{ url('password/update') }}">
            @csrf
            <h1>Reset Password</h1>

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    
            </div>

            <div>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autocomplete="new-password">

                    
            </div>

            <div>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required autocomplete="new-password">
            </div>

            <div>
                    <button type="submit" class="btn btn-default" onClick="ShowLoading()">
                        {{ __('Reset Password') }}
                    </button>
                
            </div>
        </form>
        </section>
   </div>
</div>
@endsection
