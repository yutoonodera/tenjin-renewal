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
          <div class="panel-heading">メインページを編集する</div>
          <div class="panel-body">
              <div class="text-right">
                <button type="button" name="btn-submit" id="btn-submit" class="btn btn-light" onClick="history.back()">戻る</button>
              </div>
{!! Form::open(['route' => ['admin.main.edit', 'pageId' => $main->id],'enctype'=>'multipart/form-data']) !!}
@csrf
<p style="width:7em">タイトル</p>
{!! Form::text('title', $main->title, ['class' => 'form-control','id' => 'title']) !!}
@if ($errors->has('title'))<p class="text-danger">{{ $errors->first('title') }}
</p>@endif<br>
<p style="width:7em">URL</p>
{!! Form::text('url', $main->url, ['class' => 'form-control','id' => 'url']) !!}
@if ($errors->has('url'))<p class="text-danger">{{ $errors->first('url') }}
</p>@endif<br>
@if($uniqueError != '')
    {{$uniqueError}}
@endif<br>
<p style="width:7em">サムネイル画像</p>
{!! Form::file('thumbnail') !!}
@if ($main->thumbnail)
    <img src="{{ Storage::disk('s3')->url($uploadDir.$main->id.$slash.$main->thumbnail) }}" alt="{{$main->title}}"
    style="max-width:80px;">

<a href="{{ route('admin.main.delete.image', [$main->id,'thumbnail']) }}">画像を削除する</a>
    <br>@endif
@if ($errors->has('thumbnail'))<p class="text-danger">{{
    $errors->first('thumbnail')
    }}</p>@endif<br>
<p style="width:7em">コンテンツ０１</p>
{!! Form::textarea('content01', $main->content01, ['class' => 'form-control','id' => 'content01']) !!}
@if ($errors->has('content01'))<p class="text-danger">{{ $errors->first('content01') }}
</p>@endif<br>
<p style="width:7em">挿入画像０１</p>
{!! Form::file('image01') !!}
@if ($main->image01)
<img src="{{ Storage::disk('s3')->url($uploadDir.$main->id.$slashOne.$main->image01) }}" alt="{{$main->title}}"
    style="max-width:80px;">
    <a href="{{ route('admin.main.delete.image', [$main->id,'image01']) }}">画像を削除する</a>
    <br>@endif
@if ($errors->has('image01'))<p class="text-danger">{{
    $errors->first('image01')
    }}</p>@endif<br>
<p style="width:7em">コンテンツ０２</p>
{!! Form::textarea('content02', $main->content02, ['class' => 'form-control','id' => 'content02']) !!}
@if ($errors->has('content02'))<p class="text-danger">{{ $errors->first('content02') }}
</p>@endif<br>
<p style="width:7em">挿入画像０２</p>
{!! Form::file('image02') !!}
@if ($main->image02)
<img src="{{ Storage::disk('s3')->url($uploadDir.$main->id.$slashTwo.$main->image02) }}" alt="{{$main->title}}"
    style="max-width:80px;">
    <a href="{{ route('admin.main.delete.image', [$main->id,'image02']) }}">画像を削除する</a>
    <br>@endif
@if ($errors->has('image02'))<p class="text-danger">{{
    $errors->first('image02')
    }}</p>@endif<br>
    <div class="text-right">
    <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-warning btn-submit">更新</button>
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