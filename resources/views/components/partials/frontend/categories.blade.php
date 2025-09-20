<section class="items-product1 pt-30">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-items mb-20">
                        <div class="items-img">
                            <img src="{{ asset($category->image) }}" alt="">
                        </div>
                        <div class="items-details">
                            <h4><a href="pro-details.html">Men's Fashion</a></h4>
                            <a href="pro-details.html" class="browse-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
