
@extends('./customview/master')

@section("pageTitle", "All Courses")

@section('contentSection')

<div class="container-fluid py-5">
    <div class="container">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">All Courses</h2>
                <p class="text-muted mb-0">Explore and manage available courses</p>
            </div>
        </div>

        {{-- Course Table Card --}}
        <div class="card border-0 shadow-sm rounded-4">
           

            <div class="card-body p-0">
                <div class="table-responsive">

                    <table class="table align-middle table-hover mb-0">

                        <thead class=" bg-primary bg-opacity-10">
                            <tr>
                                <th class="ps-4 py-3">Course</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Teacher</th>
                                <th>Status</th>
                                <th>Thumbnail</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($courses as $course)

                            <tr>

                                <td class="ps-4">
                                    <span class="fw-semibold text-dark">
                                        {{ $course->title }}
                                    </span>
                                </td>

                                <td style="min-width: 180px; max-width: 250px;">
                                    <span class="text-muted">
                                        {{ Str::limit($course->description, 55) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-light text-dark px-3 py-2">
                                        {{ $course->duration }}
                                    </span>
                                </td>

                                <td>
                                    <span class="fw-bold text-success">
                                        {{ $course->price }}
                                    </span>
                                </td>

                                <td>
                                    @foreach ($course->user as $teacher)
                                        <span class="text-dark">
                                            {{ $teacher->name }}
                                        </span>
                                    @endforeach
                                </td>

                                <td>
                                    @if($course->status == 'active')
                                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">
                                            {{ ucfirst($course->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if($course->thumbnail)
                                        <img src="{{ asset($course->thumbnail) }}"
                                             alt="Course Thumbnail"
                                             width="65"
                                             height="45"
                                             class="rounded-3 border"
                                             style="object-fit: cover;">
                                    @else
                                        <span class="text-muted small">No image</span>
                                    @endif
                                </td>

                                <td class="text-center">

                                    @if(Auth::user()?->role_id == 3)

                                        <a href="{{ url('/course/show', $course->slug) }}"
                                           class="btn btn-sm btn-primary rounded-pill px-3">
                                            Enroll
                                        </a>

                                        <a href=""
                                           class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                            Edit
                                        </a>

                                        <a href=""
                                           class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                            Delete
                                        </a>

                                    @else

                                        <button type="button"
                                                class="btn btn-sm btn-primary rounded-pill px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal{{ $course->id }}">
                                            Enroll Now
                                        </button>

                                        {{-- Login Modal --}}
                                        <div class="modal fade"
                                             id="loginModal{{ $course->id }}"
                                             tabindex="-1"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-dialog-centered">

                                                <div class="modal-content border-0 shadow rounded-4">

                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title fw-bold">
                                                            Login Required
                                                        </h5>

                                                        <button type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal">
                                                        </button>
                                                    </div>

                                                    <div class="modal-body text-center pb-4">

                                                        <div class="mb-3">
                                                            <i class="bi bi-lock-fill text-primary"
                                                               style="font-size: 45px;"></i>
                                                        </div>

                                                        <h5 class="fw-bold">
                                                            Join This Course
                                                        </h5>

                                                        <p class="text-muted">
                                                            You need to log in before enrolling
                                                            in this course.
                                                        </p>

                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ url('/login') }}"
                                                               class="btn btn-primary rounded-pill px-4">
                                                                Login
                                                            </a>

                                                            <a href="{{ url('/register') }}"
                                                               class="btn btn-outline-primary rounded-pill px-4">
                                                                Register
                                                            </a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    @endif

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="card-footer bg-primary bg-opacity-10 border-0 p-3">
                <small class="text-muted">
                    Total Courses: {{ $courses->count() }}
                </small>
            </div>

        </div>

    </div>
</div>

@endsection
