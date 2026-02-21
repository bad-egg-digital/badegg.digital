<div class="person inner inner-zero-x">
  <div class="person-image">
    @include('components.image', [
      'id' => get_post_thumbnail_id($post),
      'lazy' => true,
      'size' => 'medium',
      'class' => '',
    ])

    <h3 class="{{ $hcolour }}">{{ get_the_title($post) }}</h3>
  </div>
  <div class="person-content inner-small inner-zero-x">
    <h4 class="person-intro section-title">{{ $post->post_excerpt }}</h4>
    <div class="person-body wysiwyg">
      {!! apply_filters('the_content', $post->post_content) !!}
    </div>

    <div class="person-author">
      <p class="person-author-name"><cite>{{ get_field('person_author_name', $post) }}</cite></p>
      <p class="person-author-title">{{ get_field('person_author_title', $post) }}</p>
    </div>
  </div>
</div>
