@extends('layouts.app')

@section('content')
<section>         
    <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">              
            <div class="login-main"> 

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('send.password.email') }}" id="resetpassword" class="theme-form login-form">
                    @csrf
                    <h4 class="mb-3">Reset Your Password</h4>


                    <div class="form-group">
                        <label>Enter Your E-mail ID</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Send</button>
                      </div>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
