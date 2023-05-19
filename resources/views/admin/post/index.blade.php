<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border w-full mb-5">
                        <tr class="border">
                            <th>#</th>
                            <th>文章標題</th>
                            <th>最後更新時間</th>
                            <th>動作</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <form action="{{route('admin.post.destroy',$post->id)}}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="刪除" class="bg-gray text-black">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <table class="border w-full mb-5">
                        <tr>
                            <th>#</th>
                            <th>文章標題</th>
                            <th>最後更新時間</th>
                        </tr>
                        @foreach ($trashes as $trash)
                        <tr>
                            <td>{{$trash->id}}</td>
                            <td>{{$trash->title}}</td>
                            <td>{{$trash->updated_at}}</td>
                            <td>
                                <form action="{{route('admin.post.forcedelete',['id'=>$trash->id])}}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="強制刪除" class="bg-gray text-black">
                                </form>
                                <a href="{{route('admin.post.restore',['id'=>$trash->id])}}">還原</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>