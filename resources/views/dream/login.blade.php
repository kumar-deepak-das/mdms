<!DOCTYPE html>
<html lang="en">
  <head>
    @include('dream.inc.head')
  </head>

<body>

  @include('dream.inc.preloader')

  @include('dream.inc.header')
  
  <!-- <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h6>Our Services</h6>
            <h2>Discover What We Do &amp; <span>Offer</span> To Our <em>Clients</em></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="{{asset('public/dream/assets/images/service-icon-01.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Similar Websites</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="{{asset('public/dream/assets/images/service-icon-02.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Website Trends</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="{{asset('public/dream/assets/images/service-icon-03.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Traffic Analysis</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="{{asset('public/dream/assets/images/service-icon-03.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Optimizing Keywords</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="{{asset('public/dream/assets/images/service-icon-01.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Page Optimizations</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.8s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="{{asset('public/dream/assets/images/service-icon-02.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Deep URL Analysis</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>Our Portofolio</h6>
            <h2>Discover Our Recent <em>Projects</em> And <span>Showcases</span></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
      <div class="row">
        <div class="col-lg-12">
          <div class="loop owl-carousel">
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-01.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 101</h4></a>
                      <span>Marketing</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-04.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 102</h4></a>
                      <span>Branding</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-02.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 103</h4></a>
                      <span>Consulting</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-05.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 104</h4></a>
                      <span>Artwork</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-03.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 105</h4></a>
                      <span>Branding</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-06.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 106</h4></a>
                      <span>Artwork</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-04.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 107</h4></a>
                      <span>Creative</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="{{asset('public/dream/assets/images/portfolio-01.jpg')}}" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 108</h4></a>
                      <span>Consulting</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('dream.inc.footer')

</body>
</html>