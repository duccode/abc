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
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter ...">
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu">Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            <option value="0">Danh mục Cha</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{old('price')}}" class="form-control" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="price_sale" value="{{old('price_sale')}}" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Mô Tả</label>
                <textarea name="description" class="form-control" value="{{old('description')}}"></textarea>
            </div>

            <div class="form-group">
                <label for="menu">Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" class="form-control" value="{{old('content')}}"></textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <div class="custom-file">
                    <input type="file" name="file_var" class="custom-file-input" id="upload">
                    <label class="custom-file-label" for="customFile"></label>
                </div>
                <div id="image_show"></div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
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

