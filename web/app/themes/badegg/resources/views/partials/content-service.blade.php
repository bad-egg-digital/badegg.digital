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

  @if($textureBG)
    <div class="bg-image bg-filter-multiply lazy-bg" data-bg="{{ $textureBG }}" style="opacity: 0.5"></div>
  @endif

</div>
