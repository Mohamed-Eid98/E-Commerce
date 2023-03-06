@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
@include('layouts.inc.frontSlider')

   <div class="py-5">
       <div class="container">
           <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($products_trending as $prod)
                        <div class="item">       
                            <div class="card">
                                <img src="{{ asset('admin/uploads/products/' . $prod->image) }}" class ="user-image" alt="Image">
                            <div class="card body">
                                <h6>{{ $prod->name }}</h6>
                                <span class= 'float-start'>{{ $prod->selling_price }}</span>
                                <span class='float-end'> <s>{{ $prod->original_price }}</s></span>
                            </div>
                        </div>
                        </div>
                    @endforeach
            </div>
            </div>
       </div>

       
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2 class="pb-2">Featured Categories</h2>
         <div class="owl-carousel category-carousel owl-theme">
                @foreach ($trending_categories as $cate)
                     <div class="item">    
                         <a href="{{ url('view category/'. $cate->slug) }}">   
                         <div class="card">
                             <img src="{{ asset('admin/uploads/new/' . $cate->image) }}" class ="user-image" alt="Image">
                         <div class="card body">
                             <h6>{{ $cate->name }}</h6>
                             <p>{{ $cate->description }}</p>
                         </div>
                     </div>
                    </a>
                     </div>
                 @endforeach
         </div>
         </div>
    </div>

@endsection


@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
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
    
    $('.category-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
</script>
@endsection