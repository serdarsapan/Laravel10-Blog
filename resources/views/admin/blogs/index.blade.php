@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Blog</h4>
                    <span class="card-description">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Blog</a>
                    </span>
                </div>
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($blogs) && $blogs->count() > 0)
                                @foreach($blogs as $blog)
                                    <tr class="item">
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->content }}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    {{ $blog->status == '1' ? 'Active' : 'Passive' }}
                                                </label>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger bg-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

