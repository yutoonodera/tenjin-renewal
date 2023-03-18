<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>url表示</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Corporate-Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
{{$page->id}}
<video width="200" height="200" controls src="{{ Storage::disk('s3')->url('movie/'.$page->id.'/'.$page->movie) }}"></video><br>
<a href="{{$page->introductionlink}}" target=”_blank”>{{$page->introductionlink}}</a>
</body>
</html>

 キャッシュを使う
 バッチで削除処理をする
 