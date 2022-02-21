const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  const navlinks = document.querySelectorAll('.nav-links li');

  burger.addEventListener('click', () => {
    //Toggle NAV
    nav.classList.toggle('nav-active');

    //Animate Links
    navlinks.forEach((link, index) => {
      if (link.style.animation){
        link.style.animation = '';
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.2}s`;
      }
      // console.log(index / 5 + 0.2);
    });

    //Burger animation
    burger.classList.toggle('toggle');
  });



}

navSlide();
