@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Thêm người dùng mới</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Tên tài khoản *</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu *</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Vai trò *</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="student">Học sinh</option>
                    <option value="moderator">Giáo viên</option>
                    <option value="admin">Quản trị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection