<div class="section-small section-zero-bottom testimonial">
  <div class="testimonial-wrap">
    <div class="testimonial-inner">
      <blockquote>
        <h2 class="testimonial-intro section-title">{{ $post->post_excerpt }}</h2>
        <div class="testimonial-body wysiwyg">
          {!! apply_filters('the_content', $post->post_content) !!}
        </div>
      </blockquote>

      <div class="testimonial-author">
        <p class="testimonial-author-name"><cite>{{ get_field('testimonial_author_name', $post) }}</cite></p>
        <p class="testimonial-author-title">{{ get_field('testimonial_author_title', $post) }}</p>
      </div>
    </div>
  </div>
</div>
