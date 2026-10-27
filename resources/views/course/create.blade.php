@extends('./master')

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
            <form class="form"  action="{{ url('course/store') }}" method='POST'>
                @csrf

                <div class="form-field">
                    <label for="" class="form-label">courese title</label>
                    <input type="text" name="coureseTitle"  class="form-control" id=""> </input>
                </div>

                <div class="form-field">
                    <label for="" class="form-label">courese price</label>
                    <textarea type='text' name="description" class="form-control" id=""> </textarea>
                </div>
                  
                <div class="form-field">
                    <label for="" class="form-label">courese duration</label>
                    <input type="number" name="price" class="form-control" id=""> </input>
                </div>
                <div class="form-field">
                    <label for="" class="form-label">courese price</label>
                    <input name="duration" class="form-control" id=""> </input>
                </div>

                <div class="form-field">
                    <label for="" class="form-label">courese teacher</label>
                    <br/>
                    <select name="" id="" class="p-1">
                        <option value="">teacher</option>
                    </select>
                    
                </div>

               

                <div class=" mb-2 ">
                    <label for="" class="form-label ">courese status</label> <br/>
                    <select name="" id="" class="p-2">
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                    </select>
                </div>
                
                <div class="form-field">
                    <label for="" class="form-label"> thumbnail image</label>
                    <input name="thumbnail" type="file" class="form-control" id=""> </input>
                </div>
              
              <button type="submit" class="btn btn-danger my-2">submit</button>

            </form>
        </div>
        <div class="col-md-2 col-lg-2"> </div>


    </div>
</div>

@endsection