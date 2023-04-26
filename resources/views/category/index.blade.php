<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div>
                <label for="">title</label>
                <input type="text" name="title">
            </div>

            <div>
                <label for="">slug</label>
                <input type="text" name="slug">
            </div>
            <input type="submit">
        </form>
    </div>
    <div>
        <table>
            <tr>
                <th>title</th>
                <th>slug</th>
            </tr>
            @foreach($categories as $category)
            
                <tr>
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <td><input type="text" name="title" value="{{$category->title}}"></td>
                        <td><input type="text" name="slug" value="{{$category->slug}}"></td>
                        <td><input type="submit" value="update"></td>
                    </form>
                    <form action="{{route('category.destroy',$category->id)}}" method="post">
                    <td>
                            @csrf 
                            @method('delete')
                            <input type="submit" value="delete">
                        </td>
                    </form>
                </tr>
            
            @endforeach
        </table>
    </div>
</body>
</html>