<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>movee</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Corporate-Footer-Clean.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                    @foreach($mains as $main)
                    <li class="nav-item"><a class="nav-link" href="{{ route('display.mainPage', ['url' => $main->url]) }}">{{$main->title}}</a></li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact.new') }}">お問い合わせ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
          {{-- <div class="row"> --}}
            <div class="col col-md-offset-0 col-md-12">
              <nav class="panel panel-default">
                <div class="panel-body">
              <br><br><br><br>      
              <h2>お問い合わせ</h2>
              <br><br>
              <p>以下の項目をご入力ください</p>
              <br><br>
              {!! Form::open(['route' => ['contact.new'],'enctype'=>'multipart/form-data']) !!}           
              <p style="width:7em">問い合わせ内容</p>
              {!! Form::text('title', null, ['class' => 'form-control','id' => 'title']) !!}<br>
              @if ($errors->has('title'))<p class="text-danger">{{ $errors->first('title') }}
              </p>@endif<br>
               <p style="width:7em">お名前</p>
               {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!} <br>
               @if ($errors->has('name'))<p class="text-danger">{{ $errors->first('name') }}
               </p>@endif<br>
               <p style="width:7em">会社名</p>
               {!! Form::text('company', null, ['class' => 'form-control','id' => 'company']) !!} <br>
               @if ($errors->has('company'))<p class="text-danger">{{ $errors->first('company') }}
               </p>@endif<br>
               <p style="width:7em">メールアドレス</p>
               {!! Form::text('email', null, ['class' => 'form-control','id' => 'email']) !!}<br>
               @if ($errors->has('email'))<p class="text-danger">{{ $errors->first('email') }}
               </p>@endif<br>
               <p style="width:7em">内容</p>
               {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'content']) !!}<br>
               @if ($errors->has('content'))<p class="text-danger">{{ $errors->first('content') }}
               </p>@endif<br>
               <div class="text-right">
                <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-warning btn-submit">送信</button>
                </div>
                {!! Form::close() !!} 
               </div>
               </nav>
            </div>
          {{-- </div> --}}
        </div>
      </main>
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
                        <h5><a href="#">{{$main->title}}</a></h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>



{{-- 
{!! Form::open(['route' => ['contact.new'],'enctype'=>'multipart/form-data']) !!}
 {!! Form::text('title', null, ['class' => 'form-control','id' => 'title']) !!} 
 {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}    
 {!! Form::text('company', null, ['class' => 'form-control','id' => 'company']) !!} 
 {!! Form::text('email', null, ['class' => 'form-control','id' => 'email']) !!}
 {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'content']) !!}              
{!! Form::close() !!} --}}