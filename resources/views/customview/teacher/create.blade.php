@extends('./customview/master')

@section("pageTitle", "create")

@section('contentSection')
  
<div class="container">
    <div class="row">

        
        <div class="col-md-2 col-lg-2 text-info"> </div>

        <div class="col-md-8 col-lg-8">
            <p>
                <!-- title, description, price, duration, assigned teacher,
                thumbnail image, and status (active/inactive) -->
            </p>
            {{-- <form class="form"  action="{{ url('teacher/store') }}" method='POST'>
                @csrf

                <div class="form-field">
                    <label for="" class="form-label">teacher name</label>
                    <input type="text" name="teacherName"  class="form-control" id=""> </input>
                </div>

              
              <button type="submit" class="btn btn-danger my-2">submit</button>

            </form> --}}
        </div>
        <div class="col-md-2 col-lg-2"> </div>


    </div>
</div>

@endsection