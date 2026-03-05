<article @php(post_class(['card', 'card-' . get_post_type(), 'bg-white', 'rounded', 'border', 'border-thin', 'border-grey-lightest']))>
  <header class="card-header card-{{ get_post_type() }}-header">
    @include('components.image', [
      'id' => get_post_thumbnail_id(),
      'size' => 'natural',
      'srcset' => true,
      'lazy' => true,
    ])
  </header>
  <div class="card-content card-{{ get_post_type() }}-content inner wysiwyg">
    <h3 class="entry-title has-subtitle">{!! $metaTitle ?: $title !!}</h3>

    @if(get_post_type() == 'post')
      @include('partials.entry-meta')
    @endif

    @if($metaDescription) {!! apply_filters('the_content', $metaDescription) !!} @else @php(the_excerpt()) @endif
  </div>
  <footer class="card-footer card-{{ get_post_type() }}-footer inner inner-unset-top wysiwyg">
    @include('components.button', [
      'link' => [
        'url' => get_the_permalink(),
        'title' => (get_post_type() == 'post') ? __('continue reading', 'badegg') : __('view ' . get_post_type(), ''),
      ],
      'colour' => 'tertiary',
    ])

  </footer>
  <a class="link-overlay" href="{{ get_permalink() }}"><span class="visually-hidden">{{ __('Continue reading', 'badegg') }}</span></a>
</article>
