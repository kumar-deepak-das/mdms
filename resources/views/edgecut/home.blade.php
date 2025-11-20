<!DOCTYPE html>
<html>

<head>
    @include('edgecut.inc.head')
</head>

<body>

  <div class="hero_area">
    @include('edgecut.inc.header')
    <!-- slider section -->
    <section class="slider_section long_section">
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      For All Your <br>
                      Academic Needs
                    </h1>
                    <p>
                      KIIT, or Kalinga Institute of Industrial Technology, is a private university in Bhubaneswar, Odisha, founded in 1992 by Prof. Achyuta Samanta. It started as an Industrial Training Institute and grew into a multidisciplinary university that is recognized as a "Deemed to be University" by the Indian government. KIIT offers over 200 programs across various fields, including engineering, management, medicine, and law, and is known for its commitment to academic excellence, community outreach, and holistic development.
                    </p>
                    <div class="btn-box">
                      <a href="./contact" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{asset('public/images/KIIT-Logo-lg.png')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      For All Your <br>
                      Academic Needs
                    </h1>
                    <p>
                      KIIT, or Kalinga Institute of Industrial Technology, is a private university in Bhubaneswar, Odisha, founded in 1992 by Prof. Achyuta Samanta. It started as an Industrial Training Institute and grew into a multidisciplinary university that is recognized as a "Deemed to be University" by the Indian government. KIIT offers over 200 programs across various fields, including engineering, management, medicine, and law, and is known for its commitment to academic excellence, community outreach, and holistic development.
                    </p>
                    <div class="btn-box">
                      <a href="./contact" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{asset('public/images/KIIT-Logo-lg.png')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      For All Your <br>
                      Academic Needs
                    </h1>
                    <p>
                      KIIT, or Kalinga Institute of Industrial Technology, is a private university in Bhubaneswar, Odisha, founded in 1992 by Prof. Achyuta Samanta. It started as an Industrial Training Institute and grew into a multidisciplinary university that is recognized as a "Deemed to be University" by the Indian government. KIIT offers over 200 programs across various fields, including engineering, management, medicine, and law, and is known for its commitment to academic excellence, community outreach, and holistic development.
                    </p>
                    <div class="btn-box">
                      <a href="./contact" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{asset('public/images/KIIT-Logo-lg.png')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel" data-slide-to="1"></li>
          <li data-target="#customCarousel" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  @include('edgecut.inc.footer')

</body>

</html>