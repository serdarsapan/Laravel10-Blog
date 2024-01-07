@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span class="card-title" style="font-weight: bold">Add Blog</span>
                </div>
                <div class="card-body">

                    @if($errors)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    @if(session()->get('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    @if(!empty($blog->id))
                        @php
                            $routeLink = route('blogs.update',$blog->id);
                        @endphp
                    @else
                        @php
                            $routeLink = route('blogs.store');
                        @endphp
                    @endif
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @if(!empty($blog->id))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="title" class="label-spe">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $blog->title ?? '' }}" placeholder="Title" onblur="path();">
                        </div>
                        <div class="form-group mt-2">
                            <label for="slug" class="label-spe">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="slug"
                                   value="{{ $blog->slug ?? '' }}" readonly/>
                        </div>
                        <div class="form-group mt-2">
                            <label for="catchword" class="label-spe">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="6"
                                      placeholder="Content">{!! $blog->content ?? '' !!}</textarea>
                        </div>

                        <div class="form-group mt-2">
                            <label for="name" class="label-spe">Category</label>
                            <select name="category[]" id="" class="form-control js-example-basic-single"
                                    multiple="multiple">
                                @foreach($categories as $id=>$name)
                                    @if(isset($selectedCategory))
                                        <option
                                            {{in_array($id,$selectedCategory) ? 'selected' : ''}} value="{{ $id }}">{{ $name }}</option>
                                    @else
                                        <option value="{{ $name->id }}">{{ $name->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="status" class="label-spe">Status</label>
                            @php
                                $status = $blog->status ?? '';
                            @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Passive</option>

                            </select>
                        </div>
                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
