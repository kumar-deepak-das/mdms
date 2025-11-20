<!DOCTYPE html>
<html>

<head>
    @include('edgecut.inc.head')
</head>

<body>

  <div class="hero_area">
    @include('edgecut.inc.header')  
    <!-- about section -->

  <section class="about_section layout_padding long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{asset('public/theme/images/about-img.png')}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              KIIT, or Kalinga Institute of Industrial Technology, is a private university in Bhubaneswar, Odisha, founded in 1992 by Prof. Achyuta Samanta. It started as an Industrial Training Institute and grew into a multidisciplinary university that is recognized as a "Deemed to be University" by the Indian government. KIIT offers over 200 programs across various fields, including engineering, management, medicine, and law, and is known for its commitment to academic excellence, community outreach, and holistic development.
            </p>
            <a href="https://kiit.ac.in" target="_blank">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->  
  </div>

  


  @include('edgecut.inc.footer')

</body>

</html>