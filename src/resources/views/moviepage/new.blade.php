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
    <a class="my-navbar-brand" href="/">TOP</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-2 col-md-8">
        <nav class="panel panel-default">
          <div class="panel-heading">ページを作成する</div>
          <div class="panel-body">
        {!! Form::open(['route' => ['moviepage.new'],'enctype'=>'multipart/form-data']) !!}
         <p style="width:7em">動画</p>
         {!! Form::file('movie') !!}<br>
         <p style="width:7em">リンク</p>ex) https://movee.jp/
         {!! Form::text('introductionlink', null, ['class' => 'form-control','id' => 'introductionlink']) !!}<br>
         <div class="text-right">
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