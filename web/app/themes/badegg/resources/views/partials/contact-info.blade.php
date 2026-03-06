<ul @if(@$class) class="{{ $class }}" @endif>
  <li><a href="tel:{{ $company_tel }}">{{ $company_tel }}</a></li>
  <li><a href="mailto:{{ $company_email }}">{{ $company_email }}</a></li>
  <li>@include('components.socials')</li>
</ul>
