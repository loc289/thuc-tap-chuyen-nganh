@extends('admin.layouts.master')

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            <a href="{{ route('categories.index') }}" class="btn-link">Phim</a>
        @endslot
        @slot('title')
            Chi tiết phim
        @endslot
    @endcomponent
    <div class="row justify-content-center mt-3">
        <video height="300" controls>
            <source src="{{url('/uploads/'.$movie->video)}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-2">
            <img src="{{url('/uploads/'.$movie->image)}}" class="img-fluid rounded">
        </div>
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group mb-3 mt-3">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="id_name">Tên phim</label>
                                    <input type="text" name="name" id="id_name" value="{{$movie->name}}"
                                           class="form-control" disabled
                                           autofocus>
                                </div>
                                <div class="col-3">
                                    <label for="id_category">Thể loại</label>
                                    <select class="form-select" id="id_category" name="category_id" disabled>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @if($movie->category->id == $category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="id_nation">Quốc gia</label>
                                    <select class="form-select" id="id_nation" name="nation_id" disabled>
                                        @foreach($nations as $nation)
                                            <option value="{{$nation->id}}"
                                                    @if($movie->nation->id == $nation->id) selected @endif>{{$nation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="id_description">Mô tả</label>
                                    <textarea class="form-control" id="id_description" name="description" rows="3"
                                              disabled>{{$movie->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label for="id_price">Giá phim (VNĐ)</label>
                                    <input type="number" name="price" id="id_price" value="{{$movie->price}}"
                                           class="form-control" disabled>
                                </div>
                                <div class="col-2">
                                    <label for="id_point">Điểm đánh giá</label>
                                    <input type="text" name="point" id="id_point" value="{{$movie->point}}"
                                           class="form-control"
                                           placeholder="10/10" disabled>
                                </div>
                                <div class="col-2">
                                    <label for="id_duration">Thời lượng (phút)</label>
                                    <input type="number" name="duration" id="id_duration" value="{{$movie->duration}}"
                                           class="form-control"
                                           disabled>
                                </div>
                                <div class="col-2">
                                    <label for="id_release_date">Ngày công chiếu</label>
                                    <input type="date" name="release_date" id="id_release_date"
                                           value="{{$movie->release_date}}" class="form-control"
                                           disabled>
                                </div>
                                <div class="col-2">
                                    <br><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="trending"
                                               id="id_trending"
                                               value="1" @if($movie->trending) checked @endif disabled>
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
                                               value="{{config('constants.status_active')}}"
                                               @if($movie->status == config('constants.status_active')) checked @endif disabled>
                                        <label class="form-check-label" for="id_status_active">
                                            Hoạt động
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                               id="id_status_inactive"
                                               value="{{config('constants.status_inactive')}}"
                                               @if($movie->status == config('constants.status_inactive')) checked @endif disabled>
                                        <label class="form-check-label" for="id_status_inactive">
                                            Không hoạt động
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
