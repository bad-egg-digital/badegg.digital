@extends('layouts.app')

@section('content')
  <div class="wp-block-list">
    @php
      setup_postdata($post);
      the_content();
      wp_reset_postdata();
    @endphp

    <section class="section section-archive section-archive-{{ $postType->name }} bg-secondary-lightest has-gradient">
      <div class="container container-larger">
        <div class="section-small section-zero-top wysiwyg">
          <h2>{{ __('All ' . $postType->label, 'badegg') }}</h2>
        </div>

        @if(have_posts())
          <div class="card-wrap card-wrap-{{ $postType->name }}">
            <div class="card-flex">
              @while(have_posts()) @php(the_post())
                @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
              @endwhile
            </div>

            {!! get_the_posts_navigation() !!}
          </div>
        @else
          <div class="container container-narrow align-centre">
            <x-alert type="warning">
              {!! __('Sorry, no results were found.', 'sage') !!}
            </x-alert>

            {!! get_search_form(false) !!}
          </div>
        @endif
      </div>
    </section>
  </div>
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
