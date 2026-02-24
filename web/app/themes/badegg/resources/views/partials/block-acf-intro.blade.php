@if(@$props['heading'] || @$props['blurb'])
  @php
    $containerProps = [
      'width' => $settings['container_width'],
      'location' => 'block-intro inner inner-bottom',
      'align' => $props['align'],
    ];

    $innerContainerProps = [
      'width' => $props['container_width'],
      'location' => 'block-intro-inner',
      'wysiwyg' => true,
    ];
  @endphp

  <div class="{{ implode(' ', $CssClasses->container($containerProps, @$settings)) }}">
    <div class="{{ implode(' ', $CssClasses->container($innerContainerProps)) }}">
      @if($props['heading']) <h2>{{ $props['heading'] }}</h2> @endif
      {!! apply_filters('the_content', $props['blurb']) !!}
    </div>
  </div>

@endif
