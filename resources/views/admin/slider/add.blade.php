@extends('admin.users.main')

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter ...">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="url" value="{{old('url')}}" placeholder="Enter ...">
                    </div>
                </div>

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
                    <label for="menu">Sắp Xếp</label>
                    <input type="number" class="form-control" name="sort_by" value="{{old('sort_by')}}" placeholder="Enter ...">
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
                <button type="submit" class="btn btn-primary">Tạo Slider</button>
            </div>
            @csrf
      </div>
    </form>


@endsection


