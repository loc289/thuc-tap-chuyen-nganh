@csrf

<h4 class="card-title">Thông tin cơ bản</h4>
<p class="card-title-desc">Vui lòng điền đầy đủ thông tin bên dưới</p>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group mb-3">
            <label for="name">Họ và tên <span class="text-danger">*</span></label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Họ và tên" value="{{ old('name', $data_edit->name ?? '') }}">
            {!! $errors->first('name', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group mb-3">
            <label for="gender">Giới tính <span class="text-danger">*</span></label>
            <div class="form-check form-check">
                <input type="radio" class="form-check-input" id="nam" name="gender" value="Nam" {{ isset($data_edit->gender) && $data_edit->gender == 'Nam' ? 'checked' : '' }} checked>
                <label class="form-check-label" for="nam">Nam</label>
            </div>
            <div class="form-check form-check">
                <input type="radio" class="form-check-input" id="nu" name="gender" value="Nữ" {{ isset($data_edit->gender) && $data_edit->gender == 'Nữ' ? 'checked' : '' }}>
                <label class="form-check-label" for="nu">Nữ</label>
            </div>
            {!! $errors->first('gender', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group mb-3">
            {{-- <div class="docs-datepicker">
                <div class="input-group">
                    <input type="text" class="form-control docs-date" name="birthday" placeholder="Chọn ngày sinh" autocomplete="off" value="{{ old('birthday', isset($data_edit->gender) ? date('d-m-Y', strtotime($data_edit->birthday)) : '') }}">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled="">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="docs-datepicker-container"></div>
            </div> --}}

            <label for="dob">Ngày sinh <span class="text-danger">*</span></label>
            <div class="input-group" id="datepicker1">
                <input type="text"
                    class="form-control"
                    name="birthday"
                    id="dob"
                    placeholder="dd-mm-yyyy"
                    data-date-container='#datepicker1'
                    data-date-format="dd-mm-yyyy"
                    data-date-end-date="0d"
                    data-provide="datepicker"
                    value="{{ old('birthday', isset($data_edit->gender) ? date('d-m-Y', strtotime($data_edit->birthday)) : '') }}"
                >
                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
            </div>
            <div class="text-danger" id="dobError" data-ajax-feedback="dob"></div>
            {!! $errors->first('birthday', '<span class="error">:message</span>') !!}
        </div>

        @if ($routeType == 'create')
            <div class="form-group mb-3">
                <label for="userpassword">Mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="userpassword" placeholder="Nhập mật khẩu" autocomplete="new-password" name="password">
                {!! $errors->first('password', '<span class="error">:message</span>') !!}
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Nhập xác nhận mật khẩu" name="password_confirmation">
            </div>
        @endif

    </div>

    <div class="col-sm-6">
        <div class="form-group mb-3">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email', $data_edit->email ?? '') }}">
            {!! $errors->first('email', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group mb-3">
            <label for="avatar">Ảnh đại diện</label>
            <input id="avatar" name="avatar" type="file" class="form-control">
            {!! $errors->first('avatar', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group mb-3">
            <label for="phone_number">Số điện thoại <span class="text-danger">*</span></label>
            <input id="phone_number" name="phone_number" type="number" class="form-control" placeholder="Số điện thoại" value="{{ old('phone_number', $data_edit->phone_number ?? '') }}">
            {!! $errors->first('phone_number', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group mb-3">
            <label for="address">Địa chỉ <span class="text-danger">*</span></label>
            <input id="address" name="address" type="text" class="form-control" placeholder="Địa chỉ" value="{{ old('address', $data_edit->address ?? '') }}">
            {!! $errors->first('address', '<span class="error">:message</span>') !!}
        </div>

    </div>
</div>

<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
<a href="{{ route('users.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
