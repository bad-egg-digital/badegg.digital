<div @php(post_class())>
  <div class="wp-block-list">
    @php(the_content())
  </div>

  @if ($pagination())
    <footer>
      <nav class="page-nav" aria-label="Page">
        {!! $pagination !!}
      </nav>
    </footer>
  @endif

  @if(comments_open() || have_comments())
    @php(comments_template())
  @endif
</div>
