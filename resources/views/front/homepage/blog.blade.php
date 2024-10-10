@extends('front.layouts.app')

@section('content')

<section id="page-title">
    <div class="container clearfix">
        <h1>{{ $title }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div id="posts" class="post-grid grid-container post-masonry clearfix">
                <div class="entry clearfix">
                    <div class="entry-image">
                        <a href="front/images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade"
                                src="front/images/blog/small/17.jpg" alt="Standard Post with Image"></a>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 10th Feb 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est
                            tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus.</p>
                        <a href="blog-single.html" class="more-link">Read More</a>
                    </div>
                </div>
                <div class="entry clearfix">
                    <div class="entry-image">
                        <iframe src="http://player.vimeo.com/video/87701971" width="500" height="281" frameborder="0"
                            webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-full.html">This is a Standard post with an Embedded Video</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 16th Feb 2014</li>
                        <li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 19</a></li>
                        <li><a href="#"><i class="icon-film"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis
                            quisquam laboriosam esse beatae hic perferendis velit deserunt!</p>
                        <a href="blog-single-full.html" class="more-link">Read More</a>
                    </div>
                </div>
                <div class="entry clearfix">
                    <div class="entry-image">
                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <div class="slide"><a href="front/images/blog/full/10.jpg"
                                            data-lightbox="gallery-item"><img class="image_fade"
                                                src="front/images/blog/masonry/10.jpg" alt="Standard Post with Gallery"></a>
                                    </div>
                                    <div class="slide"><a href="front/images/blog/full/20.jpg"
                                            data-lightbox="gallery-item"><img class="image_fade"
                                                src="front/images/blog/masonry/20.jpg" alt="Standard Post with Gallery"></a>
                                    </div>
                                    <div class="slide"><a href="front/images/blog/full/21.jpg"
                                            data-lightbox="gallery-item"><img class="image_fade"
                                                src="front/images/blog/masonry/21.jpg" alt="Standard Post with Gallery"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-small.html">This is a Standard post with a Slider Gallery</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                        <li><a href="#"><i class="icon-picture"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi
                            nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
                        <a href="blog-single-small.html" class="more-link">Read More</a>
                    </div>
                </div>
                <div class="entry clearfix">
                    <div class="entry-image">
                        <blockquote>
                            <p>"When you are courting a nice girl an hour seems like a second. When you sit on a red-hot
                                cinder a second seems like an hour. That's relativity."</p>
                            <footer>Albert Einstein</footer>
                        </blockquote>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 3rd Mar 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 23</a></li>
                        <li><a href="#"><i class="icon-quote-left"></i></a></li>
                    </ul>
                </div>
                <div class="entry clearfix">
                    <div class="entry-image clearfix">
                        <div class="portfolio-single-image masonry-thumbs grid-4" data-big="3" data-lightbox="gallery">
                            <a href="front/images/blog/full/2.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/2.jpg" alt=""></a>
                            <a href="front/images/blog/full/3.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/3.jpg" alt=""></a>
                            <a href="front/images/blog/full/6-1.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/6-1.jpg" alt=""></a>
                            <a href="front/images/blog/full/6-2.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/6-2.jpg" alt=""></a>
                            <a href="front/images/blog/full/12.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/12.jpg" alt=""></a>
                            <a href="front/images/blog/full/12-1.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/12-1.jpg" alt=""></a>
                            <a href="front/images/blog/full/13.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/13.jpg" alt=""></a>
                            <a href="front/images/blog/full/18.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/18.jpg" alt=""></a>
                            <a href="front/images/blog/full/19.jpg" data-lightbox="gallery-item"><img class="image_fade"
                                    src="front/images/blog/small/19.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-thumbs.html">This is a Standard post with Masonry Thumbs Gallery</a>
                        </h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 3rd Mar 2014</li>
                        <li><a href="blog-single-thumbs.html#comments"><i class="icon-comments"></i> 21</a></li>
                        <li><a href="#"><i class="icon-picture"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi
                            nisi autem blanditiis enim culpa reiciendis et explicabo!</p>
                        <a href="blog-single-thumbs.html" class="more-link">Read More</a>
                    </div>
                </div>
                <div class="entry clearfix">
                    <div class="entry-image">
                        <a href="http://themeforest.net/" class="entry-link" target="_blank">
                            Themeforest.net
                            <span>- http://themeforest.net</span>
                        </a>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 17th Mar 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 26</a></li>
                        <li><a href="#"><i class="icon-link"></i></a></li>
                    </ul>
                </div>
                <div class="entry clearfix">
                    <div class="entry-image">
                        <div class="card">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, fuga optio voluptatibus
                                saepe tenetur aliquam debitis eos accusantium!
                            </div>
                        </div>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 21st Mar 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 11</a></li>
                        <li><a href="#"><i class="icon-align-justify2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="page-load-status">
                <div class="css3-spinner infinite-scroll-request">
                    <div class="css3-spinner-ball-pulse-sync">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="alert alert-warning center infinite-scroll-last mx-auto" style="max-width: 20rem;">End of
                    content</div>
                <div class="alert alert-warning center infinite-scroll-error mx-auto" style="max-width: 20rem;">No more
                    pages to load</div>
            </div>

            <div class="center d-none">
                <a href="blog-masonry-page-2.html"
                    class="button button-3d button-dark button-large button-rounded load-next-posts">Load more..</a>
            </div>
        </div>
    </div>
</section>


@endsection
