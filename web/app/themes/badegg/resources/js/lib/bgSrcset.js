const screenWidth = window.innerWidth;
const restURL = window.App.restURL;

export async function bgSrcset()
{
  let resizeTimeout;

  bgSrcsetInit();

  window.addEventListener("resize", () => {
    clearTimeout(resizeTimeout);

    resizeTimeout = setTimeout( () => {
      bgSrcsetInit();
    }, 250);
  });
}

function bgSrcsetInit()
{
  const elements = document.querySelectorAll('.bg-srcset');

  elements.forEach(el => {
    if(!el.classList.contains('lazy')) {
      loadOptimalSrc(el)
    }
  });
}

export async function loadOptimalSrc(el)
{
  const id = el.dataset.id;

  if(!id) return;

  const size = el.dataset.size;

  const thisImage = el.style.backgroundImage.slice(4, -1).replace(/"/g, "");
  const biggestWidth = Number(el.dataset.width);

  const multipliers = {
    xs: 0.20833333,
    sm: 0.33333333,
    md: 0.52083333,
    lg: 0.75,
    xl: 1,
  };

  const sizes = ['xs', 'sm', 'md', 'lg', 'xl'];
  const sizeCount = sizes.length;

  const srcsets = await get_srcset(id, size).then( srcset => {
    return srcset;
  });

  let newSizeKey = 'xs';
  let x = 0;

  sizes.forEach( size => {
    const prevKey = (x > 0) ? sizes[x - 1] : null;
    const thisWidth = Math.round(multipliers[size] * biggestWidth);
    const prevWidth = (prevKey) ? Math.round(multipliers[prevKey] * biggestWidth) : 0;

    if(prevWidth <= screenWidth && screenWidth <= thisWidth) {
      newSizeKey = size;
    }

    x++;
  });

  const newSrcset = srcsets[newSizeKey];

  // only swap image url if they do not already match
  if(newSrcset.url !== thisImage) {
    el.style.backgroundImage = `url('${newSrcset.url}')`;
    console.log(`Image ${id} swapped to ${newSrcset.width}x${newSrcset.height} source.`);
  }

}

export async function get_srcset(id = 0, size = 'hero')
{
  if(!id || !restURL) return;

  const response = await fetch( `${restURL}badegg/v1/image/${id}/srcset/${size}`);

  if(!response.ok) {
    throw new Error(`HTTP error. Status: ${response.status}`);
  }

  const data = await response.json();
  return data;
}

