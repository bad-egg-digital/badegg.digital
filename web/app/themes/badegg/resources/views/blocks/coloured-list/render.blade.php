@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => false,
])

@section('block-content')
  @if(have_rows('list'))
    <div class="coloured-list container-{{ get_field('container_width') }}">
      @while(have_rows('list')) @php(the_row())
        <div class="{{ implode(' ', $listItemClasses) }}">
          <div class="inner inner-small wysiwyg">
            <h3>{{ get_sub_field('heading') }}</h3>
            <p>{{ get_sub_field('text') }}</p>
          </div>
        </div>
      @endwhile
    </div>
  @endif
@overwrite
