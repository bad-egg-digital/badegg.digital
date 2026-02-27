<div class="{{ implode(' ', $cardClasses) }}">
  <div class="card-service-heading inner wysiwyg">
    <div class="card-service-rotate inner-small inner-top">
      <h2>{{ get_field('service_card_name', get_the_ID()) }}</h2>
      <h3>{!! get_the_title() !!}</h3>
    </div>
  </div>
  <div class="card-service-quote inner wysiwyg">
    <p>{{ get_field('service_card_quote', get_the_ID()) }}</p>
  </div>
  <div class="card-service-content inner wysiwyg">
    {{ the_excerpt() }}
  </div>
  <div class="card-service-link inner inner-unset-top">
    <a href="{{ get_the_permalink() }}" class="btn outline">
      {{ get_field('service_card_cta', get_the_ID()) }}
    </a>
  </div>

  @if(get_field('texture', get_the_ID()))
    <div class="bg-image bg-filter-multiply lazy" style="opacity: {{ (get_field('texture_opacity') ?: 50) * 0.01 }}; background-image: url('{{ @wp_get_attachment_image_src(get_field('texture', get_the_ID()), ((is_admin()) ? 'large' : 'lazy'))[0] }}')" data-id="{{ get_field('texture', get_the_ID()) }}"></div>
  @endif

</div>
