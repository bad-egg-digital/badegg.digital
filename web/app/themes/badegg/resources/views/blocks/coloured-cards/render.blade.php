@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => false,
])

@section('block-content')
  @if($cards)
    <div class="card-wrap card-wrap-coloured">
      <div class="card-flex">
        @foreach($cards as $card)

        <div class="{{ implode(' ', \App\View\Composers\BlockColouredCards::cardClasses($card)) }}">
          <div class="card-coloured-heading inner wysiwyg">
            <h3>{{ $card['heading'] }}</h3>
          </div>
          <div class="card-coloured-text inner">
            {!! apply_filters('the_content', $card['text']) !!}
          </div>

          @if($card['texture'])
            <div
              class="bg-image bg-srcset bg-filter-multiply lazy"
              style="
                opacity: {{ (@$card['texture_opacity'] ?: 50) * 0.01 }};
                background-image: url('{{ @wp_get_attachment_image_src($card['texture'], (($is_preview) ? 'natural' : 'lazy'))[0] }}')
              "
              data-id="{{ $card['texture'] }}"
              data-name="natural"
              data-sizes="5"
            ></div>
          @endif
        </div>

        @endforeach
      </div>
    </div>
  @endif
@overwrite
