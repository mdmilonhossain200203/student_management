
@extends('./customview/master')

@section("pageTitle", "All Courses")

@section('contentSection')

<div class="container-fluid py-5">
    
    {{-- ==== --}}

    <div class="container py-4">

        {{-- Page Header --}}
       
<div class="container py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center p-4 rounded-3 mb-4 bg-success bg-opacity-10">

        <div>
            <h2 class="fw-bold mb-1">All Courses</h2>
            <p class="text-muted mb-0">
                Explore and manage available courses
            </p>
        </div>

        <span class="badge bg-primary rounded-pill px-3 py-2">
            Total Courses: {{ $courses->count() }}
        </span>

    </div>


    {{-- Course Cards --}}
    <div class="row g-4">

        @forelse ($courses as $course)

            <div class="col-xl-4 col-md-6 col-12">

                <div class="card course-card h-100 border-2 border-success border-opacity-25 shadow-sm rounded-4">

                    {{-- Course Thumbnail --}}
                    <div class="position-relative">

                        @if($course->thumbnail)

                            <img src="{{ asset($course->thumbnail) }}"
                                 class="card-img-top course-image"
                                 alt="{{ $course->title }}">

                        @else

                            <div class="course-image-placeholder">
                                <i class="bi bi-image"></i>
                            </div>

                        @endif


                        {{-- Status --}}
                        <div class="position-absolute top-0 end-0 m-3">

                            @if($course->status == 'active')

                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-secondary rounded-pill px-3 py-2">
                                    {{ ucfirst($course->status) }}
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Card Body --}}
                    <div class="card-body p-4">

                        {{-- Title --}}
                        <h5 class="fw-bold text-dark mb-2">
                            {{ $course->title }}
                        </h5>


                        {{-- Description --}}
                        <p class="text-muted small mb-3">
                            {{ Str::limit($course->description, 100) }}
                        </p>


                        <hr class="opacity-25">


                        {{-- Duration and Price --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>

                                <small class="text-muted d-block mb-1">
                                    <i class="bi bi-clock me-1"></i>
                                    Duration
                                </small>

                                <span class="fw-semibold">
                                    {{ $course->duration }}
                                </span>

                            </div>


                            <div class="text-end">

                                <small class="text-muted d-block mb-1">
                                    <i class="bi bi-cash me-1"></i>
                                    Price
                                </small>

                                <span class="fw-bold text-success fs-5">
                                    {{ $course->price }}
                                </span>

                            </div>

                        </div>


                        {{-- Teacher --}}
                        <div class="bg-light rounded-3 p-3">

                            <small class="text-muted d-block mb-1">
                                <i class="bi bi-person-video3 me-1"></i>
                                Course Instructor
                            </small>

                            <div class="fw-semibold">

                                @forelse($course->user as $teacher)

                                    <span>{{ $teacher->name }}</span>@if(!$loop->last), @endif

                                @empty

                                    <span class="text-muted">
                                        Not assigned
                                    </span>

                                @endforelse

                            </div>

                        </div>

                    </div>


                    {{-- Card Footer --}}
                    <div class="card-footer bg-white border-0 px-4 pb-4">

                        {{-- Student --}}
                        @if(Auth::user()?->role_id == 3)

                            <a href="{{ url('/course/show', $course->slug) }}"
                               class="btn btn-primary rounded-pill w-100">

                                <i class="bi bi-book-half me-1"></i>
                                Enroll Now

                            </a>


                        {{-- Admin --}}
                        @elseif(Auth::user()?->role_id == 1)

                            <div class="d-flex gap-2">

                                <a href=""
                                   class="btn btn-outline-warning rounded-pill flex-fill">

                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit

                                </a>

                                <a href=""
                                   class="btn btn-outline-danger rounded-pill flex-fill">

                                    <i class="bi bi-trash me-1"></i>
                                    Delete

                                </a>

                            </div>


                        {{-- Guest User --}}
                        @else

                            <button type="button"
                                    class="btn btn-primary rounded-pill w-100"
                                    data-bs-toggle="modal"
                                    data-bs-target="#loginModal{{ $course->id }}">

                                <i class="bi bi-box-arrow-in-right me-1"></i>
                                Enroll Now

                            </button>


                            {{-- Login / Register Modal --}}
                            <div class="modal fade"
                                 id="loginModal{{ $course->id }}"
                                 tabindex="-1"
                                 aria-labelledby="loginModalLabel{{ $course->id }}"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">

                                    <div class="modal-content border-0 shadow rounded-4">

                                        {{-- Modal Header --}}
                                        <div class="modal-header border-0">

                                            <h5 class="modal-title fw-bold"
                                                id="loginModalLabel{{ $course->id }}">

                                                Login Required

                                            </h5>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                            </button>

                                        </div>


                                        {{-- Modal Body --}}
                                        <div class="modal-body text-center px-4 pb-4">

                                            <div class="mb-3">

                                                <i class="bi bi-lock-fill text-primary"
                                                   style="font-size: 50px;"></i>

                                            </div>


                                            <h5 class="fw-bold">
                                                Join This Course
                                            </h5>


                                            <p class="text-muted mb-4">

                                                You need to log in before enrolling
                                                in this course.

                                            </p>


                                            {{-- Buttons --}}
                                            <div class="d-flex justify-content-center gap-2">

                                                <a href="{{ url('/login') }}"
                                                   class="btn btn-primary rounded-pill px-4">

                                                    <i class="bi bi-box-arrow-in-right me-1"></i>
                                                    Login

                                                </a>


                                                <a href="{{ url('/register') }}"
                                                   class="btn btn-outline-primary rounded-pill px-4">

                                                    <i class="bi bi-person-plus me-1"></i>
                                                    Register

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="text-center bg-light rounded-4 p-5">

                    <i class="bi bi-book text-secondary"
                       style="font-size: 55px;"></i>

                    <h5 class="fw-bold mt-3">
                        No Courses Available
                    </h5>

                    <p class="text-muted mb-0">
                        There are currently no courses to display.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>


    {{-- Custom CSS --}}
    <style>

        /* Course Card */
        .course-card {
            border-radius: 16px !important;
            overflow: hidden;
            background: #ffffff;
        }

        /* Course Image */
        .course-image {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
        }

        /* No Image */
        .course-image-placeholder {
            width: 100%;
            height: 210px;
            background: #f1f3f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .course-image-placeholder i {
            font-size: 50px;
            color: #adb5bd;
        }

        /* Card Footer */
        .course-card .card-footer {
            background: #ffffff;
        }

        /* Button */
        .course-card .btn {
            font-weight: 500;
        }

    </style>


    
    {{-- ==== --}}
</div>

@endsection


@push('js')



{{-- 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            $("#button").click(function () {

                $.get(
                    "http://127.0.0.1:8000/student/name",
                    function (data, status) {

                        

                        alert(
                            "Data: " + JSON.stringify(data) +
                            "\nStatus: " + status
                        );

                    }
                );

            });

        });
    </script>
 --}}

    
@endpush
