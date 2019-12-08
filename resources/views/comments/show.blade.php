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
@section ('content')
<form action = "/comment/{{ $comment -> id }}/edit/" method="POST">
<fieldset>
@csrf
<label>User</label>
<input class="input" type="text"
value="{{ $comment -> name }}" readonly>
<label>Date</label>
<input class="input" type="text"
value="{{ $comment -> updated_at }}" readonly>
<label>Comment</label>
<input class="input" type="text" name="comment"
value="{{ $comment -> comment }}" autofocus>
<button type="submit">Save Changes</button>
</fieldset>
</form>
@endsection
