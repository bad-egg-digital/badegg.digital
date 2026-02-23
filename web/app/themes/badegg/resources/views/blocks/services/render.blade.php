@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  @if($services->have_posts())
    <div class="card-wrap card-wrap-service">
      <div class="card-flex">
        @while($services->have_posts()) @php($services->the_post())
          @include('partials.content-service')
        @endwhile
      </div>
    </div>
    @php(wp_reset_postdata())
  @endif
@overwrite
