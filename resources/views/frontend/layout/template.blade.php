<!DOCTYPE html>
<html lang="en">
  <head>
    @include('frontend.includes.header')
    @include('frontend.includes.css')
  </head>

  <body class="cnt-home">
    <header class="header-style-1"> 
      @include('frontend.includes.topbar')
      @include('frontend.includes.menubar')
    </header>
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
      <div class="container">
        <div class="row single-product"> 
          @include('frontend.includes.sidebar')
          @yield('body')
        </div>
      </div>
    </div>
    @include('frontend.includes.footer')
    @include('frontend.includes.scripts')
  </body>
</html>