export default function MenuMobile()
{
  const body = document.querySelector("body");
  const menuToggle = document.querySelector(".js-menu-toggle");
  const offCanvas = document.querySelector(".menu-off-canvas");
  const wrapper = document.querySelector(".wrapper");

  if(!menuToggle) return;

  menuToggle.addEventListener("click", (e) => {
    e.preventDefault();
    body.classList.toggle("menu-open");

    if(body.classList.contains("menu-open")) {
      offCanvas.setAttribute("aria-hidden", false);
    } else {
      offCanvas.setAttribute("aria-hidden", true);
    }
  });

  addEventListener("resize", () => offset());
  addEventListener("load", () => offset());

  wrapper.addEventListener("click", (e) => {
    body.classList.remove("menu-open");
    offCanvas.setAttribute("aria-hidden", true);
  });

  document.addEventListener("keyup", function (event) {
    if (event.key === "Escape") {
      body.classList.remove("menu-open");
      offCanvas.setAttribute("aria-hidden", true);
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
