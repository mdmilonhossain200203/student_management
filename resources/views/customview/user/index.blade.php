@extends('./customview/master')

@section("pageTitle", "All Users")

@section('contentSection')

<div class="container py-5">



    {{-- Header --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">All Users</h2>
        <p class="text-muted mb-0">Manage user roles and permissions.</p>
    </div>

    {{-- User Table Card --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
       
        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th class="ps-4">User Name</th>
                        <th>User Role</th>
                        <th>Role ID</th> 
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        {{-- User Name --}}
                        <td class="ps-4">
                            <span class="fw-semibold text-dark">{{ $user->name }}</span>
                        </td>

                        {{-- User Role Name --}}
                        <td>
                            <span class="badge bg-light text-primary border px-2.5 py-1.5 fw-semibold">
                                {{ $user->role->name ?? 'No Role' }}
                            </span>
                        </td>

                        {{-- Role ID --}}
                        <td>
                            <span class="text-muted font-monospace">{{ $user->role_id }}</span>
                        </td>

                        {{-- Action Buttons --}}
                        <td class="text-end pe-4">

                            {{ Auth::user()->id }}55{{ $user->id }}

                            
                            @if (Auth::id() === $user->id && $user->role_id === 1)
                                
                                <span class="badge bg-primary-subtle text-primary fw-bold">You</span>
                            @elseif ($user->role_id == 1) 
                                
                                <a href="{{ url('user/edit/' . $user->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                    <i class="bi bi-pencil-square me-1"></i> Edit Admin
                                </a>
                            @else 
                              
                                <a href="{{ url('user/edit/' . $user->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

        {{-- Card Footer --}}
        <div class="card-footer bg-white border-top p-3 ps-4">
            <small class="text-muted fw-medium">
                Total Users: {{ $users->count() }}
            </small>
        </div>

    </div>

</div>

@endsection
