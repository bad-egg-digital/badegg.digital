@php
  $settings = get_field('settings');

  $sectionProps = [
    'class' => implode(' ', $CssClasses->section(get_field('settings'), @$block['name'], @$knockout)),
  ];

  $containerProps = [
    'width' => @$settings['container_width'],
  ];
@endphp

<div id="{{ @$block['anchor'] ?: $block['id'] }}" @if($is_preview) class="{{ $sectionProps['class'] }}" @else {!! get_block_wrapper_attributes($sectionProps) !!} @endif>

  @include('partials.block-acf-intro', [
    'props' => get_field('intro'),
    'settings' => $settings,
  ])

  <div class="{{ implode(' ', $CssClasses->container($containerProps)) }}">
    @yield('block-content')
  </div>

  @include('partials.block-acf-footer', [
    'props' => get_field('footer'),
    'settings' => $settings,
  ])

  @if(@get_field('settings')['bg_image'])
    <div @foreach($CssClasses->backgroundAtts(get_field('settings')) as $att => $value) {{ $att }}="{{ $value }}" @endforeach /></div>
  @endif

  @include('components.block-angle', [ 'position' => 'top', 'props' => get_field('settings') ])
  @include('components.block-angle', [ 'position' => 'bottom', 'props' => get_field('settings') ])

</div>
