          let currentImage = 0;
          const images = document.querySelectorAll('.carousel-img');
          const totalImages = images.length;
      
          function showImage(index) {
            images.forEach(img => img.classList.remove('active'));
            images[index].classList.add('active');
          }
      
          function nextImage() {
            currentImage = (currentImage + 1) % totalImages;
            showImage(currentImage);
          }
      
          function previousImage() {
            currentImage = (currentImage - 1 + totalImages) % totalImages;
            showImage(currentImage);
          }





    function changeImage(selectedConsole) {
      var image = document.getElementById("consoleImage");
      if (selectedConsole === "PS5") {
        image.src = "http://localhost/GameShop/Battlezone/Box/PS5.png";
      } else if (selectedConsole === "Xbox X") {
        image.src = "http://localhost/GameShop/Battlezone/Box/Xbox.png";
      } else if (selectedConsole === "PC") {
        image.src = "http://localhost/GameShop/Battlezone/Box/PC.jpg";
      }
    }
