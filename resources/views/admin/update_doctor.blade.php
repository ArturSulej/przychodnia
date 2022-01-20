<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="/public">
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
    <title>Corona Admin</title>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding:100px">
                @if(session()->has('message'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{session()->get('message')}}
                  </div>
                @endif
                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px;">
                        <label>Doctor name</label>
                        <input type="text" name="name" value="{{$data->name}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Phone</label>
                        <input type="number" name="phone" value="{{$data->phone}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Speciality</label>
                        <input type="text" name="speciality" value="{{$data->speciality}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Room number</label>
                        <input type="text" name="room" value="{{$data->room}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Old Image</label>
                        <img height="150" width="150" src="doctorimage/{{$data->image}}">
                    </div>
                    <div style="padding:15px;">
                        <label>New Image</label>
                        <input type="file" name="file">
                    </div>
                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>