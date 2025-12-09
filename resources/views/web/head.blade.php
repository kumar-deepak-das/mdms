
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RevieweLogin Page</title>
  <style>
    /* Background styling */
    body {
      margin: 0;
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0,0,0,0.6)), url('public/assets/images/bg/bg-admin.jpeg') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }

    /* Blur overlay */
    body::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      /*backdrop-filter: blur(8px);*/
      background: rgba(0, 0, 0, 0.4);
      top: 0;
      left: 0;
      z-index: 0;
    }

    /* Login box */
    .login-box {
      position: absolute;
      width: 350px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      text-align: center;
      color: #fff;
      cursor: move;
      animation: floatIn 1.2s ease-out;
      z-index: 1;
    }

    /* Profile image */
    .login-box img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 20px;
      border: 3px solid rgba(255, 255, 255, 0.7);
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
    }

    /* Common input styling */
    .login-box input,
    .login-box select,
    .login-box button {
      width: 100%;
      height: 45px;
      padding: 0 10px;
      margin: 10px 0;
      border: none;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      font-size: 15px;
      text-align: center;
      outline: none;
      transition: 0.3s;
      box-sizing: border-box;
    }

    /* Remove dropdown arrow */
    .login-box select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-image: none;
      cursor: pointer;
    }

    .login-box option {
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
    }

    /* Input placeholders */
    .login-box input::placeholder {
      color: #eee;
    }

    /* Hover and focus states */
    .login-box input:focus,
    .login-box select:focus {
      background: rgba(255, 255, 255, 0.4);
    }

    /* Button styling */
    .login-box button {
      background: linear-gradient(45deg, #6dd5fa, #2980b9);
      font-weight: bold;
      cursor: pointer;
      letter-spacing: 1px;
    }

    .login-box button:hover {
      background: linear-gradient(45deg, #2980b9, #6dd5fa);
      transform: scale(1.05);
    }

    /* Animation */
    @keyframes floatIn {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .error-box {
      background: rgba(255, 0, 0, 0.25);
      padding: 10px;
      border-radius: 10px;
      margin-bottom: 15px;
      border-left: 3px solid #ff4d4d;
      text-align: left;
    }

    .error-box p {
      margin: 0;
      color: #ffe6e6;
      font-size: 13px;
    }
  </style>