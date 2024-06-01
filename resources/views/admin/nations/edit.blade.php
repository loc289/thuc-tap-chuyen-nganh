@extends('admin.layouts.master')

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            <a href="{{ route('nations.index') }}" class="btn-link">Quốc gia</a>
        @endslot
        @slot('title')
            Cập nhật quốc gia
        @endslot
    @endcomponent
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('nations.update', $nation->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3 mt-3">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="id_name">Quốc gia</label>
                                    <input type="text" name="name" id="id_name" value="{{$nation->name}}"  class="form-control" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
