

  <script>
    // Make the login box movable
    const loginBox = document.getElementById('loginBox');
    let isDragging = false;
    let offsetX, offsetY;

    loginBox.addEventListener('mousedown', (e) => {
      isDragging = true;
      offsetX = e.clientX - loginBox.offsetLeft;
      offsetY = e.clientY - loginBox.offsetTop;
      loginBox.style.transition = 'none';
    });

    document.addEventListener('mousemove', (e) => {
      if (isDragging) {
        loginBox.style.left = `${e.clientX - offsetX}px`;
        loginBox.style.top = `${e.clientY - offsetY}px`;
      }
    });

    document.addEventListener('mouseup', () => {
      isDragging = false;
      loginBox.style.transition = 'all 0.3s ease';
    });
  </script>