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
        {{ session('message') }}
    </div>
@endif
<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <h1>Password Reset</h1>
            <div>
            <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email" required="" />
            <!-- @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   -->
            </div>
            <div class="center">
            <input type="submit" class="btn btn-default submit" onClick="ShowLoading()" value="send link">
            </div>
        </form>
               
    </section>
   </div>
</div>
@endsection
