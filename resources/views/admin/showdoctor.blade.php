<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <div  class="table-responsive" style="padding-top:100px;">
              <table class="table table-striped">
                <tr>
                  <th scope="col">Imię i nazwisko doktora</th>
                  <th scope="col">Telefon</th>
                  <th scope="col">Specjalność</th>
                  <th scope="col">Pokój</th>
                  <th scope="col">Zdjęcie</th>
                  <th scope="col">Aktualizuj</th>
                  <th scope="col">Usuń</th>
                </tr>
                @foreach($data as $doctor)
                <tr>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>{{$doctor->room}}</td>
                    <td><img height="200" width="200" src="doctorimage/{{$doctor->image}}"></td>
                    <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Aktualizuj</a></td>
                    <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Usuń</a></td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>