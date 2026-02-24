@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => false,
])

@section('block-content')
  @if(get_field('cards'))
    <div class="card-wrap card-wrap-numbered">
      <div class="card-flex">
        @foreach(get_field('cards') as $x => $card)
          <div class="card card-numbered bg-white rounded rounded-small">
            <div class="{{ implode(' ', $listItemClasses) }}">
              <p>{{ $x + 1 }}</p>
            </div>
            <div class="inner inner-small wysiwyg">
              <h3 class="{{ $headingColour }}">{{ $card['heading'] }}</h3>
              <p>{{ $card['text'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif
@overwrite
