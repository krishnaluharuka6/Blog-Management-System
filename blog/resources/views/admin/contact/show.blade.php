@extends('layouts.admin_dashboard')
@section('content')
<div class="panel panel-default">
    <div class="panel-head fw-bold text-center mb-3">
        Contact Messages
    </div>
    <div class="panel-body">
    <table class="table table-hover mb-3">
        <thead>
            <th>S.N.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Action</th>
        </thead>
        @php $n=1; @endphp
        @foreach($contact as $msg)
        <tbody> 
            <td>{{ $n++ }}</td>
            <td>{{ $msg->name }}</td>
            <td>{{ $msg->email }}</td>
            <td>{{ $msg->contact }}</td>
            <td>{{ $msg->message }}</td>
            <td>
                <a href="{{ route('contact.markRead', $msg->id) }}" class="text-dark p-2 btn xs-small" @if(!$msg->is_read) style="background-color:rgb(248, 250, 134);" @else style="background-color:rgb(178, 236, 192);" @endif>Mark as Read</a>
            </td>
        </tbody>
        @endforeach
    </table>
    <div class="pagination">
        @if($contact->onFirstPage())
        <!--  -->
        @else
            <a href="{{ $contact->previousPageUrl() }}">Prev</a>
        @endif

        @foreach($contact->getUrlRange(1,$contact->lastPage()) as $page=>$url)
            <a href="{{ $url }}" class="{{ $page==$contact->currentPage() ? 'active' : '' }}">
                {{ sprintf('%02d',$page) }}
            </a>
        @endforeach

        @if($contact->onLastPage())

        @else
            <a href="{{ $contact->nextPageUrl() }}">Next</a>
        @endif
    </div>
    </div>
</div>

@endsection