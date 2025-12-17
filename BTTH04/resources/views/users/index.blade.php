@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Quản lý Người dùng (Userth)</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm mới</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã người dùng</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $userth)
                <tr>
                    <td>{{ $userth->id }}</td>
                    <td>{{ $userth->username }}</td>
                    <td>{{ $userth->email }}</td>
                    <td>
                        @if($userth->role == 'admin')
                            <span class="badge bg-danger">Quản trị</span>
                        @elseif($userth->role == 'moderator')
                            <span class="badge bg-primary">Giáo viên</span>
                        @else
                            <span class="badge bg-secondary">Học sinh</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $userth->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('users.destroy', $userth->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection