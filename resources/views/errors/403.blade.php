@extends('layouts.front')
@section('content')
<section class="content">
    <div class="error-page">
      <h2 class="headline text-warning"> 403</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops!.</h3>

        <p>
          Stop right where you are you are in resistricted area.
          Meanwhile, you may use this link <a href="{{ route('admin.home') }}">return to dashboard</a> or try using the search form.
        </p>

      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
@endsection