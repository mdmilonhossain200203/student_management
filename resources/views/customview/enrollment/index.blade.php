@extends('./customview/master')

@section("pageTitle", "enrollment")

@section('contentSection')
  
<div class="container">
    <div class="row p-4">

        
        <h3>enrollment </h3>
   

        <div class="col-md-12 col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Thumbnail</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($Enrollment as $Enroll)
                        <tr class="table-active">
                            
                            <td>
                                @foreach ($Enroll->studentUser as $studentUser)
                                    {{ $studentUser->name == $studentUser->name ? "$studentUser->name" :"user name undifine"}}
                                @endforeach
                            </td>
                            
                            <td>{{ $Enroll->course->title }}</td>
                            <td>{{ $Enroll->course->description }}</td> 
                            <td>{{ $Enroll->course->price }}</td>
                            <td>{{ $Enroll->course->duration }}</td>
                            
                         
                            <td>
                                <span class="badge {{ $Enroll->course->payment_status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $Enroll->course->payment_status??"need to payment" }}
                                </span>
                            </td>
                            
                           
                            <td>
                                @if($Enroll->course->thumbnail)
                                    <img src="{{ asset('/' ) }}" alt="Thumbnail" width="50" class="img-thumbnail">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>

            </table>

            {{ $Enrollment->links() }}
           
        </div>
        


    </div>
</div>

@endsection