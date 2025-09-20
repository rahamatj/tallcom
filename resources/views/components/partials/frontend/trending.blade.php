<div class="latest-items section-padding fix">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-12">
                <div class="nav-button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav-tittle">
                            <h2>Trending This Week</h2>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            @foreach($categories as $category)
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <!-- Tab 1 -->
                    <div class="latest-items-active">
                        <!-- Single -->
                        @foreach($category->products as $product)
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="pro-details.html"><img src="{{ $product->image }}" alt=""></a>
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
            @endforeach
        </div>
    </div>
</div>
