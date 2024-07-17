
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PropertyPro | Real Estate</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Type</label>
              <select class="form-control form-select form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="city">City</label>
              <select class="form-control form-select form-control-a" id="city">
                <option>All Cities</option>
                <option>Nairobi</option>
                <option>Mombasa</option>
                <option>Kisumu</option>
                <option>Kiambu</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bedrooms">Bedrooms</label>
              <select class="form-control form-select form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="garages">Garages</label>
              <select class="form-control form-select form-control-a" id="garages">
                <option>Any</option>
                <option>None</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">Bathrooms</label>
              <select class="form-control form-select form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="price">Min Price</label>
              <select class="form-control form-select form-control-a" id="price">
                <option>Unlimited</option>
                <option>Ksh.50,000</option>
                <option>Ksh.100,000</option>
                <option>Ksh.150,000</option>
                <option>Ksh.200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{ url('/welcome') }}">Property<span class="color-b">Pro</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/welcome') }}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ url('/property-grid') }}">Properties</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ url('/agents-grid') }}">Landlords</a>
          </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ url('/about') }}">About Us</a>
        </li>

          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/blog-grid') }}">Blog</a>
          </li>

          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="{{ url('/property-single') }}">Property Single</a>
              <a class="dropdown-item " href="{{ url('/blog-single') }}">Blog Single</a>
              <a class="dropdown-item " href="{{ url('/agents-grid') }}">Agents Grid</a>
              <a class="dropdown-item " href="{{ url('/agent-single') }}">Agent Single</a>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link " href="{{ url('/contact') }}">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="{{ route('login') }}">Login</a>
              <a class="dropdown-item " href="{{ route('register') }}">Register</a>
            </div>
          </li>
        </ul>
      </div>

      <!--<button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button> -->

    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our <span class="color-b">Blogs</span></h1>
              <span class="color-text-a">News </span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Blogs
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Blog Single ======= -->
    <section class="news-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="news-img-box">
              <img src="{{ asset('img/slide-3.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>
          <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="post-information">
              <ul class="list-inline text-center color-a">
                <li class="list-inline-item mr-2">
                  <strong>Author: </strong>
                  <span class="color-text-a">Gideon Kiprotich</span>
                </li>
                <li class="list-inline-item mr-2">
                  <strong>Category: </strong>
                  <span class="color-text-a">Management</span>
                </li>
                <li class="list-inline-item">
                  <strong>Date: </strong>
                  <span class="color-text-a">19 Apr. 2024</span>
                </li>
              </ul>
            </div>
            <div class="post-content color-text-a">
              <p class="post-intro">
                PropertyPro is a real estate platform that helps you find the perfect property for your needs. Whether you're looking to rent, lease, or sell a property, we have you covered. Our platform is easy to use and has a wide selection of properties to choose from. Don't miss out on the opportunity to find your dream property with PropertyPro.
              </p>
              <p>
                Morover we have a wide selection of properties to choose from. Don't miss out on the opportunity to find your dream property with PropertyPro. PropertyPro is a real estate platform that helps you find the perfect property for your needs. Whether you're looking to rent, lease, or sell a property, we have you covered. Our platform is easy to use and has a wide selection of properties to choose from. Don't miss out on the opportunity to find your dream property with PropertyPro.
              </p>
              <p>
                In addition to this, we have a wide selection of properties to choose from. Don't miss out on the opportunity to find your dream property with PropertyPro. PropertyPro is a real estate platform that helps you find the perfect property for your needs. Whether you're looking to rent, lease, or sell a property, we have you covered. Our platform is easy to use and has a wide selection of properties to choose from. Don't miss out on the opportunity to find your dream property with PropertyPro.
              </p>
              <blockquote class="blockquote">
                <p class="mb-4">Good work</p>
                <footer class="blockquote-footer">
                  <strong>Shirley Wetindi</strong>
                  <cite title="Source Title">Author</cite>
                </footer>
              </blockquote>
              <p>
                For more information, visit our website at <a href="https://www.propertypro.co.ke">PropertyPro</a>
              </p>
            </div>
            <div class="post-footer">
              <div class="post-share">
                <span>Share: </span>
                <ul class="list-inline socials">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-linkedin" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="title-box-d">
              <h3 class="title-d">Comments (4)</h3>
            </div>
            <div class="box-comments">
              <ul class="list-comments">
                <li>
                  <div class="comment-avatar">
                    <img src="{{ asset('img/author-2.jpg') }}" alt="">
                  </div>
                  <div class="comment-details">
                    <h4 class="comment-author">Emma Stone</h4>
                    <span>18 June 2024</span>
                    <p class="comment-description">
                      I really like this post. It's very informative and helpful. Keep up the good work.
                    </p>
                    <a href="3">Reply</a>
                  </div>
                </li>
                <li class="comment-children">
                  <div class="comment-avatar">
                    <img src="{{ asset('img/author-1.jpg') }}" alt="">
                  </div>
                  <div class="comment-details">
                    <h4 class="comment-author">Oliver Colmenares</h4>
                    <span>13 July 2024</span>
                    <p class="comment-description">
                      Good work, keep it up.
                    </p>
                    <a href="3">Reply</a>
                  </div>
                </li>
                <li>
                  <div class="comment-avatar">
                    <img src="{{ asset('img/author-2.jpg') }}" alt="">
                  </div>
                  <div class="comment-details">
                    <h4 class="comment-author">Emma Stone</h4>
                    <span>23 May 2024</span>
                    <p class="comment-description">
                      I really like this post. It's very informative and helpful. Keep up the good work.
                    </p>
                    <a href="3">Reply</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="form-comments">
              <div class="title-box-d">
                <h3 class="title-d"> Leave a Reply</h3>
              </div>
              <form class="form-a">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputName">Enter name</label>
                      <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputEmail1">Enter email</label>
                      <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label for="inputUrl">Enter website</label>
                      <input type="url" class="form-control form-control-lg form-control-a" id="inputUrl" placeholder="Website">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label for="textMessage">Enter message</label>
                      <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-a">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Blog Single-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Property<span class="color-b">Pro</span></h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                PropertyPro is a real estate platform that helps you find the perfect property for your needs. Whether you're looking to rent, lease, or sell a property, we have you covered. Our platform is easy to use and has a wide selection of properties to choose from. Don't miss out on the opportunity to find your dream property with PropertyPro.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> propertypro@gmail.com
                </li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +254 356 945234
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The <span class="color-b">Company</span></h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Site Map</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Legal</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Agent Admin</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Careers</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Affiliates</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Quick <span class="color-b">links</span></h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Forum</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Statistics</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Terms and Conditions</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">FAQs</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Get Support</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Become a Member</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">PropertyPro</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">

            Designed by <a href="#">Gideon & Shirley</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>