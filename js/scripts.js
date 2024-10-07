// scripts.js

// Scroll to Top Button
const scrollTopBtn = document.getElementById("scrollTopBtn");

// When the user scrolls down 100px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
scrollTopBtn.addEventListener("click", function(){
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Fullscreen Gallery
const galleryImages = document.querySelectorAll('.gallery img');
const fullscreenGallery = document.getElementById('fullscreenGallery');
const fullscreenImage = document.getElementById('fullscreenImage');
const closeBtn = document.querySelector('.fullscreen-gallery .close');

galleryImages.forEach(img => {
    img.addEventListener('click', () => {
        fullscreenGallery.style.display = "block";
        fullscreenImage.src = img.src;
    });
});

closeBtn.addEventListener('click', () => {
    fullscreenGallery.style.display = "none";
});
