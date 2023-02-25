<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>管理画面</title>
  <link rel="stylesheet" href="/admin/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/admin/movee">top</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-2 col-md-8">
        <nav class="panel panel-default">
          <div class="panel-heading">個別ページを登録する</div>
          <div class="panel-body">
              <div class="text-right">
                <button type="button" name="btn-submit" id="btn-submit" class="btn btn-light" onClick="history.back()">戻る</button>
              </div>
        {!! Form::open(['route' => ['admin.page.new'],'enctype'=>'multipart/form-data']) !!}
        @if($page == null)
        <p style="width:7em">タイトル</p>
         {!! Form::text('title', null, ['class' => 'form-control','id' => 'title']) !!}<br>
         <p style="width:7em">URL</p>
         pages/{!! Form::text('url', null, ['class' => 'form-control','id' => 'url']) !!}<br>
         <p style="width:7em">サムネイル画像</p>
         {!! Form::file('thumbnail') !!}<br>
         <p style="width:7em">コンテンツ０１</p>
         {!! Form::textarea('content01', null, ['class' => 'form-control','id' => 'content01']) !!}<br>
         <p style="width:7em">挿入画像０１</p>
         {!! Form::file('image01') !!}<br>
         <p style="width:7em">コンテンツ０２</p>
         {!! Form::textarea('content02', null, ['class' => 'form-control','id' => 'content02']) !!}<br>
         <p style="width:7em">挿入画像０２</p>
         {!! Form::file('image02') !!}<br><br>
         @else
         <p style="width:7em">タイトル</p>
         {!! Form::text('title',  $page->title, ['class' => 'form-control','id' => 'title']) !!}<br>
         <p style="width:7em">URL</p>
         {!! Form::text('url', $page->url, ['class' => 'form-control','id' => 'url']) !!}
        @if ($errors->has('url'))<p class="text-danger">{{ $errors->first('url') }}
        </p>@endif<br>
        @if($uniqueError != '')
            {{$uniqueError}}
        @endif<br>
        {!! Form::file('thumbnail') !!}
         {!! Form::textarea('content01', $page->content01, ['class' => 'form-control','id' => 'content01']) !!}<br>
         {!! Form::file('image01') !!}<br>
         @endif
         <div class="text-right">
         {!! Form::select('status', $status, null, ['id' => 'status']) !!}
          <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-warning btn-submit">登録</button>
          </div>
        {!! Form::close() !!}
      </div>
    </nav>
        
      </div>
    </div>
  </div>
</main>
</body>
</html>