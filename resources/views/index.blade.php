<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="icon" type="image/svg"href="{{ asset ('images/favicon.svg') }}"/>
<link rel="stylesheet" href="{{ asset ('css/jobshare.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="block">
            <div class="title">Latest jobs</div>
        </div>
    </div>

    <table
    class="table is-striped is-hoverable"
   >
     <thead>
       <th>Job Title</th>
       <th>Description</th>
       <th>Date Posted</th>
     </thead>
     <tbody>
       @foreach ($comments as $c)
         <tr>
           <td>{{ $c -> name }}</td>
           <td>{{ $c -> comment }}</td>
           <td>{{ $c -> created_at }}</td>
         </tr>
         <td>
            <a class="button"
                href="/comment/{{ $c -> id }}/">
                <img src="{{ asset ('images/eye.svg') }}"/></ion-icon>
          </a>
       @endforeach
     </tbody>
   </table>
   <div class="paginationBar">
   {{ $comments -> links () }}
</div>
</body>
</html>
