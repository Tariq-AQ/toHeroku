@extends ('layouts.app')
@section ('page_title')
    Guestbook | Comment from {{ $comment -> name }}
@endsection
@section ('page_heading')
    Comment from {{ $comment -> name }}
@endsection
@section ('content')
    <div class="box">
      <table class="table is-striped">
        {{ $comment -> comment }}
      </table>
    </div>
    <p>
      <a class="button" href="/">Back</a>
    </p>
@endsection
