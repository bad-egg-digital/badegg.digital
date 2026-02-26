@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => false,
])

@section('block-content')
  @if(have_rows('accordions'))
    <div class="accordions-list">
      @while(have_rows('accordions')) @php(the_row())
        <details class="accordions-list-item" @if(get_row_index() == 1) open @endif>
          <summary class="{{ implode(' ', $accordionClasses) }}">
            <h3>{{ get_sub_field('heading') }}</h3>
          </summary>

          <div class="inner inner-smaller wysiwyg bg-white border border-thin border-grey-lightest">
            {!! get_sub_field('text') !!}
          </div>
        </details>
      @endwhile
    </div>
  @endif
@overwrite
