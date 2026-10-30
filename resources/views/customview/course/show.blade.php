
@extends('./customview/master')

@section("pageTitle", "Course Details")

@section('contentSection')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="row g-0">

                    {{-- Course Image --}}
                    <div class="col-md-5 bg-light">
                        <div class="h-100">
                            <img 
                                src="{{ $course->thumbnail }}" 
                                alt="{{ $course->title }}_img"
                                class="img-fluid w-100 h-100"
                                style="object-fit: cover; min-height: 400px;"
                            >
                        </div>
                    </div>

                    {{-- Course Details --}}
                    <div class="col-md-7">
                        <div class="p-4 p-lg-5">

                         

                          @if (session('error'))
                              <div class="p-3 alert alert-danger">
                                  {{ session('error') }}
                              </div>
                          @endif

                           
                            <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">
                                {{ $course->status }}
                            </span>

                            <h2 class="fw-bold text-dark mb-3">
                                {{ $course->title }}
                            </h2>

                            <p class="text-muted mb-4" style="line-height: 1.8;">
                                {{ $course->description }}
                            </p>

                            <hr>

                            {{-- Course Information --}}
                            <div class="row g-3 mb-4">

                                <div class="col-6">
                                    <div class="bg-light rounded-3 p-3 h-100">
                                        <small class="text-muted d-block mb-1">
                                            Course Price
                                        </small>
                                        <h4 class="fw-bold text-primary mb-0">
                                            {{ $course->price }} Tk
                                        </h4>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="bg-light rounded-3 p-3 h-100">
                                        <small class="text-muted d-block mb-1">
                                            Duration
                                        </small>
                                        <h4 class="fw-bold text-dark mb-0">
                                            {{ $course->duration }} Days
                                        </h4>
                                    </div>
                                </div>

                            </div>

                            {{-- Teachers --}}
                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-person-video3 text-primary me-2"></i>
                                Course Instructors
                            </h6>

                            @foreach ($course->user as $teacher)
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-primary bg-opacity-50 rounded-circle p-2 me-2">
                                        <i class="bi bi-person-fill text-primary"></i>
                                    </div>
                                    <span class="fw-semibold text-dark">
                                        {{ $teacher->name }}
                                    </span>
                                </div>
                            @endforeach

                            <hr class="my-4">

                            {{-- Enrollment --}}
                            <form action="{{ url('enrollment/store') }}" method="post">
                                @csrf

                                <input 
                                    name="courseId" 
                                    type="hidden" 
                                    value="{{ $course->id }}"
                                >
                                <input 
                                    name="studentId" 
                                    type="hidden" 
                                    value="{{ Auth::user()->id }}"
                                >

                                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 fw-semibold">
                                    Enroll Now
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>


            

            <div class="text-center mt-4">
                <a href="{{ url()->previous() }}" class="text-decoration-none text-muted">
                    <i class="bi bi-arrow-left me-1"></i> Back to Courses
                </a>
            </div>

        </div>
    </div>

</div>

@endsection
