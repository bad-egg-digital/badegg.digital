@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="{{ implode(' ', $classes) }}">
    <div class="{{ implode(' ', $headingClasses) }}">
      <div style="font-size: {{ get_field('heading_scale') }}em;">
        <h{{ get_field('hsize') ?: 2 }} class="{{ implode(' ', $hClasses) }}">
          {!! get_field('heading') !!}
        </h{{ get_field('hsize') ?: 2 }}>
      </div>
    </div>
    <div class="{{ implode(' ', $editorClasses) }}">
      {!! get_field('editor') !!}
    </div>
  </div>
@overwrite
