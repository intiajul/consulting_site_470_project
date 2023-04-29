<!DOCTYPE html>
<html lang="en">
  <head>
  <style type="text/css">
      label
      {
        display: inline-block;
        width: 200px;
      }
    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <div class="container" align="Center" style="padding:100px;">
        @if(session()->has('message'))

        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">
          x
          </button>
          {{session()->get('message')}}

        </div>
        @endif

        

          <form action="{{url('upload_ambulance')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div align="center" style="padding:15px;">
              <label>Driver's Name</label>
              <input type="text" style="color:black" name="name" placeholder="Write the name!" required="">
            </div>
            
            <div align="center" style="padding:15px;">
              <label>Phone</label>
              <input type="number" style="color:black" name="number" placeholder="Write the number!" required="">
            </div>
            
            <div align="center" style="padding:15px;">
              <label>Number Plate</label>
              <input type="number" style="color:black" name="numberplate" placeholder="Write the plate number!" required="">
            </div>

        
            <div align="center" style="padding:15px;">
              <label>Car Image</label>
              <input type="file" name="file" required="">
            </div>
            <div align="center" style="padding:15px;">
              
              <input type="submit" class="btn btn-success">
            </div>
          </form>
        </div>  

        </div>
    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>