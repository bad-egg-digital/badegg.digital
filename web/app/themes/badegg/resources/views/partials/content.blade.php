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
    <h2 class="entry-title">{!! $title !!}</h2>

    @include('partials.entry-meta')

    @php(the_excerpt())
  </div>
  <footer class="card-footer card-{{ get_post_type() }}-footer inner inner-unset-top wysiwyg">
    @include('components.button', [
      'link' => [
        'url' => get_the_permalink(),
        'title' => __('continue reading', 'badegg'),
      ],
      'colour' => 'tertiary',
    ])

  </footer>
  <a class="link-overlay" href="{{ get_permalink() }}"><span class="visually-hidden">{{ __('Continue reading', 'badegg') }}</span></a>
</article>
