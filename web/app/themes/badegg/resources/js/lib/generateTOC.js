export default function generateTOC(toc, content, heading = 'In this article:')
{
  if(!toc || !content) return;

  const hTwos = content.querySelectorAll('h2');

  if(hTwos.length < 1) return;

  let tocHTML = '';

  tocHTML = `
    <div class="generated-toc">
      <h3 class="section-title">${heading}</h3>`;

  tocHTML += `
        <ul class="nolist">`;

  for(let index = 0; index < hTwos.length; index++) {
    let hTwo = hTwos[index];
    let hTwoContent = hTwo.textContent;
    let hTwoSlug = hTwoContent.replace(/\W/g, '-').toLowerCase();

    hTwo.classList.add(hTwoSlug);

    hTwo.insertAdjacentHTML('beforebegin', `
      <a class="toc-anchor" id="${ hTwoSlug }"></a>
    `);

    tocHTML += `
          <li><a href="#${ hTwoSlug }">${ hTwoContent }</a></li>`;
  }

  tocHTML += `
      </ul>
    </div>`;

  toc.insertAdjacentHTML('afterbegin', tocHTML);
}
