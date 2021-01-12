@extends('frontend.app')





@section('content')




    <!-- CREATE RESUME START -->
    <section class="section pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-dark">Celebrity General Information :</h5>
                </div>
 
                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <img src="{{url('/assets/theme/images/celebrities/elan.jpg')}}" class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt="">
                        <form>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">First Name<span class="text-danger">*</span> :</label>
                                        <input id="first-name" type="text" name="name" class="form-control resume" placeholder="First Name :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Middle Name<span class="text-danger">*</span> :</label>
                                        <input id="middle-name" type="text" class="form-control resume" placeholder="Middle Name :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Surname<span class="text-danger">*</span> :</label>
                                        <input id="surname-name" type="text" class="form-control resume" placeholder="Surname :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Date Of Birth<span class="text-danger">*</span> :</label>
                                        <input id="date-of-birth" type="text" class="form-control resume" placeholder="13-02-1999">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Gender<span class="text-danger">*</span> :</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="Gender">Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Celebrity</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="Select Celebrity">Select Celebrity Type</option>
                                                <option value="1">Alabama</option>
                                                <option value="2">Delaware</option>
                                                <option value="3">Iowa</option>
                                                <option value="4">Missouri</option>
                                                <option value="5">New York</option>
                                                <option value="6">Utah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Hiring Ammount<span class="text-danger">*</span> :</label>
                                        <input id="date-of-birth" type="text" class="form-control" placeholder="Ammount">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Biography :</label>
                                        <textarea id="biography" rows="4" class="form-control biography" placeholder=""></textarea>
                                    </div>
                                </div>
                             
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-dark">Social Account Followers :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Instagram</label>
                                        <input id="Instagram" type="text" class="form-control Instagram" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Twitter</label>
                                        <input id="twitter" type="text" name="email" class="form-control twitter" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">YouTube</label>
                                        <input id="youtube" type="text" name="url" class="form-control youtube" >
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-dark">Contact Information :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">City</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="City">City</option>
                                                <option value="1">Abilene</option>
                                                <option value="2">Babbitt</option>
                                                <option value="3">Cape Coral</option>
                                                <option value="4">Dallas</option>
                                                <option value="5">Eloy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">State</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="State">State</option>
                                                <option value="1">Alabama</option>
                                                <option value="3">Hawaii</option>
                                                <option value="4">Maine</option>
                                                <option value="5">Oregon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Country</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="Country">Country</option>
                                                <option value="1">Alabama</option>
                                                <option value="2">Delaware</option>
                                                <option value="3">Iowa</option>
                                                <option value="4">Missouri</option>
                                                <option value="5">New York</option>
                                                <option value="6">Utah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Phone</label>
                                        <input id="phone" type="number" class="form-control resume" placeholder="Phone No. :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">E-mail</label>
                                        <input id="e-mail" type="email" name="email" class="form-control resume" placeholder="Email ID :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Website</label>
                                        <input id="website" type="url" name="url" class="form-control resume" placeholder="www.example.com">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Address :</label>
                                        <textarea id="address" rows="4" class="form-control resume" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-dark mt-5">Agent Details :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Agent Name</label>
                                        <input id="graduation" type="text" class="form-control resume" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Agent Tel</label>
                                        <input id="university/college" type="text" class="form-control resume" placeholder="">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Additional Information :</label>
                                        <textarea id="addition-information" rows="4" class="form-control resume" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-dark mt-5">Image Gallery :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Select Image</label>
                                        <input id="graduation" type="file" class="form-control resume" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

          
        </div>
    </section>
    <!-- CREATE RESUME END -->


      
@endsection


@push('styles')
    
    <!-- selectize css -->
    <link rel="stylesheet" type="text/css" href="{{url('/assets/theme/css/selectize.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{url('/assets/theme/css/nice-select.css')}}" />

@endpush
