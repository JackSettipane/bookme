@extends('frontend.app')


@section('content')
<form class="{{route('account.profile.update')}}" method="POST" id="profile-form"> @csrf
	<!-- CREATE RESUME START -->
	<section class="section pb-5"> <button type="submit" class="btn btn-primary sticky-top">

            Save

        </button>
		<div class="container"> @if ($errors->any())
			<div class="alert alert-danger"> {{ $errors->first() }} </div> @endif @if (session('notification.class'))
			<div class="alert rounded-0 alert-{{session('notification.class')}}"> {{ session('notification.message') }} </div> @endif
			<div class="row">
				<div class="col-lg-12">
					<h5 class="text-dark">Celebrity General Information :</h5>
				</div>
				<div class="col-12 mt-3">
					<div class="custom-form p-4 border rounded">
						<div class="celebriy-avatar-body text-center"> <label class="cabinet center-block">

                                    <figure>

                                        <img src="{{auth()->user()->avatar}}" class="gambar img-responsive img-thumbnail" id="item-img-output" />



                                </figure>

                                    <input type="file" class="item-img file center-block" name="file_photo"/>

                                </label> </div>
						<div class="row mt-4">
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">First Name<span class="text-danger">*</span> :</label> <input value="{{old('first_name',auth()->user()->first_name)}}" id="first-name" type="text" name="first_name" class="form-control resume" placeholder="First Name :"> @error('first_name')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">Last Name<span class="text-danger">*</span> :</label> <input value="{{old('last_name',auth()->user()->last_name)}}" name="last_name" id="surname-name" type="text" class="form-control last_name" placeholder="Surname :"> @error('last_name')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label for="date-of-birth" class="text-muted">Date Of Birth<span class="text-danger">*</span> :</label> <input value="{{old('dob',(auth()->user()->dob)?auth()->user()->dob->format('Y-m-d'):null)}}" name="dob" id="date-of-birth" type="date" class="form-control resume" placeholder="13-02-1999"> @error('dob')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">Gender<span class="text-danger">*</span> :</label>
									<div class="form-button"> <select class="form-control" name="gender">

                                                <option data-display="Gender">Select Gender</option>

                                                <option value="male" @if(old('gender',auth()->user()->gender) =='male') selected @endif>Male</option>

                                                <option value="female" @if(old('gender',auth()->user()->gender)=='female') selected @endif>Female</option>

                                            </select> </div> @error('gender')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">Celebrity</label>
									<div class="form-button"> <select class="form-control" name="celebrity_type">

                                                <option value="">Select Celebrity Type</option>

                                                <option value="actors" @if(old('celebrity_type',auth()->user()->celebrity_type) =='actors') selected @endif>Actors</option>
                                                <option value="athletes" @if(old('celebrity_type',auth()->user()->celebrity_type)=='athletes') selected @endif>Athletes</option>
                                                <option value="content-creators" @if(old('celebrity_type',auth()->user()->celebrity_type)=='content-creators') selected @endif>Content Creators</option>
                                                <option value="comedians" @if(old('celebrity_type',auth()->user()->celebrity_type)=='comedians') selected @endif>Comedians</option>
                                                <option value="musician" @if(old('celebrity_type',auth()->user()->celebrity_type)=='musician') selected @endif>Musician</option>

                                            </select> </div> @error('celebrity_type')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">Hiring Ammount<span class="text-danger">*</span> :</label> <input id="hiring_ammount" value="{{old('hiring_ammount',auth()->user()->hiring_ammount)}}" type="text" name="hiring_ammount" class="form-control" placeholder="Ammount"> @error('hiring_ammount')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-lg-12">
								<div class="form-group app-label"> <label>Biography :</label> <textarea id="biography" rows="4" value="{{old('biography',auth()->user()->biography)}}" name="biography" class="form-control biography" placeholder="">{{old('biography',auth()->user()->biography)}}</textarea> @error('biography')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
						</div>
					</div>
				</div>
            </div>

			<div class="row mt-5">
				<div class="col-12">
					<h5 class="text-dark">Connect With Social Accounts</h5>
				</div>
				<div class="col-12 mt-3">
					<div class="custom-form p-4 border rounded">
						<form>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group app-label">
									{{-- <a href="{{route('login.instagram')}}" class="btn btn-primary">Instagram</a> --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <a href="{{route('login.facebook')}}" class="btn btn-primary">FaceBook</a>
                                    </div>
                                </div>
								{{-- <div class="col-md-4">
									<div class="form-group app-label"> <label class="text-muted">Twitter</label> <input id="twitter" type="text" name="email" class="form-control twitter" placeholder=""> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group app-label"> <label class="text-muted">YouTube</label> <input id="youtube" type="text" name="url" class="form-control youtube"> </div>
								</div> --}}
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-12">
					<h5 class="text-dark">Contact Information :</h5>
				</div>
				<div class="col-12 mt-3">
					<div class="custom-form p-4 border rounded">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">Country</label>
									<div class="form-button"> <select class="form-control" name="country_id">

                                                <option value="">Country</option>

                                                @foreach ($countries as $item)

                                                <option @if(old('country_id',auth()->user()->country_id) == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>



                                                @endforeach



                                            </select> </div> @error('country_id')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">State</label>
									<div class="form-button"> <select class="form-control" name="state_id">

                                                <option data-display="State" value="">State</option>



                                            </select> </div> @error('state_id')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">City</label>
									<div class="form-button"> <select class="form-control" name="city_id">

                                                <option data-display="City" value="">City</option>



                                            </select> </div> @error('city_id')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">Phone</label> <input id="phone" name="phone_no" value="{{old('phone_no',auth()->user()->phone_no)}}" type="number" class="form-control resume" placeholder="Phone No. :"> @error('phone_no')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">E-mail</label> <input disabled value="{{auth()->user()->email}}" id="e-mail" type="text" class="form-control resume" placeholder="Email ID :"> @error('email')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label"> <label class="text-muted">Website</label> <input id="website" type="url" value="{{old('website',auth()->user()->website)}}" name="website" class="form-control resume" placeholder="www.example.com"> @error('website')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-lg-12">
								<div class="form-group app-label"> <label>Address :</label> <textarea id="address" name="address" rows="4" value="{{old('address',auth()->user()->address)}}" class="form-control resume" placeholder="">{{old('address',auth()->user()->address)}}</textarea> @error('address')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h5 class="text-dark mt-5">Agent Details :</h5>
				</div>
				<div class="col-12 mt-3">
					<div class="custom-form p-4 border rounded">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group app-label"> <label class="text-muted">Agent Name</label> <input id="agent_name" type="text" value="{{old('agent_name',auth()->user()->agent_name)}}" name="agent_name" class="form-control resume" placeholder=""> @error('agent_name')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-6">
								<div class="form-group app-label"> <label class="text-muted">Agent Tel</label> <input id="" type="text" name="agent_phone_no" value="{{old('agent_phone_no',auth()->user()->agent_phone_no)}}" class="form-control resume" placeholder=""> @error('agent_phone_no')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-lg-12">
								<div class="form-group app-label"> <label>Additional Information :</label> <textarea id="agent_bio" rows="4" name="agent_bio" class="form-control resume" placeholder="">{{old('agent_bio',auth()->user()->agent_bio)}}</textarea> @error('agent_bio')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h5 class="text-dark mt-5">Image Gallery :</h5>
				</div>
				<div class="col-12 mt-3">
					<div class="custom-form p-4 border rounded">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group app-label"> <label class="text-muted">Select Image</label> <input id="image_galleries" type="file" class="form-control resume" placeholder=""> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CREATE RESUME END -->
</form>
<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"> Edit Photo </h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>
			<div class="modal-body">
				<div id="upload-demo" class="center-block"></div>
			</div>
			<div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button> </div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script>

var state_id = "{{old('state_id',auth()->user()->state_id)}}"

    var city_id = "{{old('city_id',auth()->user()->city_id)}}"



    // Start upload preview image



						var $uploadCrop,

						tempFilename,

						rawImg,

						imageId;

						function readFile(input) {

				 			if (input.files && input.files[0]) {

				              var reader = new FileReader();

					            reader.onload = function (e) {

									$('.upload-demo').addClass('ready');

									$('#cropImagePop').modal('show');

						            rawImg = e.target.result;

					            }

					            reader.readAsDataURL(input.files[0]);

					        }

					        else {

						        swal("Sorry - you're browser doesn't support the FileReader API");

						    }

						}



						$uploadCrop = $('#upload-demo').croppie({

							viewport: {

								width: 180,

								height: 180,

                                type: 'circle'

							},

							enforceBoundary: false,

							enableExif: true

						});

						$('#cropImagePop').on('shown.bs.modal', function(){

							// alert('Shown pop');

							$uploadCrop.croppie('bind', {

				        		url: rawImg

				        	}).then(function(){

				        		console.log('jQuery bind complete');

				        	});

						});



						$('.item-img').on('change', function () { imageId = $(this).data('id'); tempFilename = $(this).val();

																										 $('#cancelCropBtn').data('id', imageId); readFile(this); });

						$('#cropImageBtn').on('click', function (ev) {

							$uploadCrop.croppie('result', {

								type: 'blob',

								format: 'jpeg',

								size: {width: 180, height: 180}

							}).then(function (resp) {

                                $('#cropImagePop').modal('hide');





                                var formDataToUpload = new FormData();

                                formDataToUpload.append("image", resp);

                                formDataToUpload.append("orignal_image", rawImg);



                                $.ajaxSetup({

                                    headers: {

                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                                    }

                                });

                                $.ajax({

                                    url:"{{route('account.profile.avatar')}}",

                                    data: formDataToUpload,// Add as Data the Previously create formData

                                    type:"POST",

                                    contentType:false,

                                    processData:false,

                                    cache:false,

                                    error:function(err){

                                        console.error(err);

                                    },

                                    success:function(data){

                                        console.log(data);

                                        $('#item-img-output').attr('src', data.profile);



                                    },

                                    complete:function(){

                                        console.log("Request finished.");

                                    }

                                });





							});

						});

				// End upload preview image



    jQuery('[name="country_id"]').change(function(){



        getStates()



    });

    getStates()

    function getStates(){

        $.get("{{route('states')}}", {

            country_id: jQuery('[name="country_id"]').val(),

            }, function(data){



           jQuery('[name="state_id"] option:not(:first-child)').remove();

           jQuery('[name="city_id"] option:not(:first-child)').remove();



          jQuery.each(data,function(k,v){

               jQuery('[name="state_id"] option:first-child').after('<option  value="'+v.id+'">'+v.name+'</option>');

               jQuery('[name="state_id"] [value="'+state_id+'"]').attr('selected','selected');



          });



          getCities();



       });

    }



    jQuery('[name="state_id"]').change(function(){



        getCities();



    });





    function getCities(){

        $.get("{{route('cities')}}" ,{state_id: jQuery('[name="state_id"]').val()}, function(data){



            jQuery('[name="city_id"] option:not(:first-child)').remove();

                jQuery.each(data,function(k,v){

                        jQuery('[name="city_id"] option:first-child').after('<option value="'+v.id+'">'+v.name+'</option>');

                        jQuery('[name="city_id"] [value="'+city_id+'"]').attr('selected','selected');



                });

            });

    }
</script>
@endpush
@push('styles')


    <!-- selectize css -->
    <link rel="stylesheet" type="text/css" href="{{url('/assets/theme/css/selectize.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{url('/assets/theme/css/nice-select.css')}}" />

@endpush
