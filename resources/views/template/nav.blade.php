<nav>
    <a href="#">首頁</a>
    <a href="{{route('post.index')}}">文章列表</a>
    <a href="{{route('post.create')}}">新增文章</a>
    <a href="{{route('category.index')}}">分類管理</a>
    <a href="{{route('auth.logout')}}">logout</a>
    @foreach ($categories as $item)
        {{$item->title}}
    @endforeach
</nav>