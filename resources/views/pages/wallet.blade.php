@extends('welcome')
@section('content')
    <main class="main-content">
        <div class="row mb-4 justify-content-end">
            <div class="col-2">
                <div class="mx-3 my-3">
                    <h2>Số dư trong ví</h2>
                    <br>
                    <h2>{{number_format($wallet->balance)}} VNĐ</h2>
                </div>
            </div>
            <div class="col-3">
                <div class="mx-3 my-3">
                    <form method="post" action="{{route('web.wallet-top-up')}}">
                        @csrf
                        <h2>Nạp tiền</h2>
                        <div class="form-group mb-3 mt-3">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="id_amount" class="mb-3">Số tiền (VNĐ)</label>
                                    <input type="number" name="amount" id="id_amount" value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button type="submit" class="btn btn-primary"><h4>Nạp tiền</h4></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="mx-3 my-3">
                    <h2>Lịch sử nạp tiền</h2>
                    <br>
                    <table class="table table-dark table-striped">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Số tiền</th>
                            <th scope="col">Ngày giờ nạp</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($wallet->topUps->sortByDesc('created_at', SORT_STRING) as $topUp)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{number_format($topUp->amount)}} VNĐ</td>
                                <td>{{$topUp->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="mx-3 my-3">
                    <h2>Phim của tôi</h2>
                    <br>
                    <table class="table table-dark table-striped">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Phim</th>
                            <th scope="col">Số tiền mua phim</th>
                            <th scope="col">Ngày giờ mua</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($wallet->charges->sortByDesc('created_at', SORT_STRING) as $charge)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>
                                    <a href="{{ route('web.movie-detail', $charge->order->movie->id) }}"
                                       class="btn btn-link">
                                        <h4>
                                            {{$charge->order->movie->name}}
                                        </h4>
                                    </a>
                                </td>
                                <td>{{number_format($charge->amount)}} VNĐ</td>
                                <td>{{$charge->created_at}}</td>
                                <td>
                                    <a href="{{ route('web.movie-watch', $charge->order->movie->id) }}"
                                       class="btn btn-link">
                                        <h4>Xem phim</h4>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
