@extends('frontend.app')
@section('content')
<!-- EMPLOYERS DETAILS START -->
<section class="section  pb-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="text-sm-center">
               <img src="{{$celebrity->avatar}}" alt="" class="single-image-celebrity d-block img-fluid img-thumbnail mx-md-auto rounded-circle">
               <h4 class="mt-3"><a href="#" class="text-dark">{{$celebrity->full_name}}</a></h4>
               <ul class="list-inline mb-0">
                  <li class="list-inline-item mr-3">
                     <p class="text-muted mb-0">
                        {{ucfirst($celebrity->celebrity_type)}}
                     </p>
                  </li>
               </ul>
               <ul class="list-inline mb-2">
                  <li class="list-inline-item mr-3 ">
                     <a href="youtube" class="text-muted"><i class="mdi mdi-instagram mr-2"></i><span>50.5M</span></a>
                  </li>
                  <li class="list-inline-item mr-3">
                     <p class="text-muted"><i class="mdi mdi-twitter mr-2"></i>15.5M</p>
                  </li>
                  <li class="list-inline-item">
                     <p class="text-muted"><i class="mdi mdi-youtube mr-2"></i>5.5M</p>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="border-top border-bottom pt-4 pb-4">
               <div class="row justify-content-sm-center">
                  <div class="col-lg-2 col-md-3 col-6">
                     <div class="text-sm-center m-14">
                        <h5 class="text-dark mb-2">Price</h5>
                        <p class="text-muted mb-0">
                           <a  class="btn btn-secondary" href="{{route('booking.checkout',['celebrity'=>$celebrity->slug])}}">Bookable {{$celebrity->hiring_ammount}}$</a>
                        </p>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-6">
                     <div class="text-sm-center m-14">
                        <h5 class="text-dark mb-2">Responds in</h5>
                        <p class="text-muted mb-0">1 Day</p>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-6">
                     <div class="text-sm-center m-14">
                        <h5 class="text-dark mb-2">Reviews</h5>
                        @php 
                        $rating = rand(1, 50) / 10;
                        @endphp
                        <p class="text-muted mb-0">
                        <div class="jstars d-inline-block" 
                           data-value="{{$rating}}" 
                           data-total-stars="5" 
                           data-color="#ffc107" 
                           data-empty-color="#adb5bd" 
                           data-size="20px">
                        </div>
                        <span class="text-muted">{{$rating}}</span>
                        </p>
                     </div>
                  </div>
                  {{--
                  <div class="col-lg-2 col-md-3 col-6">
                     <div class="text-sm-center m-14">
                        <h5 class="text-dark mb-2">Followers</h5>
                        <p class="text-muted mb-0">584230 +</p>
                     </div>
                  </div>
                  --}}
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 mt-4 pt-2">
            <h4>{{($celebrity->full_name)}} Agent and Management Contact Details:</h4>
            <div class="rounded border p-4 mt-3">
               <p class="text-muted">
                  {{($celebrity->biography)}}
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 mt-4 pt-2">
            <h4>Basic Information: </h4>
            <div class="rounded border p-4 mt-3">
               <p class="text-muted"><strong><i class="mdi mdi-check text-success"></i> Location: </strong>
                  {{$celebrity->cities}}, {{$celebrity->city}}
               </p>
               <p class="text-muted"><strong><i class="mdi mdi-check text-success"></i> Age: </strong>@if($celebrity->dob){{\Carbon\Carbon::parse($celebrity->dob)->age}}  ({{$celebrity->dob->format('M d Y')}})@endif</p>
               <p class="text-muted"><strong><i class="mdi mdi-check text-success"></i> Tags: </strong> Feb 1996</p>
            </div>
            <h4 class="mt-4">Social Accounts: </h4>
            <div class="rounded border p-4 mt-3">
               <p class="text-muted">
                   <strong>
                       <i class="mdi mdi-check text-success"></i>
                        Facebook Likes: 
                    </strong>
                    <span id="facebook_likes_tag">
                        {{$facebook}}
                    </span>
               </p>
               
            </div>
         </div>
         <div class="col-lg-6 mt-4 pt-2">
            <h4>Contacts: </h4>
            <div class="rounded border p-4 mt-3">
               <strong>Agent</strong>
               <p class="text-muted"><strong>Lance Turin  </strong></p>
               <p class="text-muted"><strong>Direct Tel: </strong> +1 3978986549</p>
               <p class="text-muted"><strong>Direct Email: </strong>anglien@Hotmail.com</p>
               <p class="text-muted"><strong>Company Tel: </strong> +123-97-8986-549</p>
               <p class="text-muted"><strong>Website: </strong><a href="https://www.instagram.com/angelinajolie_offiicial/?hl=en">angelinajolie_offiicial.com</a></p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- EMPLOYERS DETAILS END -->
@endsection