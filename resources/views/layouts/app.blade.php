<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>
      @yield ('page_title', 'Guestbook')
  </title>
  <!-- Stylesheets here -->
</head>
<body>
<div class="container">
    <h1 class="title">
        @yield ('page_heading', 'Guestbook')
    </h1>
    @yield ('content')
</div>
<!-- Scripts here -->
</body>
</html>
