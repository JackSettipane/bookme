@extends('frontend.app')



@section('content')


<section class="section  pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="login-page bg-white shadow rounded p-4">
                    <div class="text-center">
                        <h4 class="mb-4">Login</h4>  
                    </div> 
                    <form method="POST" class="login-form" action="{{ route('login') }}">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    <label>Your Email <span class="text-danger">*</span></label>
                                    <input type="text" value="{{old('email')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"" placeholder="Password" >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-lg-12">
                                <p class="float-right forgot-pass"><a href="{{ route('password.request') }}" class="text-dark font-weight-bold">Forgot password ?</a></p>
                                <div class="form-group">
                                    <div class="custom-control m-0 custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-0">
                                <button class="btn btn-primary w-100">Sign in</button>
                            </div>
                            <div class="col-lg-12 mt-4 text-center" >
                                <h6>Or Login With</h6>
                                <ul class="list-unstyled social-icon mb-0 mt-3">
                                    <li class="list-inline-item">
                                            <a href="{{route('login.facebook')}}" class="rounded">
                                                <i class="mdi mdi-facebook" title="Facebook"></i>
                                            </a>
                                    </li>
                                </ul><!--end icon-->
                            </div>
                            <div class="col-12 text-center">
                                <p class="mb-0 mt-3">
                                    <small class="text-dark mr-2">Don't have an account ?</small> 
                                    <a href="{{route('register')}}" class="text-dark font-weight-bold">Sign Up</a></p>
                            </div>
                        </div>
                    </form>
                </div><!---->
            </div> <!--end col-->
        </div><!--end row-->
    </div>
    
</section>
@endsection