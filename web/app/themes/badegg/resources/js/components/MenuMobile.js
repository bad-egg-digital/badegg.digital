export default function MenuMobile()
{
  const body = document.querySelector("body");
  const menuToggle = document.querySelector(".js-menu-toggle");
  const wrapper = document.querySelector(".wrapper");

  if(!menuToggle) return;

  menuToggle.addEventListener("click", (e) => {
    e.preventDefault();
    body.classList.toggle("menu-open");
  });

  addEventListener("resize", () => offset());
  addEventListener("load", () => offset());

  wrapper.addEventListener("click", (e) => {
    body.classList.remove("menu-open");
  });

  document.addEventListener("keyup", function (event) {
    if (event.key === "Escape") {
      body.classList.remove("menu-open");
    }
  });

}

function offset()
{
  const body = document.querySelector("body");
  const mobileMenu = document.querySelector(".menu-mobile-container");
  const canvaseMenu = document.querySelector(".menu-off-canvas");

  if(!mobileMenu) return;

  const mobileMenuHeight = mobileMenu.offsetHeight;
  body.style.paddingBottom = mobileMenuHeight + 'px';
  canvaseMenu.style.paddingBottom = mobileMenuHeight + 'px';
}
