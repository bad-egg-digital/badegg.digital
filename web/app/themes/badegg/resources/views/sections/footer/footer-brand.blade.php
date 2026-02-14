<div class="menu-item-logo-footer bg-black knockout">
  {!! $logo !!}
  {!! $sticker_shape !!}

  <img
    class="lazy"
    src="{{ Vite::asset('resources/images/bg-texture-square-lazy.jpg') }}"
    data-src="{{ Vite::asset('resources/images/bg-texture-square-1x.jpg') }}"
    data-srcset="{{ Vite::asset('resources/images/bg-texture-square-1x.jpg') }} 1x, {{ Vite::asset('resources/images/bg-texture-square-2x.jpg') }} 2x"
    width="200"
    height="200"
    alt="purpley-red texture"
    loading="lazy"
  />
</div>
