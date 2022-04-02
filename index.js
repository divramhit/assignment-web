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

//This part shows us which links are we on---for sub-nav-links only
const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('.sub-nav-links a').forEach(link => {
  if (link.href.includes(`${activePage}`)){
    // link.classList.add('active');

    const btn_navlinks = link.querySelector('div');
    btn_navlinks.classList.add('sub-nav-links-active');
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

// $(window).load(function() {
//   $("body").removeClass("preload");
// });
