@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="columned-device-cols">
    <div class="columned-device-col columned-device-col-text wysiwyg">
      <div style="font-size: {{ get_field('heading_scale') }}em">
        <h2 class="section-title @if(get_field('colour')) {{ $CssClasses->ColourTintClass(get_field('colour'), get_field('tint')) }} @endif">{!! get_field('heading') !!}</h2>
      </div>
      {!! get_field('editor') !!}
    </div>
    <div class="columned-device-col columned-device-col-device">
      @if(get_field('device_screen'))
        <div class="columned-device-wrap">
          @if($is_preview)
            <img src="{{ Vite::asset('resources/images/laptop-air-600.png') }}" class="device-img" width="600" height="374" alt="Macbook Air" />
          @else
            <img
              src="{{ Vite::asset('resources/images/laptop-air-lazy.png') }}"
              alt="Macbook Air"
              class="device-img lazy"
              width="600"
              height="374"
              data-src="{{ Vite::asset('resources/images/laptop-air-300.png') }}"
              data-srcset="{{ Vite::asset('resources/images/laptop-air-300.png') }} 300w, {{ Vite::asset('resources/images/laptop-air-600.png') }} 600w, {{ Vite::asset('resources/images/laptop-air-900.png') }} 900w, {{ Vite::asset('resources/images/laptop-air-1200.png') }} 1200w"
            />
          @endif

          <div class="columned-device-screen bg-black @if(get_field('device_scrollable')) scrollable @endif">
            @include('components.image', ['id' => get_field('device_screen'), 'size' => 'natural', 'srcset' => true, 'lazy' => false])
          </div>
        </div>
      @endif
    </div>
  </div>
@overwrite
