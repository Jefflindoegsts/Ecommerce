document.addEventListener('DOMContentLoaded', function () {
  const slider = document.querySelector('.slider');
  const slides = document.querySelectorAll('.slide');
  const prev = document.querySelector('.prev');
  const next = document.querySelector('.next');
  const totalSlides = slides.length;
  let currentIndex = 0;

  function showSlide(index) {
    currentIndex = (index + totalSlides) % totalSlides; 
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  next.addEventListener('click', () => {
    showSlide(currentIndex + 1);
  });

  prev.addEventListener('click', () => {
    showSlide(currentIndex - 1);
  });
});

  document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('header nav');

    menuToggle.addEventListener('click', () => {
      nav.classList.toggle('active');
    });
  });

 document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-saiba').forEach(botao => {
      botao.addEventListener('click', (e) => {
        e.stopPropagation(); 
        const desc = botao.nextElementSibling;
        if(desc.style.display === 'block'){
          desc.style.display = 'none';
        } else {
          desc.style.display = 'block';
        }
      });
    });
  });



