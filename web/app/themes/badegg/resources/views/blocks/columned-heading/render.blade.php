@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="{{ implode(' ', $classes) }}">
    <div class="{{ implode(' ', $headingClasses) }}">
      @if(get_field('tiny_title'))
        <h{{ $hSizeTiny }} class="mini"><span class="tertiary-lighter">{!! get_field('tiny_title') !!}</span></h{{ $hSizeTiny }}>
      @endif
      <div style="font-size: {{ get_field('heading_scale') }}em;">
        <h{{ $hSize }} class="{{ implode(' ', $hClasses) }}">
          {!! get_field('heading') !!}
        </h{{ $hSize }}>
      </div>
    </div>
    <div class="{{ implode(' ', $editorClasses) }}">
      {!! get_field('editor') !!}
    </div>
  </div>
@overwrite
