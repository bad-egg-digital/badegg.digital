<div class="wp-block-list">
  @php(the_content())
</div>

@if ($pagination())
  <nav class="page-nav" aria-label="Page">
    {!! $pagination !!}
  </nav>
@endif

@php(comments_template())
