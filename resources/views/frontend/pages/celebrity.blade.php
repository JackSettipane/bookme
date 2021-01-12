@extends('frontend.app')







@section('content')

<section class="section  pb-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-12">

                <div class="show-results mt-4">

                    <div class="float-left">

                        <h5 class="text-dark mb-0 pt-2">Showing ( {{$celebrities->count()}} Celebrities )</h5>

                    </div>

                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-lg-3 pt-2">

                <div class="left-sidebar">

                    <div class="accordion" id="accordionExample">

                        <form id="filter-submit">
                            <div class="card rounded mt-4">

                                <a data-toggle="collapse" href="#collapsetwo" class="job-list" aria-expanded="true" aria-controls="collapsetwo">

                                    <div class="card-header" id="headingtwo">

                                        <h6 class="mb-0 text-dark f-18">Categories</h6>

                                    </div>

                                </a>

                                <div id="collapsetwo" class="collapse show" aria-labelledby="headingtwo">

                                    <div class="card-body p-0">

                                        <div class="custom-control custom-radio">

                                            <input type="radio" id="customRadio7" name="celebrity_type" class="custom-control-input"
                                            @if(request()->celebrity_type == 'actors') checked @endif value="actors" >

                                            <label class="custom-control-label ml-1 text-muted" for="customRadio7">Actors</label>

                                        </div>



                                        <div class="custom-control custom-radio">

                                            <input type="radio" id="customRadio8" name="celebrity_type" class="custom-control-input"
                                            @if(request()->celebrity_type == 'athletes') checked @endif value="athletes"
                                            >

                                            <label class="custom-control-label ml-1 text-muted" for="customRadio8">Athletes</label>

                                        </div>



                                        <div class="custom-control custom-radio">

                                            <input type="radio" id="customRadio9" name="celebrity_type"  @if(request()->celebrity_type == 'content-creators') checked @endif value="content-creators"  class="custom-control-input">

                                            <label class="custom-control-label ml-1 text-muted" for="customRadio9">Content Creators</label>

                                        </div>



                                        <div class="custom-control custom-radio">

                                            <input type="radio" id="customRadio10" name="celebrity_type"  @if(request()->celebrity_type == 'comedians') checked @endif value="comedians" class="custom-control-input">

                                            <label class="custom-control-label ml-1 text-muted" for="customRadio10">Comedians</label>

                                        </div>



                                        <div class="custom-control custom-radio">

                                            <input type="radio" id="customRadio11" @if(request()->celebrity_type == 'musician') checked @endif value="musician" name="celebrity_type" class="custom-control-input">

                                            <label class="custom-control-label ml-1 text-muted" for="customRadio11">Musician</label>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="card rounded mt-4">

                                <a data-toggle="collapse" href="#collapsefour" class="job-list" aria-expanded="true" aria-controls="collapsefour">

                                    <div class="card-header" id="headingfour">

                                        <h6 class="mb-0 text-dark f-18">Gender</h6>

                                    </div>

                                </a>

                                <div id="collapsefour" class="collapse show" aria-labelledby="headingfour">

                                    <div class="card-body p-0">

                                        <div class="custom-control custom-radio">

                                            <input type="radio" id="customRadio17" name="gender"  @if(request()->gender == 'male') checked @endif  value="male" class="custom-control-input">

                                            <label class="custom-control-label ml-1 text-muted" for="customRadio17">Male</label>

                                        </div>



                                        <div class="custom-control custom-radio">

                                            <input type="radio" id="customRadio18" name="gender" @if(request()->gender == 'female') checked @endif   value="female" class="custom-control-input">

                                            <label class="custom-control-label ml-1 text-muted"  for="customRadio18">Female</label>

                                        </div>




                                    </div>

                                </div>

                            </div>
                            <div>
                                <a href="{{url()->current()}}" class="btn btn-primary w-100 mt-3">Reset Filters</a>
                            </div>
                        </form>
                        <!-- collapse one end -->



                    </div>

                </div>

            </div>



            <div class="col-lg-9">

                <div class="row">


                 @foreach($celebrities as $celebrity)

                 <div class="col-lg-4 celebrity-item-row">

                     <div style="background-image: url({{$celebrity->full_avatar}})" class=" job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">

                         <div class="p-4">

                             <div class="row align-items-center">

                                 <div class="col-md-5">

                                     <div class="mo-mb-2">

                                         <img  src="{{$celebrity->avatar}}" alt="" class="img-fluid mx-auto d-block">

                                         <div class="shadow"></div>

                                     </div>

                                 </div>

                                 <div class="col-md-7">

                                     <div>

                                         <h6 class="f-18"><a href="#" class="text-white">{{$celebrity->full_name}}</a></h6>

                                         <h6 class="text-muted mb-0">{{ucfirst($celebrity->celebrity_type)}}</h6>






                                     </div>

                                 </div>

                                 <div class="col-md-12 mt-2">

                                     <div>

                                         <p class="text-muted mb-0">

                                             <i class="mdi mdi-star text-primary"></i>

                                             <i class="mdi mdi-star text-primary "></i>

                                             <i class="mdi mdi-star text-primary"></i>

                                             <i class="mdi mdi-star text-primary"></i>

                                             <i class="mdi mdi-star"></i>

                                             {{rand(1, 50) / 10}}

                                         </p>

                                     </div>

                                 </div>




                             </div>

                         </div>

                         <div class="p-3">

                             <div class="row">

                                 <div class="col-md-12">

                                     <div>

                                         <a href="{{route('celebrity.single',['username'=>$celebrity->slug])}}" class="text-primary btn btn-primary">View<i class="mdi mdi-chevron-double-right"></i></a>

                                     </div>

                                 </div>

                             </div>

                         </div>

                     </div>

                     </div>

                 @endforeach



                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-lg-12 mt-4 pt-2">


                {{ $celebrities->withQueryString()->links() }}

            </div>

        </div>

    </div>

</section>

@endsection

@push('scripts')
    <script>
        jQuery('.custom-control.custom-radio input').change(function(){

jQuery('#filter-submit').submit();

});
    </script>
@endpush
