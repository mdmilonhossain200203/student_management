@extends('./master')

@section("pageTitle", "all teacher")

@section('contentSection')
  
<div class="container">
    <div class="row p-4">

        

        <div class="col-md-12 col-lg-12">
            <table class="table table-striped table-bordered ">
                <thead class="bg-success text-white">
                    <th>teacher name</th>
                    <th>course name</th>
                    <th>price</th>
                    <th>duration</th>                
                    <th>action</th>

                  </thead>
                  <tbody>
                    @foreach ($teachers as $teacher )
                    <tr class="table-active">

                        <td>{{ $teacher->teachersName }}</td>
                   
                        <td> 
                            <ul class="list-item-group">
                                @foreach ($teacher->course as $course )
                                
                                <li class=""> {{ $course->title }}</li>
                                    
                                @endforeach
                         </ul>
                        </td>

                        <td>
                             
                            @foreach ($teacher->course as $course )
                                
                            <li class="list-unstyled"> {{ $course->duration }}</li> 
                            @endforeach
                          
                        </td>

                        <td>
                            
                            @foreach ($teacher->course as $course )
                                
                            <li class="list-unstyled"> {{ $course->price }} Day</li> 
                            @endforeach
                        </td>


                        <th>
                            
                            <a class="mx-2 text-danger" href="">delete</a>
                        </th>
                    </tr>
                    @endforeach
                   
                  </tbody>
              </table>
           
        </div>
        


    </div>
</div>

@endsection