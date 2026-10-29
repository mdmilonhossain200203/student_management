@extends('./master')

@section("pageTitle", "all course")

@section('contentSection')
  
<div class="container">

<div class="row">

  <div class="col-md-12 col-lg-12">

    <div class="card p-5 my-2">

      <div class=" d-flex justify-content-around ">
        <div class="img">
          <h4>course:{{ $course->title }} </h4>
          <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}_img">

        </div>
        <div class="details">

          <h2>course:{{ $course->title }} </h2>
          <p>description:{{ $course->description }} </p>
          <p>price:{{ $course->price }} Tk </p>
          <p>duration:{{ $course->duration }}Day </p>
          <p>status:{{ $course->status }} </p>


          @foreach ($course->user as $teacher)
          <p>{{ $teacher->name }}</p>
          @endforeach

         

          <form action="{{ url('enrollment/store') }}">
            @csrf
            <label for="">student id</label>
            {{-- <input type="text" value="{{ \Auth::user()->name}}"> --}}
            
            <input name="studentId" type="text" value="{{ $course->id }}"  >
            <button class="btn btn-primary"> enroll now</button>
          </form>

        </div>
    </div>

    </div>


  </div>
</div>

{{--  --}}
        


    </div>
</div>

@endsection