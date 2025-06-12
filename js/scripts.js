// scripts.js

// Scroll to top button functionality
document.addEventListener('DOMContentLoaded', () => {
    const backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });
        backToTop.addEventListener('click', e => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
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
