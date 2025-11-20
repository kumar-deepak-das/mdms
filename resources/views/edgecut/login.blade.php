<!DOCTYPE html>
<html>

<head>
    @include('edgecut.inc.head')
</head>

<body>

  <div class="hero_area">
    @include('edgecut.inc.header')

    <section class="blog_section contact_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-8 mx-auto">
            <div class="box">
              <div class="detail-box">
                <div class="form_container p-3">
                  <div class="heading_container">
                    <h2> Login </h2>
                  </div>
                  <form action="" method="post">
                    @csrf
                    <div>
                      <input type="email" name="email" placeholder="Email ID" />
                    </div>
                    <div>
                      <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="btn_box">
                      <input type="submit" class="btn btn-success text-white" value="Login" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  @include('edgecut.inc.footer')

  @include('edgecut.inc.success-error-modal')

</body>

</html>