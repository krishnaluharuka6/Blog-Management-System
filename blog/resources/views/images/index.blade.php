@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title','Image Folders')
@section('content')


    <!-- List of Images -->
    <h3>Uploaded Images</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Blog</th>
                <th>Image Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $image->file_path) }}" alt="Image" width="100">
                    </td>
                    <td>
                        @if($image->blog)
                            {{ $image->blog->title }}
                        @else
                            <span class="text-muted">No associated blog</span>
                        @endif
                    </td>
                    <td>{{ ucfirst($image->image_type) }}</td>
                    <td>
                        <!-- Delete Button -->
                        <form action="{{ route('images.destroy', $image->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
@endsection
