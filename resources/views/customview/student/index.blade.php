
@extends('./customview/master')

@section("pageTitle", "All Student")

@section('contentSection')

<div class="container-fluid py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">All Student</h2>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-0">
                <div class="table-responsive">

                    <table class="table-bordered table align-middle table-hover mb-0">

                        <thead class="bg-primary bg-opacity-10">
                            <tr>
                                <th class="ps-4 py-3">Student Name</th>
                                <th>Enrolled Course</th>
                                <th class="text-center">Payment</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($students as $student)

                                <tr>
                                    {{-- Student Name --}}
                                    <td class="ps-4">
                                        <span class="fw-semibold text-dark">
                                            {{ $student->name }}
                                        </span>
                                    </td>

                                    {{-- Enrolled Courses --}}
                                    <td class="ps-4">
                                        <ul class="mb-0">
                                            @forelse ($student->enrollment as $enrollment)
                                                <li>
                                                    {{ $enrollment->course->title ?? 'Course not found' }}
                                                </li>
                                            @empty
                                                <li class="text-muted">
                                                    No course enrolled
                                                </li>
                                            @endforelse
                                        </ul>
                                    </td>

                                    {{-- Payment Status --}}
                                    <td class="text-center">
                                        <ul class="list-unstyled mb-0">
                                            @forelse ($student->enrollment as $enrollment)
                                                <li>
                                                    @if ($enrollment->payment_status == 'paid')
                                                        <span class="badge bg-success">
                                                            Paid
                                                        </span>
                                                    @else
                                                        <span class="badge bg-primary bg-opacity-10 text-dark">
                                                            {{ ucfirst($enrollment->payment_status) }}
                                                        </span>
                                                    @endif
                                                </li>
                                            @empty
                                                <li class="text-muted">
                                                    No payment
                                                </li>
                                            @endforelse
                                        </ul>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        No students found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="card-footer bg-primary bg-opacity-10 border-0 p-3">
                <small class="text-muted">
                    Total Students: {{ $students->count() }}
                </small>
            </div>

        </div>

    </div>
</div>

@endsection
