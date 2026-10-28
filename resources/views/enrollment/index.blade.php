@extends('./master')

@section("pageTitle", "enrollment")

@section('contentSection')
  
<div class="container">
    <div class="row p-4">

        

        <div class="col-md-12 col-lg-12">
            <table class="table table-striped">
                {{-- <thead>
                    <th>course title</th>
                    <th>description</th>
                    <th>price</th>
                    <th>duration</th>
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
                        <td>{{ $course->duration }}</td>
                        <td>{{ $course->price }}</td>
                        <td>
                            @foreach ($course->teacher as $teacher )
                                {{ $teacher->teachersName }}
                            @endforeach
                        </td>
                        <td>{{ $course->status }}</td>
                        <td>{{ $course->thumbnail }}</td>
                        <th>
                            <a class="mx-2" href="{{  }}">enroll course</a>
                            <a class="mx-2" href="">edit</a>
                            <a class="mx-2" href="">delete</a>
                        </th>
                    </tr>
                    @endforeach
                   
                  </tbody>
              </table> --}}
           
        </div>
        


    </div>
</div>

@endsection