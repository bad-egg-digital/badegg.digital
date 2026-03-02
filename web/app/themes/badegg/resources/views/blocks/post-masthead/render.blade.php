<div {!! get_block_wrapper_attributes() !!}>
  <h1 class="masthead-heading">{{ $title ?: '[Post Title]' }}</h1>
  <p class="masthead-subtitle">{{ get_field('post_subtitle', get_the_ID()) }}</p>
  <p class="entry-meta masthead-byline">
    {{ @$firstTerm->name ?: '[Category]' }}
    {{ __('by', 'badegg') }}
    {{ get_the_author_meta('display_name') }}
  </p>
</div>
