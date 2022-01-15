<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <style type="text/css">
      label{
        display: inline-block;
        width: 200px;
      }
    </style>
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
            <div class="container" align="center" style="padding-top: 100px;">
                @if(session()->has('message'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{session()->get('message')}}
                  </div>
                @endif
                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div style="padding: 15px;">
                        <label>Doctor Name: </label>
                        <input type="text" name="name" placeholder="Wprowadz imie" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                      <label>Phone number: </label>
                      <input type="number" name="number" placeholder="123-456-789" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                      <label>Speciality: </label>
                      <select name="speciality" style="color: black; width: 200px;" required>
                        <option>--Select--</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                      </select>
                    </div>

                    <div style="padding: 15px;">
                      <label>Room number: </label>
                      <input type="text" name="room" placeholder="Pokoj" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                      <label>Doctor Image: </label>
                      <input type="file" name="file" required>
                    </div>

                    <div style="padding: 15px;">
                      <input type="submit" class="btn btn-success">
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