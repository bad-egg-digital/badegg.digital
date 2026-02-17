@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="{{ implode(' ', $classes) }}">
    <div class="{{ implode(' ', $textClasses) }}">
      <h{{ get_field('hsize') }} class="mini tertiary-dark">{{ get_field('h1') }}</h{{ get_field('hsize') }}>
      <h{{ ((int)get_field('hsize') + 1) }} class="subhead subhead-big">{{ get_field('h2') }}</h{{ ((int)get_field('hsize') + 1) }}>
      <div class="blurb wysiwyg">
        {!! apply_filters('the_content', get_field('blurb')) !!}
      </div>
    </div>

    <div class="{{ implode(' ', $imageClasses) }}">
      @include('components.image', ['id' => get_field('image'), 'lazy' => get_field('image_lazy')])
    </div>
  </div>
@overwrite
