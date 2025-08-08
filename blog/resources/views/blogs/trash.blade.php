@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', 'TRASHED BLOGS')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading fw-bold text-center mb-3">
        Trashed Blogs
    </div>

    <div class="panel-body">
        @if($trashedBlogs->isEmpty())
            <p>No trashed blogs available.</p>
        @else
        @php $n=1; @endphp
            <table class="table table-hover table-responsive mb-2">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Blog Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trashedBlogs as $blog)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td class="text-wrap">{{ $blog->title }}</td>
                            <td class="text-wrap">{!! Illuminate\Support\Str::limit($blog->description,100,'...') !!}</td>
                            <td>
                               
                            <form action="{{ route('blogs.restore', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-xs">Restore</button>
                                </form>

                                <!-- Delete Permanently -->
                                <form action="{{ route('blogs.forceDelete', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to permanently delete this blog?');">Delete Permanently</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
            @if($trashedBlogs->onFirstPage())

            @else
                <a href="{{ $trashedBlogs->previousPageUrl() }}">Prev</a>
            @endif

            @foreach($trashedBlogs->getUrlRange(1,$trashedBlogs->lastPage()) as $page=>$url)
            <a href="{{ $url }}" class="{{ $page==$trashedBlogs->currentPage() ? 'active' : '' }}">{{ sprintf('%02d',$page) }}</a>
            @endforeach

            @if($trashedBlogs->onLastPage())

            @else
                <a href="{{ $trashedBlogs->nextPageUrl() }}">Next</a>
            @endif


            </div>
        @endif
    </div>
</div>
@endsection
