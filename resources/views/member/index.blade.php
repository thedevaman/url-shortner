@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h1>Url List</h1>
           <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUrlModal">Add Url</button>
           <table class="table">
            <thead>
                <tr>
                    <th>Short Url</th>
                    <th>Long Url</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($urls as $url)
                <tr>
                    <td>{{ $url->short_url }}</td>
                    <td>{{ $url->long_url }}</td>
                </tr>
                @endforeach
            </tbody>
           </table>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="addUrlModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Url</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('member.short_url.store') }}" method="POST">
                    @csrf
                     <div class="mb-3">
                        <label for="short_url" class="form-label">Short Url</label>
                        <input type="text" class="form-control" id="short_url" name="short_url" required>
                    </div>
                    <div class="mb-3">
                        <label for="long_url" class="form-label">Long Url</label>
                        <input type="url" class="form-control" id="long_url" name="long_url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Url</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
