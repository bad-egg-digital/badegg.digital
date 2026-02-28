export default function Header() {
  const body = document.querySelector("body");

  document.addEventListener("scroll", () => {
    const scrolled = document.scrollingElement.scrollTop;
    const position = body.offsetTop;
    const header = document.querySelector(".menu-fixed");

    if(!header) return;

    if (scrolled > position + header.offsetHeight) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });
}
