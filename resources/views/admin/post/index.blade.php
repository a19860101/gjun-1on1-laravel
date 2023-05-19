@foreach ($posts as $post)
    <div>{{$post->title}}</div>
@endforeach
<hr>
@foreach ($trashes as $trash)
<div>{{$trash->title}}</div>
@endforeach