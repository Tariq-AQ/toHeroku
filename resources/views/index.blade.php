<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
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
                <!-- <img src="{{ asset ('images/eye.svg') }}"/> --> <ion-icon name="eye"></ion-icon>
          </a>
         </td>
         <td>
            <a class="button"
            href="/comment/{{ $c -> id }}/edit/">
                <ion-icon name="create"></ion-icon>
            </a>
        </td>
        <td>
            <a class="button"
            href="/comment/{{ $c -> id }}/delete/">
             <ion-icon name="trash"></ion-icon>
            </a>
         </td>
       @endforeach
     </tbody>
   </table>
   <div class="paginationBar">
   {{ $comments -> links () }}
</div>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
