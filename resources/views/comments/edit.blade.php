@extends ('layouts.app')
@extends ('comment.php')
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
