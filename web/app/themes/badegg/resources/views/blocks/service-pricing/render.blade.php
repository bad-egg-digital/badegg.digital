@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  @if($pricing_tiers)
    <div class="card-wrap card-service-tier-wrap">
      <div class="card-flex card-service-tier-flex">
        @foreach($pricing_tiers as $x => $props)
          @php($props['x'] = $x)
          @include('partials.content-service-tier', $props)
        @endforeach
      </div>
    </div>
  @endif
@overwrite
