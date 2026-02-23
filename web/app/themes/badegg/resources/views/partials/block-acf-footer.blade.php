@if(@$props['blurb'] || @$props['links'])
  @php
    $containerProps = [
      'width' => $settings['container_width'],
      'location' => 'block-intro inner inner-top',
      'align' => $props['align'],
      'section' => true,
    ];

    $innerContainerProps = [
      'width' => $props['container_width'],
      'location' => 'block-footer-inner',
      'wysiwyg' => true,
    ];
  @endphp

  <div class="{{ implode(' ', $CssClasses->container($containerProps, @$settings)) }}">
    <div class="{{ implode(' ', $CssClasses->container($innerContainerProps)) }}">
      {!! apply_filters('the_content', $props['blurb']) !!}

      @if(@$props['links'])
        <p class="btn-wrap">
          @foreach($props['links'] as $link)
            @include('components.button', $link)
          @endforeach
        </p>
      @endif

    </div>
  </div>

@endif


