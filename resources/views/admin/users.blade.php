@extends('admin.app')

@section('content')

<div class="container-fluid">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('err'))
    <div class="alert alert-danger">
        {{ session()->get('err') }}
    </div>
    @endif
</div>
<h3 style="text-align:center;">Pending Users</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Qualification</th>
            <th>Languages</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pending_users as $key => $user)
        <tr>
            <th>{{ $pending_users->firstItem() + $key }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="{{ $user->photo }}" height="50px" width="50px" alt="No Image"></td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->qualification }}</td>
            <td>
                @foreach($user->languages as $lang)
                {{ $lang }}
                @endforeach
            </td>
            <td>{{ $user->address }}</td>

            @if($user->status == 'pending')
            <td>Pending</td>
            @endif
            @if($user->status == 'rejected')
            <td>Rejected</td>
            @endif
            @if($user->status == 'approved')
            <td>Approved</td>
            @endif

            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                    <button type="button" class="btn btn-info" onClick="location.href='{{ route('approve', ['user_id'=>$user->user_id, 'action' => 'approved']) }}'">
                        Approve
                    </button>
                    <button type="button" class="btn btn-danger" onClick="location.href='{{ route('reject', ['user_id'=>$user->user_id, 'action' => 'rejected']) }}'">
                        Reject
                    </button>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div style="font-size: 15px;">
{{ $pending_users->links('pagination::bootstrap-4') }}
</div>


<h3 style="text-align:center;">Approved Users</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Qualification</th>
            <th>Languages</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($approved_users as $key => $user)
        <tr>
            <th>{{ $approved_users->firstItem() + $key }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="{{ $user->photo }}" height="50px" width="50px"></td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->qualification }}</td>
            <td>
                @foreach($user->languages as $lang)
                {{ $lang }}
                @endforeach
            </td>
            <td>{{ $user->address }}</td>

            @if($user->status == 'pending')
            <td>Pending</td>
            @endif
            @if($user->status == 'rejected')
            <td>Rejected</td>
            @endif
            @if($user->status == 'approved')
            <td>Approved</td>
            @endif

            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                    <button type="button" class="btn btn-info" onClick="location.href='{{ route('approve', ['user_id'=>$user->user_id, 'action' => 'approved']) }}'">
                        Approve
                    </button>
                    <button type="button" class="btn btn-danger" onClick="location.href='{{ route('reject', ['user_id'=>$user->user_id, 'action' => 'rejected']) }}'">
                        Reject
                    </button>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div style="font-size: 15px;">
{{ $approved_users->links('pagination::bootstrap-4') }}
</div>


<h3 style="text-align:center;">Rejected Users</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Qualification</th>
            <th>Languages</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rejected_users as $key => $user)
        <tr>
            <th>{{ $rejected_users->firstItem() + $key }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="{{ $user->photo }}" height="50px" width="50px"></td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->qualification }}</td>
            <td>
                @foreach($user->languages as $lang)
                {{ $lang }}
                @endforeach
            </td>
            <td>{{ $user->address }}</td>

            @if($user->status == 'pending')
            <td>Pending</td>
            @endif
            @if($user->status == 'rejected')
            <td>Rejected</td>
            @endif
            @if($user->status == 'approved')
            <td>Approved</td>
            @endif

            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                    <button type="button" class="btn btn-info" onClick="location.href='{{ route('approve', ['user_id'=>$user->user_id, 'action' => 'approved']) }}'">
                        Approve
                    </button>
                    <button type="button" class="btn btn-danger" onClick="location.href='{{ route('reject', ['user_id'=>$user->user_id, 'action' => 'rejected']) }}'">
                        Reject
                    </button>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div style="font-size: 15px;">

{{ $rejected_users->links('pagination::bootstrap-4') }}
</div>
@endsection