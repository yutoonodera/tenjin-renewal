<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メインページ</title>
        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
        <!-- end Goolge font -->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
</head>
<a href="/admin/movee">管理画面</a><br>
{{$main->title}}<br>
/{{$main->url}}<br>
@if ($main->thumbnail)<img
    src="{{ Storage::disk('s3')->url($uploadDir.$main->id.$slash.$main->thumbnail) }}" alt="{{$main->title}}"
    style="max-width:80px;"><br>@endif
{{$main->content01}}<br>
@if ($main->image01)<img
    src="{{ Storage::disk('s3')->url($uploadDir.$main->id.$slashOne.$main->image01) }}" alt="{{$main->title}}"
    style="max-width:80px;"><br>@endif
    {{$main->content02}}<br>
@if ($main->image02)<img
    src="{{ Storage::disk('s3')->url($uploadDir.$main->id.$slashTwo.$main->image02) }}" alt="{{$main->title}}"
    style="max-width:80px;"><br>@endif
{!! Form::open(['route' => ['admin.main.edit', 'pageId' => $main->id], 'method' => 'get'])!!}
<button type="submit">編集</button>
{!! Form::close() !!}