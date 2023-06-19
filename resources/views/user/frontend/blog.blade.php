@extends('user.layout.default')
@section('section')


    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" placeholder="Search . . .  ">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory" style="height: 400px" >
                            @foreach ($category as $cat )
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">{{$cat->name}}</a></li>
                            </ul>
                            @endforeach
                        </div>
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-1.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-2.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-3.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-4.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Product Tags</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trousers</a>
                                <a href="#">Men's hats</a>
                                <a href="#">Backpack</a>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($blog as $blog )
                @if($blog->is_active==1)
        <div class="col-lg-9 order-1 order-lg-2" >
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="blog-item">
                        <div class="bi-pic">
                            <img src="{{ Config('constants.catimage_IMAGE_ROOT_PATH') }}/{{ $blog->blogimage }}" alt="" class="h-105">
                        </div>
                        <div class="bi-text">
                            <a href="./blog-details.html">
                                <h6>{{$blog->title}}</h6>
                                <h4>{{ $blog->description }}</h4>
                            </a>
                            <p>{{$blog->subtitle}} <span>- {{date("d-m-Y",strtotime($blog->created_at))}}</span></p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
    </section>
    <!-- Blog Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
