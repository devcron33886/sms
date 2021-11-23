@extends('layouts.front')
@section('content')
<section class="content">
    <div class="error-page">
      <h2 class="headline text-warning"> 404</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

        <p>
          We could not find the page you were looking for.
          Meanwhile, you may <a href="{{ route('admin.home')}}">return to dashboard</a> or try using the search form.
        </p>

      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
@endsection