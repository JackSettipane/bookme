@extends('frontend.app')


@section('content')

@php 

$sliders =[
        [
            'src'=>'/assets/theme/images/slider/slider1.jpg',
            'url'=>'/'
        ],
        [
            'src'=>'/assets/theme/images/slider/slider2.jpg',
            'url'=>'/'
        ],
        [
            'src'=>'/assets/theme/images/slider/slider3.jpg',
            'url'=>'/'
        ]
    ];


$categories = [
    [
        'src'=>'/assets/theme/images/categories/actor.jpeg',
        'url'=>'/',
        'name'=>'Actors'
    ],
    [
        'src'=>'/assets/theme/images/categories/content-creators.jpg',
        'url'=>'/',
        'name'=>'Content Creators'
    ],
    [
        'src'=>'/assets/theme/images/categories/athletes.jpg',
        'url'=>'/',
        'name'=>'Athletes'
    ],
    [
        'src'=>'/assets/theme/images/categories/musicians.jpg',
        'url'=>'/',
        'name'=>'Musicians'
    ],
    [
        'src'=>'/assets/theme/images/categories/comedians.jpg',
        'url'=>'/',
        'name'=>'Comedians'
    ]
]

@endphp

  <!-- Start Home -->
    <section class="bg-home">
        <div class="owl-carousel owl-theme home-slider">
            @foreach($sliders as $slider)
                <div class="item">
                
                        <img src="{{$slider['src']}}">
                
                </div>
            @endforeach
        </div>
    </section>
    <!-- end home -->

    <!-- popular category start -->
    <section class="section pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title title-line pb-5">Talent Categories</h4>
                        <p class="text-muted para-desc mx-auto mb-1">
                            Find famous and noteworthy talent/creator to supports, promote, and add exposure to your brand. Fully booking theme in less then 10 minutes all through Bookable Talents "tm"
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="owl-carousel owl-theme cr-category">

                @foreach($categories as $category)
                    <div class="item">
                        <a href="{{route('celebrity.list')}}">
                            <div class="popu-category-box bg-light rounded text-center p-4 d-flex align-items-end" style="background-image:url({{$category['src']}})">
                                <div class="popu-category-content w-100">
                                    <h5 class="mb-2 text-dark title">{{ $category['name']}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>              
                @endforeach

            </div>

            <div class="row justify-content-center">
                <div class="col-12 text-center mt-4 pt-2">
                    <a href="{{route('categories.list')}}" class="btn btn-primary-outline">All Category Browsing<i class="mdi mdi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- popular category end -->

    <!-- all jobs start -->
    <section class="section bg-light pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title title-line pb-5">Top Rated Talent</h4>
                    </div>
                </div>
            </div>

            @php 
                $top_rated_celebrities = [
                    
                    [
                        'name'=>"Angelina Jolie",
                        'avatar_url'=>'/assets/theme/images/celebrities/angelina-jolie.jpg'
                    ],
                    [
                        'name'=>"Herman Li",
                        'avatar_url'=>'/assets/theme/images/celebrities/hima.jpg'
                    ],
                    [
                        'name'=>"Eileen Davidson",
                        'avatar_url'=>'/assets/theme/images/celebrities/elan.jpg'
                    ],
                    [
                        'name'=>"Tom Colicchio",
                        'avatar_url'=>'/assets/theme/images/celebrities/tom-coli.jpg'
                    ],
                    [
                        'name'=>"Lancer Parker",
                        'avatar_url'=>'/assets/theme/images/celebrities/lancer-parker.jpg'
                    ],
                    [
                        'name'=>"Kostas Merkie",
                        'avatar_url'=>'/assets/theme/images/celebrities/kostas.jpg'
                    ]

                ];
            @endphp
           
                    <div class="row" >
                            
                                    
                                @foreach($top_rated_celebrities as $celebrity)
                                <div class="col-lg-4 celebrity-item-row">
                                    <div style="background-image: url({{$celebrity['avatar_url']}})" class=" job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                        <div class="p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-5">
                                                    <div class="mo-mb-2">
                                                        <img  src="{{$celebrity['avatar_url']}}" alt="" class="img-fluid mx-auto d-block">
                                                        <div class="shadow"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div>
                                                        <h5 class="f-18"><a href="{{route('celebrity.single',['angelina-jolie'])}}" class="text-white">{{$celebrity['name']}}</a></h5>
                                                        <p class="text-muted mb-0">  Musician, Guitarist for DragonForce</p>

                                                      

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
                                                <div class="col-md-6">
                                                    <div>
                                                        <a href="{{route('celebrity.single',['angelina-jolie'])}}" class="text-primary btn btn-primary">View<i class="mdi mdi-chevron-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                @endforeach

                            
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 text-center mt-4 pt-2">
                                    <a href="{{route('celebrity.list')}}" class="btn btn-primary-outline">Browse All Celebrities <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
            <!-- end row -->
        </div>
        <!-- end containar -->
    </section>
    <!-- all jobs end -->

@endsection

@push('scripts')

<script>    
    $('.home-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        items:1,
        autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],

    });

    $('.cr-category').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:false,
    navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})


</script>

@endpush

@push('styles')
<style>
    .home-slider img {
        object-fit: cover;
        width: 100%;
        height: 100vh;
    }
</style>
@endpush