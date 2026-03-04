@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="{{ implode(' ', $classes) }}">
    <div class="{{ implode(' ', $textClasses) }}">
      @if(get_field('h1'))
        <h{{ $hSizeTiny }} class="mini {{ $CssClasses->ColourTintClass(get_field('colour'), get_field('tint')) }}">{{ get_field('h1') }}</h{{$hSizeTiny }}>
      @endif
      <h{{ $hSize }} class="subhead subhead-big {{ $CssClasses->ColourTintClass(get_field('bg_colour'), get_field('bg_tint')) }}">{{ get_field('h2') }}</h{{ $hSize }}>
      <div class="blurb wysiwyg">
        {!! apply_filters('the_content', get_field('blurb')) !!}
      </div>
    </div>

    <div class="{{ implode(' ', $imageClasses) }}">
      @include('components.image', [
        'id' => get_field('image'),
        'lazy' => get_field('image_lazy'),
        'srcset' => true,
      ])
    </div>
  </div>
@overwrite
