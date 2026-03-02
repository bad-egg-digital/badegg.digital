@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="latest-post-cols">

    <div class="latest-post-col latest-post-image">
      @include('components.image', [
        'id' => get_post_thumbnail_id($latestPostID),
        'lazy' => get_field('image_lazy'),
        'srcset' => true,
        'size' => 'natural',
        'class' => 'rounded',
      ])
    </div>

    <div class="latest-post-col latest-post-content inner inner-zero-x">
      @if(get_field('h1'))
        <h1 class="mini {{ $CssClasses->ColourTintClass(get_field('colour'), get_field('tint')) }}">{{ get_field('h1') }}</h1>
      @endif
      <h2 class="subhead subhead-big">{{ $latestPost->post_title }}</h2>
      <p class="subtitle">@if($latestPostCategory) {{ $latestPostCategory->name }}  @endif <span>{{ __('by', 'badegg') }}</span> {{ get_the_author_meta('display_name', $latestPost->post_author) }}</p>
      @if($latestPost->post_excerpt)
        <div class="blurb wysiwyg">
          {!! apply_filters('the_content', $latestPost->post_excerpt) !!}

          <div class="btn-wrap">
            @include('components.button', [
              'link' => [
                'title' => get_field('permalink_text') ?: __('continue reading', 'badegg'),
                'url' => get_the_permalink($latestPostID),
              ],
              'colour' => 'tertiary',
            ])
          </div>
        </div>
      @endif
    </div>
  </div>
@overwrite
