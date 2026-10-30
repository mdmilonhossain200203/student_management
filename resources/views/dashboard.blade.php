
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    {{-- <x-slot name="milon">
        <h2 class="h4 mb-0 text-dark">
            i am milon hossain
        </h2>
    </x-slot> --}}

    <div class="container py-5">

        {{-- <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title">Welcome to Dashboard</h3>
                <p class="card-text">
                    You are successfully logged in!
                </p>

                <a href="#" class="btn btn-primary">
                    Get Started
                </a>
                <a href="#" class="btn btn-primary">
                    add teacher
                </a>
                <a href="#" class="btn btn-primary">
                    add course
                </a>
            </div>
        </div> --}}

        <div class="row g-4">

            <div class="col-md-4 col-lg-4 ">
                <div class="card p-5 border-0 shadow-sm">
                    <div>
                        <h4 class="h5 fw-bolder text-uppercase">    all user  <span class="fw-bolder badge text-primary"> {{ \App\Models\User::count() }} </span></h4>

                        <div class="flex justify-content-start">
                            <a href="" class="m-2">user list</a>
                            <a href="" class="m-2">add new user
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 ">
                <div class="card p-5 border-0 shadow-sm">
                    <div>
                        <h4 class="h5 fw-bolder text-uppercase">    all student  <span class="fw-bolder badge text-primary"> {{ \App\Models\User::whereHas('role', function ($query) {
                            $query->where('id', 3);
                        })->count() }} </span></h4>

                        <div class="flex justify-content-start">
                            <a href="" class="m-2">student list</a>
                            <a href="" class="m-2">add new student
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 ">
                <div class="card p-5 border-0 shadow-sm">
                    <div>
                        <h4 class="h5 fw-bolder text-uppercase">    all teacher  <span class="fw-bolder badge text-primary"> {{ \App\Models\User::whereHas('role', function ($query) {
                            $query->where('id', 2);
                        })->count() }} </span></h4> 

                        <div class="flex justify-content-start">
                            <a href="" class="m-2">teacher list</a>
                            <a href="" class="m-2">add new teacher
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 ">
                <div class="card p-5 border-0 shadow-sm">
                    <div>
                        <h4 class="h5 fw-bolder text-uppercase">    all course  <span class="fw-bolder badge text-primary"> {{ \App\Models\Course::count() }} </span></h4> 

                        <div class="flex justify-content-start">
                            <a href="" class="m-2">course list</a>
                            <a href="" class="m-2">add new course
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            
           
            

            
        </div>

    </div>
</x-app-layout>
