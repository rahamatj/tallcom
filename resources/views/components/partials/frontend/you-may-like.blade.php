<section class="latest-items section-padding fix">
    <div class="row">
        <div class="col-xl-12">
            <div class="section-tittle text-center mb-40">
                <h2>You May Like</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="latest-items-active">
            <!-- Single -->
            @foreach($youMayAlsoLikeProducts as $product)
                <div class="properties pb-30">
                    <div class="properties-card">
                        <div class="properties-img">
                            <a href="pro-details.html"><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></a>
                            <div class="socal_icon">
                                <a href="#"><i class="ti-shopping-cart"></i></a>
                                <a href="#"><i class="ti-heart"></i></a>
                                <a href="#"><i class="ti-zoom-in"></i></a>
                            </div>
                        </div>
                        <div class="properties-caption properties-caption2">
                            <h3><a href="pro-details.html">Cashmere Tank + Bag</a></h3>
                            <div class="properties-footer">
                                <div class="price">
                                    <span>$98.00 <span>$120.00</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Single -->
        </div>
    </div>
</section>
