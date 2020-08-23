@section('title','Single Product Review')

@include('public.includes_public.header')




<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    @isset($single_product)
    @foreach ($single_product as $product)


    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            <img src="{{ asset('images/product_images/' . $product->prod_image) }}" width='150px' alt="">
            <img src="{{ asset('images/product_images/' . $product->prod_image) }}" width="150px" alt="">
            <img src="{{ asset('images/product_images/' . $product->prod_image) }}" width='150px' alt="">
        </div>
    </div>
    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
     @include('public.includes_public.alerts.messages')
        {{-- <span>mango</span> --}}
        <a href="">

            <h2>{{ $product->prod_name }}</h2>
        </a>
        <p class="product-price"> {{ $product->prod_price . " AED"}}</p>
        <p class="product-desc">{{ $product->prod_desc }}</p>

        <!-- Form -->
        <form action='{{route("add_to_cart",$product->id)}}' class="cart-form clearfix" method="post">
            @csrf
            <!-- Cart & Favourite Box -->
            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" name="addtocart" class="btn essence-btn">Add to
                    cart</button>
                <!-- Favourite -->
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
        </form>

    </div>

    @endforeach
    @endisset
</section>
<!-- ##### Single Product Details Area End ##### -->















@include('public.includes_public.footer')
