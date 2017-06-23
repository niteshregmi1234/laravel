<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
<style>
    table{
        border-collapse: collapse;
    }
    tr,td{
        border:1px solid;
    }
</style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>SN</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Author</th>
        <th>Slug</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    ?>

    @foreach($posts as $post)
        <tr>
            <td>{{$i=$i+1}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->category}}</td>
            <td>{{$post->author}}</td>
            <td>{{url($post->slug)}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
        </tr>
    @endforeach
</table>
</body>

