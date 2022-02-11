@extends('admin.users.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Giá Gốc</th>
            <th>Giá sale</th>
            <th>Ảnh minh họa</th>
            <th>Active</th>
            <th>Update</th>
            <th>&nbsp</th>
        </tr>
        </thead>
        <tbody>
        {!!\App\Helpers\HelperProduct::Product($products)!!}
        </tbody>
    </table>
    {!!$products->links()!!}
@endsection
