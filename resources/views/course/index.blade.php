@extends('./master')

@section("pageTitle", "all course")

@section('contentSection')
  
<div class="container">
    <div class="row p-4">

        <div class="col-md-12 col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th>course title</th>
                    <th>description</th>
                    <th>duration</th>
                    <th>price</th>
                    <th>teacher</th>
                    <th>status</th>
                    <th>thumbnail</th>
                    <th>action</th>
                  </thead>
                  <tbody>
                    @foreach ($courses as $course )
                    <tr class="table-active">

                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->duration }} </td>
                        <td>{{ $course->price }} </td>
                        <td>
                            @foreach ($course->teacher as $teacher )
                                {{ $teacher->teachersName }}
                            @endforeach
                        </td>
                        <td>{{ $course->status }}</td>
                        <td>{{ $course->thumbnail }}</td>
                        <th>
                          
                            @if(Auth::user()?->role_id == 3)
                             {{-- {{ Auth::user()->name }} --}}
                             <a class="mx-2" href="{{ url('/course/show',$course->id) }}">enroll course</a>
                            @else


                                                        
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">your are not loging </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pb-2">
                                    <p class="pb-3">
                                        your are not loging user. join the course first need to  <a href="{{ url('/login') }}">account login</a> or <a href="{{ url('/register') }}">register</a>
                                    </p>
                                    </div>
                                
                                </div>
                                </div>
                            </div>
                            


                            {{-- <a class="mx-2" href="{{ url('/enrollment') }}">enroll course</a> --}}
                            @endif
                           

                            <a class="mx-2" href="">edit</a>
                            <a class="mx-2" href="">delete</a>
                        </th>
                    </tr>
                    @endforeach
                   
                  </tbody>
              </table>
           
        </div>
        


    </div>
</div>

@endsection