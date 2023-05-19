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
                    <h3 class="font-bold text-xl mb-3 mt-5">所有文章</h3>
                    <table class="border w-full mb-5">
                        <tr class="border">
                            <th class="border p-2">#</th>
                            <th class="border p-2">文章標題</th>
                            <th class="border p-2">最後更新時間</th>
                            <th class="border p-2">動作</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td class="border p-2">{{$post->id}}</td>
                            <td class="border p-2">{{$post->title}}</td>
                            <td class="border p-2">{{$post->updated_at}}</td>
                            <td class="border p-2">
                                <form action="{{route('admin.post.destroy',$post->id)}}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="刪除"  class="p-2 rounded bg-red-600 text-white">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <h3 class="font-bold text-xl mb-3 mt-5">已刪除</h3>
                    <table class="border w-full mb-5">
                        <tr>
                            <th class="border p-2">#</th>
                            <th class="border p-2">文章標題</th>
                            <th class="border p-2">最後更新時間</th>
                        </tr>
                        @foreach ($trashes as $trash)
                        <tr>
                            <td class="border p-2">{{$trash->id}}</td>
                            <td class="border p-2">{{$trash->title}}</td>
                            <td class="border p-2">{{$trash->updated_at}}</td>
                            <td class="flex border p-2">
                                <form action="{{route('admin.post.forcedelete',['id'=>$trash->id])}}" method='post' class="mr-2">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="強制刪除" class="p-2 rounded bg-red-600 text-white">
                                </form>
                                <a href="{{route('admin.post.restore',['id'=>$trash->id])}}" class="p-2 rounded bg-sky-600 text-white">還原</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>