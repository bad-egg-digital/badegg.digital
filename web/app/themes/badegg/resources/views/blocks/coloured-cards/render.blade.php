@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => false,
])

@section('block-content')
  @if($cards)
    <div class="card-wrap card-wrap-coloured">
      @foreach($cards as $card)

      <div class="{{ implode(' ', \App\View\Composers\BlockColouredCards::cardClasses($card)) }}">
        <div class="card-coloured-heading inner inner-small wysiwyg">
          <h3>{{ $card['heading'] }}</h3>
        </div>
        <div class="card-coloured-text inner inner-small">
          {!! apply_filters('the_content', $card['text']) !!}
        </div>

        @if($card['texture'])
          <div class="bg-image bg-filter-multiply lazy-bg" data-bg="{{ Vite::asset('resources/images/bg-blur-' . $card['colour'] . '.jpg') }}" style="opacity: 0.5"></div>
        @endif
      </div>

      @endforeach
    </div>
  @endif
@overwrite
