@extends('./customview/master')

@section("pageTitle", "All Teachers")

@section('contentSection')

<div class="container py-5">

    {{-- Header --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">All Teachers</h2>
        <p class="text-muted mb-0">Manage teachers and their assigned courses.</p>
    </div>

    {{-- Teacher Table --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        
        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        {{-- <th class="ps-4 py-3">#</th> --}}
                        <th>Teacher Name</th>
                        <th>Course Name</th>
                        <th>Duration</th>
                        <th>Price</th>
                        {{-- <th class="text-center">Action</th> --}}
                    </tr>
                </thead>

                <tbody>

                    @forelse ($users as $teacher)

                    <tr>

                        {{-- <td class="ps-4 text-muted">
                            {{ $loop->iteration }}
                        </td> --}}

                        <td>
                            <div class="d-flex align-items-center gap-2">


                                <span class="fw-semibold">
                                    {{ $teacher->name }}
                                </span>

                            </div>
                        </td>

                        <td>
                            @forelse ($teacher->course as $course)

                                <div class="mb-2">
                                    <span class="badge bg-light text-dark border px-3 py-2">
                                        {{ $course->title }}
                                    </span>
                                </div>

                            @empty
                                <span class="text-muted small">No courses assigned</span>
                            @endforelse
                        </td>

                        <td>
                            @forelse ($teacher->course as $course)

                                <div class="mb-2 text-muted">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $course->duration }} Days
                                </div>

                            @empty
                                <span class="text-muted">—</span>
                            @endforelse
                        </td>

                        <td>
                            @forelse ($teacher->course as $course)

                                <div class="mb-2 fw-semibold text-success">
                                    {{ $course->price }} Tk
                                </div>

                            @empty
                                <span class="text-muted">—</span>
                            @endforelse
                        </td>

                        {{-- <td class="text-center">
                            <a href=""
                               class="btn btn-sm btn-outline-danger rounded-pill px-3"
                               onclick="return confirm('Are you sure you want to delete this teacher?')">

                                <i class="bi bi-trash me-1"></i>
                                Delete

                            </a>
                        </td> --}}

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-people text-muted fs-1"></i>
                            <p class="text-muted mt-2 mb-0">No teachers found.</p>
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer bg-white border-0 p-3">
            <small class="text-muted">
                Total Teachers: {{ $users->count() }}
            </small>
        </div>

    </div>

</div>

@endsection
