export default function Header() {
  const body = document.querySelector("body");

  document.addEventListener("scroll", () => {
    const scrolled = document.scrollingElement.scrollTop;
    const position = body.offsetTop;
    const header = document.querySelector(".site-header");

    if(!header) return;

    if (scrolled > position + header.offsetHeight) {
      body.classList.add("scrolled");
    } else {
      body.classList.remove("scrolled");
    }
  });
}
