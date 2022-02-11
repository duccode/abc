@extends('admin.users.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')

    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{$products->name}}" placeholder="Enter ...">
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu">Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}" {{$products->menu_id == $menu->id ? 'selected':''}}>{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{$products->price}}" class="form-control" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="price_sale" value="{{$products->price_sale}}" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Mô Tả</label>
                <textarea name="description" class="form-control" value="{{$products->description}}">{{$products->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" class="form-control" value="{{$products->content}}">{{$products->content}}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <div class="custom-file">
                    <input type="file" name="file_var" class="custom-file-input" id="upload">
                    <label class="custom-file-label" for="customFile"></label>
                </div>
                <div id="image_show"></div>
                <a href="{{$products->thumb}}" target="_blank">
                    <img src="{{$products->thumb}}" alt="" width="50px">
                </a>
                <input type="hidden" name="thumb" id="thumb" value="{{$products->thumb}}">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$products->active ==1 ? 'checked =""': ''}} >
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                         {{$products->active ==0 ? 'checked =""': ''}}>
    <label for="no_active" class="custom-control-label">No</label>
</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
</div>
@csrf
</form>
</div>

@endsection
@section('footer')
<script>
CKEDITOR.replace( 'content' );
</script>
@endsection


