@extends('frontend.app')



@section('content')


<section class="section pb-5">
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="login_page bg-white shadow rounded p-4">
                    <div class="text-center">
                        <h4 class="mb-4">Recover Account</h4>  
                    </div>
                    <form class="login-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-muted">Please enter your email address. You will receive a link to create a new password via email.</p>
                                <div class="form-group position-relative">
                                    <label>Email address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary w-100">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!--end col-->
        </div><!--end row-->
    </div>

</section>
@endsection