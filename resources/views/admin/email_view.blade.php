
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
    <style type="text/css">
      label
      {
        display: inline-block;
        width: 200px;
      }
    </style>
    <!-- Required meta tags -->
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

        

          <form action="{{url('sendemail',$data->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div align="center" style="padding:15px;">
              <label>Greeting</label>
              <input type="text" style="color:black" name="greeting" placeholder="Write the greeting" required="">
            </div>
            
            <div align="center" style="padding:15px;">
              <label>Body</label>
              <input type="text" style="color:black" name="body" placeholder="Write the body" required="">
            </div>
            
            
            <div align="center" style="padding:15px;">
              <label>Action text</label>
              <input type="text" style="color:black" name="actiontext" placeholder="Write the action text" required="">
            </div>
            
            <div align="center" style="padding:15px;">
              <label>Action url</label>
              <input type="text" style="color:black" name="actionurl" placeholder="Write the action url" required="">
            </div>
            <div align="center" style="padding:15px;">
              <label>End Part</label>
              <input type="text" style="color:black" name="endpart" placeholder="Write the end part" required="">
            </div>
            <div align="center" style="padding:15px;">
              
              <input type="submit" class="btn btn-success">
            </div>
          </form>
        </div>  
</div>
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>