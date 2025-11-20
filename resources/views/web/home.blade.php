<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thesis Paper Review System</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f') no-repeat center center/cover;
      color: white;
      overflow-x: hidden;
    }

    /* Sticky Navbar */
    .navbar {
      background: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(10px);
      transition: all 0.4s ease;
    }

    .navbar.scrolled {
      background: rgba(0, 0, 0, 0.9);
      box-shadow: 0 2px 10px rgba(0,0,0,0.5);
    }

    .nav-link {
      color: white !important;
      margin: 0 10px;
      font-weight: 500;
      transition: 0.3s;
    }

    .nav-link:hover {
      color: #00ffcc !important;
      transform: scale(1.1);
    }

    /* Hero Section */
    #home {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      background: rgba(0, 0, 0, 0.5);
      animation: fadeIn 2s ease-in-out;
    }

    #home h1 {
      font-size: 3rem;
      font-weight: 700;
      animation: slideDown 1.5s ease;
    }

    #home p {
      font-size: 1.2rem;
      margin-top: 10px;
      animation: fadeIn 3s ease;
    }

    /* Login Blocks */
    .login-blocks {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 40px;
      margin-top: 40px;
      flex-wrap: wrap;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.1);
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 15px;
      padding: 40px;
      width: 250px;
      text-align: center;
      cursor: pointer;
      color: white;
      transition: all 0.4s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      animation: floatUp 2s ease-in-out infinite alternate;
    }

    .login-card:hover {
      transform: scale(1.1);
      background: rgba(0, 255, 204, 0.2);
    }

    /* About Section */
    #about {
      background: rgba(0, 0, 0, 0.8);
      padding: 80px 20px;
    }

    #about img {
      max-width: 100%;
      border-radius: 20px;
      animation: fadeIn 2s ease;
    }

    #about h2 {
      color: #00ffcc;
      margin-bottom: 20px;
    }

    /* Contact Section */
    #contact {
      background: rgba(0, 0, 0, 0.85);
      padding: 80px 20px;
      text-align: center;
    }

    #contact h2 {
      color: #00ffcc;
      margin-bottom: 30px;
    }

    #contact input, #contact textarea {
      background: rgba(255,255,255,0.1);
      color: white;
      border: 1px solid rgba(255,255,255,0.3);
      border-radius: 8px;
    }

    #contact button {
      background-color: #00ffcc;
      color: black;
      border: none;
      font-weight: 600;
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideDown {
      from { transform: translateY(-50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    @keyframes floatUp {
      from { transform: translateY(0); }
      to { transform: translateY(-10px); }
    }

    footer {
      background: rgba(0, 0, 0, 0.7);
      padding: 15px;
      text-align: center;
      color: white;
      font-size: 0.9rem;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold text-light" href="#home">Thesis Review</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="mt-5">
    <h1>Welcome to Thesis Paper Review System</h1>
    <p>Streamline the process of submitting, reviewing, and approving academic research papers.</p>

    <div class="login-blocks">
      <div class="login-card" onclick="window.location.href='admin-login'">
        <!-- <i class="fas fa-user-shield fa-3x mb-3"></i> -->
        <img src="public/assets/images/icon/admin.png" alt="Admin" class="w-50">
        <h4>Admin<br/>Login</h4>
      </div>
      <div class="login-card" onclick="window.location.href='reviewer-login'">
        <!-- <i class="fas fa-user-edit fa-3x mb-3"></i> -->

        <img src="public/assets/images/icon/reviewer.png" alt="Admin" class="w-50">
        <h4>Reviewer<br/>Login</h4>
      </div>
    </div>
  </section>

  <!-- About Us -->
  <section id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b" alt="About Thesis Review">
        </div>
        <div class="col-md-6">
          <h2>About Us</h2>
          <p>The Thesis Paper Review System simplifies academic paper submission and review workflows, ensuring transparency, efficiency, and collaboration between administrators and reviewers. We are dedicated to maintaining academic integrity and making research evaluation seamless and paperless.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact">
    <div class="container">
      <h2>Contact Us</h2>
      <form class="row justify-content-center">
        <div class="col-md-6">
          <input type="text" class="form-control mb-3" placeholder="Your Name">
          <input type="email" class="form-control mb-3" placeholder="Your Email">
          <textarea class="form-control mb-3" rows="4" placeholder="Your Message"></textarea>
          <button type="submit" class="btn w-100">Send Message</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    © 2025 Thesis Paper Review System | All Rights Reserved
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Navbar Scroll Effect
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>
</body>
</html>
