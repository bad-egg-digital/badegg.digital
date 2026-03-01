@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="columned-cta-cols">
    <div class="columned-cta-col columned-cta-col-text wysiwyg">
      <h2>{!! get_field('heading') !!}</h2>
      {!! get_field('editor') !!}
    </div>
    <div class="columned-cta-col columned-cta-col-cta cta-align-is-{{ get_field('cta_align') }}">
      {!! do_shortcode('[arrow_cta direction="' . get_field('cta_align') . '" angle="'. get_field('cta_angle') .'"]' . get_field('cta_text') . '[/arrow_cta]') !!}
    </div>
  </div>
@overwrite
