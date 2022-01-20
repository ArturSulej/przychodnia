<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <base href="/public">
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
                <form action="{{url('sendemail',$data->id)}}" method="POST">
                  @csrf
                    <div style="padding: 15px;">
                        <label>Greeting: </label>
                        <input type="text" name="greeting" placeholder="Wprowadz imie" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                      <label>Body: </label>
                      <input type="text" name="body" style="color:black;" required>
                    </div>

                   

                    <div style="padding: 15px;">
                      <label>Action text: </label>
                      <input type="text" name="actiontext" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                        <label>Action url: </label>
                        <input type="text" name="actionurl" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                        <label>end part: </label>
                        <input type="text" name="endpart" style="color:black;" required>
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