<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @foreach($pages as $page)
    <title>{{$page->title}}/movee</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Corporate-Footer-Clean.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="product pagecontent">
        <h1>{{$page->title}}</h1>
    @if ($page->thumbnail)
          <img class="img-fluid" src="{{ Storage::disk('s3')->url($uploadDir.$page->id.$slash.$page->thumbnail) }}" alt="{{$page->title}}"style="max-width:80%;"><br><br>
    @endif
        <p><?= html_entity_decode($page->content01);?></p>
        @if ($page->image01)
          <img class="img-fluid" src="{{ Storage::disk('s3')->url($uploadDir.$page->id.$slash.$page->image01) }}" alt="{{$page->title}}"style="max-width:80%;">
        @endif
        <p><?= html_entity_decode($page->content02);?></p>
        @if ($page->image02)
          <img class="img-fluid" src="{{ Storage::disk('s3')->url($uploadDir.$page->id.$slash.$page->image02) }}" alt="{{$page->title}}"style="max-width:80%;">
        @endif
    </section>
    @endforeach
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>


