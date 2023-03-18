
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
    @foreach($mains as $main)
    <a class="my-navbar-brand" href="{{ route('admin.main.edit', ['pageId' => $main->id ]) }}">{{$main->title}}</a>
    @endforeach  
  </nav>
  <div class="my-navbar-control">
    @if(Auth::check())
      <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
      ｜
      <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @else
      <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
      ｜
      <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
    @endif
  </div>
</header>
<body>
    <section class="product iphone-x">
        <div class="container">
            <div class="row">
              <div class="col col-md-offset-1 col-md-10">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th  style="width:16em">動画</th>
                        <th  style="width:16em">ページURL</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>

                        <td><video width="200" height="200" controls src="{{ Storage::disk('s3')->url('uploads/page/13/image_6411d1e1d056f.MOV') }}"></video></td>
                        <td>aaaa</td>
                        <td>{!! Form::open(['route' => ['admin.page.delete', 'pageId' => $page->id], 'method' => 'delete'])!!}
                            <button typpx"submit">削除</button>
                            {!! Form::close() !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p><a href="{{ route('admin.page.new') }}">個別ページ作成へ</a></p>
    </div>
</div>
</div>
  </section>
    @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
</body>
</html>