
<!-- info section -->
<section class="info_section long_section d-none">

  <div class="container">
    <div class="contact_nav">
      <a href="">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <span>
          Call : {{env('APP_PHONE')}}
        </span>
      </a>
      <a href="">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <span>
          Email : {{env('APP_EMAIL')}}
        </span>
      </a>
      <a href="">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <span>
          Location
        </span>
      </a>
    </div>

    <div class="info_top ">
      <div class="row ">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="info_links">
            <h4>
              QUICK LINKS
            </h4>
            <div class="info_links_menu">
              <a class="" href="./home">Home <span class="sr-only">(current)</span></a>
              <a class="" href="./about"> About</a>
              <a class="" href="./contact">Contact Us</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
          <div class="info_post">
            <h5>
              INSTAGRAM FEEDS
            </h5>
            <div class="post_box">
              <div class="img-box">
                <img src="{{asset('public/theme/images/f1.png')}}" alt="">
              </div>
              <div class="img-box">
                <img src="{{asset('public/theme/images/f2.png')}}" alt="">
              </div>
              <div class="img-box">
                <img src="{{asset('public/theme/images/f3.png')}}" alt="">
              </div>
              <div class="img-box">
                <img src="{{asset('public/theme/images/f4.png')}}" alt="">
              </div>
              <div class="img-box">
                <img src="{{asset('public/theme/images/f5.png')}}" alt="">
              </div>
              <div class="img-box">
                <img src="{{asset('public/theme/images/f6.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info_form">
            <h4>
              SIGN UP TO OUR NEWSLETTER
            </h4>
            <form action="">
              <input type="text" placeholder="Enter Your Email" />
              <button type="submit">
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end info_section -->

<!-- footer section -->
<footer class="footer_section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p> &copy; <span id="displayYear"></span> All Rights Reserved By <a href="https://kiit.ac.in/">KIIT Deamed to be University</a></p>
      </div>
      <div class="col-md-6">
        <p><span id="displayYear1"></span> Developed and Maintained By <a href="https://OdishaAIMS.com/">OdishaAIMS</a></p>
      </div>
    </div>
  </div>
</footer>
<!-- footer section -->


<!-- jQery -->
<script src="{{asset('public/theme/js/jquery-3.4.1.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('public/theme/js/bootstrap.js')}}"></script>
<!-- custom js -->

<script src="{{asset('public/theme/js/slick.min.js')}}"></script>
<script src="{{asset('public/theme/js/custom.js')}}"></script>
<!-- Google Map -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script> -->
  <!-- End Google Map -->