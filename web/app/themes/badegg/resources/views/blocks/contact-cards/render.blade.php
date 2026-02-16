{{-- vars defined in app/View/Composers/Footer.php --}}

@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => false,
])

@section('block-content')
  <div class="card-wrap">
    <div class="card card-contact bg-white rounded">
      <div class="inner-small wysiwyg">
        <h3>{{ __('Ways to get in touch', 'badegg') }}</h3>

        <h4>{{ __('give us a call', 'badegg') }}</h4>
        <p><a href="tel:{{ $company_tel }}">{{ $company_tel }}</a></p>

        <h4>{{ __('send us a note', 'badegg') }}</h4>
        <p><a href="mailto:{{ $company_email }}">{{ $company_email }}</a></p>

        <h4>{{ __('mailing address', 'badegg') }}</h4>
        {!! apply_filters('the_content', $company_address_mailing) !!}

        <h4>{{ __('connect with us', 'badegg') }}</h4>
        @include('components.socials')

      </div>
    </div>
    <div class="card card-contact bg-white rounded">
      <div class="inner-small wysiwyg">
        <h3>{{ __('Where to find us', 'badegg') }}</h3>

        <h4>{{ __('our location', 'badegg') }}</h4>
        {!! apply_filters('the_content', $company_address) !!}

        @while(have_rows('badegg_company_meetings', 'option')) @php(the_row())
          <h4>{{ get_sub_field('heading') }}</h4>
          <p>{{ get_sub_field('description') }}</p>
          <p><a href="{{ get_sub_field('link')['url'] }}" class="btn tertiary full" target="{{ get_sub_field('link')['target'] }}">{{ get_sub_field('link')['title'] }}</a></p>
        @endwhile

      </div>
    </div>

    @if($company_mailing_list)
      <div class="card card-contact bg-white rounded">
        <div class="inner-small wysiwyg">
          {!! apply_filters('the_content', $company_mailing_list) !!}
        </div>
      </div>
    @endif

  </div>
@overwrite
