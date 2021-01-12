@extends('frontend.app')







@section('content')





<section class="section pb-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="login_page bg-white shadow rounded p-4">

                    <div class="text-center">

                        <h4 class="mb-4">Signup</h4>  

                    </div>

                    <form method="POST" class="login-form" action="{{route('register')}}">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group position-relative">                                               

                                    <label>Account Type <span class="text-danger">*</span></label>

                                    <select class="form-control @error('account_type') is-invalid @enderror" name="account_type" id="account-type">

                                        <option value="">

                                            Select Account Type

                                        </option>

                                        <option value="talent" @if(old('account_type') =='talent') selected @endif>

                                            Talent 

                                        </option>

                                        <option  value="brand" @if(old('account_type') =='brand') selected @endif>

                                            Brand

                                        </option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6" data-condition-account-type="talent">

                                <div class="form-group position-relative">                                               

                                    <label>First name <span class="text-danger">*</span></label>

                                    <input type="text" value="{{old('first_name')}}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" >
                                    @error('first_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6" data-condition-account-type="talent">

                                <div class="form-group position-relative">                                                

                                    <label>Last name <span class="text-danger">*</span></label>

                                    <input type="text" value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" name="last_name" >
                                    @error('last_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="talent">

                                <div class="form-group position-relative">                                                

                                    <label>UserName<span class="text-danger">*</span></label>

                                    <input type="text" value="{{old('user_name')}}" class="form-control  @error('user_name') is-invalid @enderror" placeholder="UserName" name="user_name" >
                                    @error('user_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="talent">

                                <div class="form-group position-relative">

                                    <label>Your Email <span class="text-danger">*</span></label>

                                    <input type="text" value="{{old('talent_email')}}" class="form-control @error('talent_email') is-invalid @enderror" placeholder="Email" name="talent_email" >
                                    @error('talent_email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="talent">

                                <div class="form-group position-relative">

                                    <label>Password <span class="text-danger">*</span></label>

                                    <input type="password" class="form-control @error('talent_password') is-invalid @enderror" placeholder="Password" name="talent_password" >
                                    @error('talent_password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="talent">

                                <div class="form-group position-relative">

                                    <label>Confirm Password <span class="text-danger">*</span></label>

                                    <input type="password" class="form-control @error('talent_password_confirmation') is-invalid @enderror" name="talent_password_confirmation" placeholder="Confirm Password" >
                                    @error('talent_password_confirmation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            
                            <div class="col-md-12" data-condition-account-type="brand">
                                <div class="form-group position-relative">                                               
                                
                                <label>Brand name <span class="text-danger">*</span></label>
                                
                                <input type="text" value="{{old('brand_name')}}" class="form-control @error('brand_name') is-invalid @enderror" placeholder="Brand Name"  name="brand_name" >
                                    @error('brand_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12" data-condition-account-type="brand">

                                <div class="form-group position-relative">

                                    <label>Brand Email <span class="text-danger">*</span></label>

                                    <input type="email"  value="{{old('brand_email')}}" class="form-control @error('brand_email') is-invalid @enderror" placeholder="Brand Email" name="brand_email" >
                                    @error('brand_email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="brand">

                                <div class="form-group position-relative">

                                    <label>Password <span class="text-danger">*</span></label>

                                    <input type="password" name="brand_password" class="form-control @error('brand_password') is-invalid @enderror" placeholder="Password" >
                                    @error('brand_password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="brand">

                                <div class="form-group position-relative">

                                    <label>Confirm Password <span class="text-danger">*</span></label>

                                    <input type="password" name="brand_password_confirmation" class="form-control" placeholder="Confirm Password" >

                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="brand">

                                <div class="form-group">

                                    <div class="custom-control m-0 custom-checkbox">

                                        <input type="checkbox" class="custom-control-input" id="customCheck1">

                                        <label class="custom-control-label" for="customCheck1">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12" data-condition-account-type="talent">

                                <button class="btn btn-primary w-100">

                                    Register

                                </button>

                            </div>

                            <div class="col-md-12" data-condition-account-type="brand">

                                <button class="btn btn-primary w-100">

                                    Register

                                </button>

                            </div>

                            <div class="col-lg-12 mt-4 text-center" data-condition-account-type="talent">

                                <h6>Or Signup With</h6>

                                <ul class="list-unstyled social-icon mb-0 mt-3">

                                    <li class="list-inline-item">

                                        <a href="javascript:void(0)" class="rounded">

                                            <i class="mdi mdi-instagram" title="Instagram"></i>

                                        </a>

                                    </li>

                                </ul><!--end icon-->

                            </div>

                            <div class="mx-auto">

                                <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account ?</small> <a href="{{route('login')}}" class="text-dark font-weight-bold">Sign in</a></p>

                            </div>

                        </div>

                    </form>

                </div>

            </div> <!--end col-->

        </div><!--end row-->

    </div>

</section>

@endsection



@push('scripts')

    <script>

        accountType()

        jQuery('#account-type').change(function(){

            accountType()

        });



        function accountType(){

            jQuery('[data-condition-account-type]').slideUp()

            var _account_type = jQuery('#account-type').val();

            jQuery('[data-condition-account-type="'+_account_type+'"]').slideDown()

        }

    </script>

@endpush