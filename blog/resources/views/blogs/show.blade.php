@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', 'Blogs')
@section('content')
<div class="panel panel-default">
    <div class="panel-head fw-bold text-center mb-3">
        BLOG
    </div>
    <div class="text-end">
    <a href="{{ url()->previous() }}" class="btn btn-inverse-danger"><i class="bi bi-arrow-90deg-left"></i> Back
            </a>
    <a href="{{ route('blogs.trashed') }}" class="btn btn-secondary">
        Trashed Blogs
    </a>
    </div>
    <br>
    <div class="panel-body">
    @if($blogs->isEmpty())
            <p>No blogs available.</p>
    @else
    <table class="table table-responsive table-hover mb-3">
        <thead>
            <th>S.N.</th>
            <th>Blog Title</th>
            <th>Content</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        @php $n=1; @endphp
        @foreach($blogs as $blog)
        <tbody>
        
            <td>{{ $n++ }}</td>
            <td class="text-wrap">{{ $blog->title }}</td>
            <td><a href="{{ route('blogs.show',$blog->id) }}"  class="text-decoration-none text-dark">{{ strip_tags(\Illuminate\Support\Str::limit($blog->description,43,'...')) }}</a></td>
            <td>@if ($blog->isCurrentlyPublished())
                    <span class="badge badge-success">Published</span>
                @else
                    <span class="badge badge-warning">Scheduled</span>
                @endif
            </td>
            <td><a href="{{ route('blogs.edit',['blog'=>$blog->id]) }}" class="btn btn-info">
            <i class="bi bi-pencil-square"></i>Edit
            </a></td>
            <td><form action="{{ route('blogs.destroy',['blog'=>$blog->id]) }}" method="POST">
                @csrf 
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');" type="submit"><i class="bi bi-trash"></i>Delete</button></form></td>
        </tbody>
        @endforeach
    </table>
    @endif
    </div>
    <div class="pagination">
        @if($blogs->onfirstPage())
            
        @else
            <a href="{{ $blogs->previousPageUrl() }}">Prev</a>
        @endif

        @foreach($blogs->getUrlRange(1,$blogs->lastPage()) as $page=>$url)
            <a href="{{ $url }}" class="{{ $page==$blogs->currentPage() ? 'active' : '' }}">{{ sprintf('%02d',$page) }}</a>
        @endforeach

        @if($blogs->onLastPage())
            
        @else
            <a href="{{ $blogs->nextPageUrl() }}">Next</a>
        @endif
    </div>

</div>
@endsection