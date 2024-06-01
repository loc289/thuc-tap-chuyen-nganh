@extends('admin.layouts.master')

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            <a href="{{ route('categories.index') }}" class="btn-link">Phim</a>
        @endslot
        @slot('title')
            Thêm phim
        @endslot
    @endcomponent
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('movies.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 mt-3">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="id_name">Tên phim</label>
                                    <input type="text" name="name" id="id_name" value="" class="form-control" required autofocus>
                                </div>
                                <div class="col-3">
                                    <label for="id_category">Thể loại</label>
                                    <select class="form-select" id="id_category" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="id_nation">Quốc gia</label>
                                    <select class="form-select" id="id_nation" name="nation_id">
                                        @foreach($nations as $nation)
                                            <option value="{{$nation->id}}">{{$nation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="id_description">Mô tả</label>
                                    <textarea class="form-control" id="id_description" name="description" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label for="id_price">Giá phim (VNĐ)</label>
                                    <input type="number" name="price" id="id_price" value="" class="form-control">
                                </div>
                                <div class="col-2">
                                    <label for="id_point">Điểm đánh giá</label>
                                    <input type="text" name="point" id="id_point" value="" class="form-control" placeholder="10/10" required>
                                </div>
                                <div class="col-2">
                                    <label for="id_duration">Thời lượng (phút)</label>
                                    <input type="number" name="duration" id="id_duration" value="" class="form-control" required>
                                </div>
                                <div class="col-2">
                                    <label for="id_release_date">Ngày công chiếu</label>
                                    <input type="date" name="release_date" id="id_release_date" class="form-control" required>
                                </div>
                                <div class="col-2">
                                    <br><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="trending"
                                               id="id_trending"
                                               value="1" checked>
                                        <label class="form-check-label" for="id_trending">
                                            Thịnh hành
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label>Trạng thái</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                               id="id_status_active"
                                               value="{{config('constants.status_active')}}">
                                        <label class="form-check-label" for="id_status_active">
                                            Hoạt động
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                               id="id_status_inactive"
                                               value="{{config('constants.status_inactive')}}" checked>
                                        <label class="form-check-label" for="id_status_inactive">
                                            Không hoạt động
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="id_image">Hình ảnh</label>
                                    <input type="file" name="image" id="id_image" class="form-control" accept="image/*" required>
                                </div>
                                <div class="col-5">
                                    <label for="id_video">Video</label>
                                    <input type="file" name="video" id="id_video" class="form-control" accept="video/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
