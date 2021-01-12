@extends('frontend.app')





@section('content')

<form class="{{route('account.profile.update')}}" method="POST" id="profile-form"> @csrf
	<!-- CREATE RESUME START -->
	<section class="section pb-5">
		<button type="submit" class="btn btn-primary sticky-top"> Save </button>
		<div class="container"> @if ($errors->any())
			<div class="alert alert-danger"> {{ $errors->first() }} </div> @endif @if (session('notification.class'))
			<div class="alert rounded-0 alert-{{session('notification.class')}}"> {{ session('notification.message') }} </div> @endif
			<div class="row">
				<div class="col-lg-12">
					<h5 class="text-dark">Brand General Information :</h5> </div>
				<div class="col-12 mt-3">
					<div class="custom-form p-4 border rounded">
						<div class="celebriy-avatar-body text-center">
							<label class="cabinet center-block">
								<figure> <img src="{{auth()->user()->avatar}}" class="gambar img-responsive img-thumbnail" id="item-img-output" /> </figure>
								<input type="file" class="item-img file center-block" name="file_photo" /> </label>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group app-label">
									<label class="text-muted">Brand Name<span class="text-danger">*</span> :</label>
									<input value="{{old('brand_name',auth()->user()->brand_name)}}" id="first-name" type="text" name="brand_name" class="form-control resume" placeholder="Brand Name :"> @error('brand_name')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label">
									<label class="text-muted">E-mail</label>
									<input disabled value="{{auth()->user()->email}}" id="e-mail" type="text" class="form-control resume" placeholder="Email ID :"> @error('email')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
							</div>
							<div class="col-md-4">
								<div class="form-group app-label">
									<label class="text-muted">Website</label>
									<input id="website" type="url" value="{{old('website',auth()->user()->website)}}" name="website" class="form-control resume" placeholder="www.example.com"> @error('website')
									<div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div>
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
        <h4 class="modal-title" id="myModalLabel">
            Edit Photo    
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
          <div id="upload-demo" class="center-block"></div>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
      </div>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />


@endpush
