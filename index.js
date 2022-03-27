//The code Below is used to Toggle the Side Menu from the Menu when in small screen sizes
const sidebar = document.querySelector('.side-nav-links');
const navToggle = document.querySelector('.mobile-nav-toggle');
const body = document.body;

navToggle.addEventListener('click', () => {
  const visibility = sidebar.getAttribute('data-visible');


  if (visibility == "false"){
    sidebar.setAttribute('data-visible', true);
    navToggle.setAttribute('aria-expanded', true);
  } else if (visibility == "true"){
    sidebar.setAttribute('data-visible', false);
    navToggle.setAttribute('aria-expanded', false);
  }
  const sidebaropen = navToggle.getAttribute('aria-expanded');
  // alert(sidebaropen);

  if (sidebaropen == "true")
  {
    body.classList.toggle('noscroll', true);
  }
  else {
    body.classList.toggle('noscroll', false);
  }
});

//This part is only to prevent glitches when resizing a window as it prevents any animation from running
let resizeTimer;
window.addEventListener("resize", () => {
  document.body.classList.add("resize-animation-stopper");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);
});

//This part is where the carousel is being coded for banner
const track = document.querySelector('.banner_track');
const slides =  Array.from(track.children);
const nextButton = document.querySelector('.banner_button--right');
const previousButton = document.querySelector('.banner_button--left');
const bannerNav = document.querySelector('.banner_navigation');
const indicators = Array.from(bannerNav.children);

const slideWidth = slides[0].getBoundingClientRect().width;
// console.log(slideSize);
