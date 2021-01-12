@extends('frontend.app')







@section('content')

<section class="section pb-5">

  



    <div class="container">

       

        <div class="row">

         

                <div class="col-12">

                    <div class="section-title text-center mb-2">

                        <h4 class="title title-line pb-5">Talent Categories</h4>

                       

                    </div>

                </div>

            <div class="col-lg-12">

                <div class="row catregory-list-page">

                    @php

                    $categories = [

                        [

                            'src'=>'/assets/theme/images/categories/actor.jpeg',

                            'url'=>'/',

                            'name'=>'Actors',

                            'slug'=>'actors'


                        ],

                        [

                            'src'=>'/assets/theme/images/categories/athletes.jpg',

                            'url'=>'/',

                            'name'=>'Athletes',

                            'slug'=>'athletes'

                        ],


                        [

                            'src'=>'/assets/theme/images/categories/content-creators.jpg',

                            'url'=>'/',

                            'name'=>'Content Creators',

                            'slug'=>'content-creators'


                        ],

                        
                        [

                            'src'=>'/assets/theme/images/categories/musicians.jpg',

                            'url'=>'/',

                            'name'=>'Musicians',

                            'slug'=>'musicians'


                        ],

                        [

                            'src'=>'/assets/theme/images/categories/comedians.jpg',

                            'url'=>'/',

                            'name'=>'Comedians',

                            'slug'=>'comedians'

                        ]

                    ]

                    @endphp

                    @foreach($categories as $category)

                    <div class="col-3">

                        <a href="{{route('celebrity.list',['celebrity_type'=>$category['slug']])}}">

                            <div class="popu-category-box bg-light rounded text-center p-4 d-flex align-items-end" style="background-image:url({{$category['src']}})">

                                <div class="popu-category-content w-100">

                                    <h5 class="mb-2 text-dark title">{{ $category['name']}}</h5>

                                </div>

                            </div>

                        </a>

                    </div>              

                @endforeach

                </div>

            </div>

        </div>



    

    </div>

</section>

@endsection

