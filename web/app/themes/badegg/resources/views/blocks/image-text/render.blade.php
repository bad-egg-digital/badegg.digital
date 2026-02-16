@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="image-text-cols{{ get_field('stacked_image_first') ? ' stacked-image-first' : null }}{{ get_field('columns_image_first') ? ' columns-image-first' : null }}{{ get_field('stacked_image_hide') ? ' stacked-image-hide' : null }}">
    <div class="image-text-col image-text-text inner inner-zero-x image-text-image-{{ get_field('text_width') }}">
      <h{{ get_field('hsize') }} class="mini tertiary-dark">{{ get_field('h1') }}</h{{ get_field('hsize') }}>
      <h{{ ((int)get_field('hsize') + 1) }} class="subhead subhead-big">{{ get_field('h2') }}</h{{ ((int)get_field('hsize') + 1) }}>
      <div class="blurb wysiwyg">
        {!! apply_filters('the_content', get_field('blurb')) !!}
      </div>
    </div>

    <div class="image-text-col image-text-image image-text-image-{{ get_field('image_width') }}">
      @include('components.image', ['id' => get_field('image')])
    </div>
  </div>
@overwrite
