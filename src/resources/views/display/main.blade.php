<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @foreach($pages as $page)
    <title>{{$page->title}}/movee</title>
    @endforeach
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Corporate-Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                    @foreach($mains as $main)
                    <li class="nav-item"><a class="nav-link" href="{{ route('display.mainPage', ['url' => $main->url]) }}">{{$main->title}}</a></li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact.new') }}" target="_blank" rel="noopener noreferrer">お問い合わせ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @foreach($pages as $page)
    @if ($page->thumbnail)
     <section class="product">
        <img class="img-fluid" src="{{ Storage::disk('s3')->url($uploadDir.$page->id.$slash.$page->thumbnail) }}" alt="{{$page->title}}">
     </section>
    @endif
    <section class="product content">
        <?= html_entity_decode($page->content01);?>
        @if ($page->image01)
        <img class="img-fluid" src="{{ Storage::disk('s3')->url($uploadDir.$page->id.$slashOne.$page->image01) }}" alt="{{$page->title}}">
        @endif
    </section>
    <section class="product content">
        <?= html_entity_decode($page->content02);?>
        @if ($page->image02)
        <img class="img-fluid" src="{{ Storage::disk('s3')->url($uploadDir.$page->id.$slashTwo.$page->image02) }}" alt="{{$page->title}}">
        @endif
    </section>
    @endforeach
    <footer class="page-footer">
        <div class="container">
            <p>〒810-0001　福岡県福岡市中央区天神2丁目3-10　天神パインクレスト716</p>
            <hr>
            <div class="footer-legal">
                <div class="float-md-right region"><a href="https://movee.info">movee</a></div>
                <div class="d-inline-block copyright">
                    <p class="d-inline-block">Copyright © 2022. All rights reserved.<br></p>
                </div>
                <div class="d-inline-block legal-links">
                    @foreach($mains as $main)
                    <div class="d-inline-block item">
                    <h5><a href="{{ route('display.mainPage', ['url' => $main->url]) }}">{{$main->title}}</a></h5>
                    </div>
                    @endforeach
                    <div class="d-inline-block item">
                    <h5><a href="{{ route('contact.new') }}" target="_blank" rel="noopener noreferrer">お問い合わせ</a><h5>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>


