<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Blog</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  
</head>
<body>

<main class="container">
@if (session('status'))
     <div class="alert alert-success" role="alert">
    {{ session('status') }}
 </div>
  @endif
@foreach($blog as $blogs)
<?php
$timestamp = strtotime($blogs->created_at);
$date = date('d M Y',$timestamp);
?>
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">{{$blogs->title}}</h1>
      <p class="lead my-3">{{$blogs->description}}</p>
     <p class="lead mb-0"> Posted On: &nbsp; {{$date}}</p>
     
      <form method="post" action="/store_comment">
          @csrf
      <input type="hidden" value="{{$blogs->id}}" name="blog_id">
  <div class="form-group">
      <br>
    <!-- <label for="exampleFormControlTextarea1">Type your comments here....</label> -->
    <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3" placeholder="Type your comment here.." required></textarea>
    <br> 
    <button type="submit" class="btn btn-primary">Submit</button>
     
</div>
    </form>
   
    </div>
  </div>
  @endforeach

</main>

</body>
</html>