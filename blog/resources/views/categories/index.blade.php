@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', 'CATEGORIES')
@section('content')
<div class="panel panel-default">
    <div class="panel-head fw-bold text-center mb-3">
        BLOG CATEGORIES
    </div>
    <a href="{{ route('create_category') }}" class="btn btn-inverse-primary mb-4">Add Category
            </a>
    <div class="panel-body">
    <table class="table table-hover mb-3">
        <thead>
            <th>S.N.</th>
            <th>Category Name</th>
            <th>Actions</th>
        </thead>
        @php $n=1; @endphp
        @foreach($categories as $category)
        <tbody>
        
            <td>{{ $n++ }}</td>
            <td>{{ $category->name }}</td>
            <td><a href="{{ route('categories.edit',['id'=>$category->id]) }}" class="btn btn-warning">
            Edit
            </a>&nbsp;
            <a href="{{ route('categories.delete',['id'=>$category->id]) }}" class="btn btn-danger">Delete
            </a></td>
        </tbody>
        @endforeach
    </table>
    <div class="pagination">
        @if($categories->onFirstPage())
        <!--  -->
        @else
            <a href="{{ $categories->previousPageUrl() }}">Prev</a>
        @endif

        @foreach($categories->getUrlRange(1,$categories->lastPage()) as $page=>$url)
            <a href="{{ $url }}" class="{{ $page==$categories->currentPage() ? 'active' : '' }}">
                {{ sprintf('%02d',$page) }}
            </a>
        @endforeach

        @if($categories->onLastPage())

        @else
            <a href="{{ $categories->nextPageUrl() }}">Next</a>
        @endif
    </div>
    </div>
</div>
@endsection