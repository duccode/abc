@extends('admin.users.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu Đề</th>
            <th>Link</th>
            <th>Sắp xếp</th>
            <th>Ảnh minh họa</th>
            <th>Active</th>
            <th>Update</th>
            <th>&nbsp</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sliders as  $key => $slider)
        <tr>
            <td>{{$slider->id}}</td>
            <td>{{$slider->name}}</td>
            <td>{{$slider->url}}</td>
            <td>{{$slider->sort_by}}</td>
            <td><a href="{{$slider->thumb}}" target="_blank"><img src="{{$slider->thumb}}" width="40px"></a> </td>
            <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
            <td>{{$slider->updated_at}}</td>
            <td>
                <a href="/admin/sliders/edit/{{$slider->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <a href="#" onclick="RemoveRow({{$slider->id}},'/admin/sliders/destroy')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>

        @endforeach
        </tbody>
    </table>
    {!!$sliders->links()!!}
@endsection
