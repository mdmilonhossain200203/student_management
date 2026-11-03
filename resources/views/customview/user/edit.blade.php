@extends('./customview/master') 

@section('pageTitle', 'Edit User') 

@section('contentSection') 
<div class="container py-5"> 
    
    {{-- Header --}} 
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <h2 class="fw-bold text-dark mb-1">Edit User role</h2>
            <p class="text-muted small">Update user role and access control permissions.</p>
        </div>
    </div> 

    {{-- User Edit Form --}} 
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden"> 
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ url('/user/update', $user->id) }}" method="POST"> 
                        @csrf 
                        @method('PUT') 

                        {{-- Name Field --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-secondary">Full Name</label>
                            <input readonly type="text" name="name" id="name" class="form-control form-control-lg rounded-2" value="{{ $user->name }}" placeholder="Enter full name" >
                        </div>

                        {{-- Email Field --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-secondary">Email Address</label>
                            <input readonly type="email" name="email" id="email" class="form-control form-control-lg rounded-2" value="{{ $user->email }}" placeholder="name@example.com" >
                        </div>

                        {{-- Password Field --}}
                        {{-- <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-secondary">Password <span class="text-muted fw-normal small">(Leave blank to keep current)</span></label>
                            <input type="password" value="{{ $user->password }}" name="password" id="password" class="form-control form-control-lg rounded-2" placeholder="••••••••">
                        </div> --}}

                        {{-- Role Selection Field --}}
                        <div class="mb-4">
                            <label for="newRole" class="form-label fw-semibold text-secondary">User Role</label>
                            <select name="newRole" id="newRole" class="form-select form-control-lg rounded-2">
                                {{-- Current Role Selected by Default --}}
                                <option value="{{ $user->role->id }}" selected>{{ $user->role->name }} (Current)</option>
                                
                                {{-- Other Roles --}}
                                @foreach ($role as $rol) 
                                    @continue($rol->id == $user->role->id) 
                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option> 
                                @endforeach 
                            </select> 
                        </div> 

                        {{-- Action Buttons --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 pt-2">
                            <a href="{{ url()->previous() }}" class="btn btn-light btn-lg px-4 rounded-2 border text-secondary me-md-2">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-lg px-4 rounded-2 shadow-sm">Update Profile</button> 
                        </div>
                    </form> 

                </div>
            </div> 
        </div>
    </div>

</div> 
@endsection