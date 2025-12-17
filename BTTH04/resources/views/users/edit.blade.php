@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Chỉnh sửa người dùng</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="username" class="form-label">Tên tài khoản *</label>
                <input type="text" class="form-control" id="username" name="username" 
                       value="{{ old('username', $user->username) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu (để trống nếu không đổi)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Vai trò *</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Học sinh</option>
                    <option value="teacher" {{ $user->role == 'moderator' ? 'selected' : '' }}>Giáo viên</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Quản trị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection