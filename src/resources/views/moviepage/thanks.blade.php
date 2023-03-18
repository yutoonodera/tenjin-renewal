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
<a href="{{ route('moviepage.mypage', ['pageurl'=> $page->pagelink]) }}" target=”_blank”>{{$page->pagelink}}</a>
</body>

</html>
