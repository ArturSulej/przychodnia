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
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px;">
                        <label>Imię i nazwisko</label>
                        <input type="text" name="name" value="{{$data->name}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Telefon</label>
                        <input type="text" name="phone" value="{{$data->phone}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Specjalność</label>
                        <input type="text" name="speciality" value="{{$data->speciality}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Pokój</label>
                        <input type="text" name="room" value="{{$data->room}}" style="color:black;">
                    </div>
                    <div style="padding:15px;">
                        <label>Stary obraz</label>
                        <img height="150" width="150" src="doctorimage/{{$data->image}}">
                    </div>
                    <div style="padding:15px;">
                        <label>Nowy obraz</label>
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