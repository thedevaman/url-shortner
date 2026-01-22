@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Admin Added By Me</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add Admin</button>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <h1>Member Added By Me</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add Member</button>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

     <div class="row">
        <div class="col-md-12">
            <h1>Short URL List</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addShortUrlModal">Add Short URL</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Short URL</th>
                    <th>Long URL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($urls as $key=>$url)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $url->short_url }}</td>
                        <td>{{ $url->long_url }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.admin.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberModalLabel">Add Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.member.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addShortUrlModal" tabindex="-1" role="dialog" aria-labelledby="addShortUrlModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addShortUrlModalLabel">Add Short URL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.short_url.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="short_url">Short URL</label>
                        <input type="text" class="form-control" id="short_url" name="short_url" required>
                    </div>
                    <div class="form-group">
                        <label for="long_url">Long URL</label>
                        <input type="text" class="form-control" id="long_url" name="long_url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Short URL</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection