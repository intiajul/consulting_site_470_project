
<!DOCTYPE html>
<html lang="en">
  <head>
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
        <!-- partial -->
      
        <div class="container-fluid page-body-wrapper">
        <div align="center" style="padding-top:100px;">
        <table>
            <tr style="background-color:green;">
              <th style="padding:10px;">Doctor Name</th>
              <th style="padding:10px;">Phone</th>
              <th style="padding:10px;">Speciality</th>
              <th style="padding:10px;">Fee</th>
              <th style="padding:10px;">Image</th>
              <th style="padding:10px;">Delete</th>
              <th style="padding:10px;">Update</th>
            </tr>
        @foreach($data as $doctor)
            <tr align="center" style="background-color:red;">
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->speciality}}</td>
                <td>{{$doctor->fee}}</td>
                <td><img height="100" width="100" src="doctorimage/{{$doctor->image}}"></td>
                <td><a onclick="return confirm('Are you sure to delete this?')"class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</td>
                <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</td>
</tr>
@endforeach
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>