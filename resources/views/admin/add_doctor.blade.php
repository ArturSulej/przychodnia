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
                        <label>Imię i nazwisko lekarza: </label>
                        <input type="text" name="name" placeholder="Wprowadz imie i nazwisko" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                      <label>Numer telefonu: </label>
                      <input type="number" name="number" placeholder="123456789" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                      <label>Specjalność: </label>
                      <select name="speciality" style="color: black; width: 200px;" required>
                        <option>--Wybierz--</option>
                        <option value="kardiolog">Kardiolog</option>
                        <option value="laryngolog">Laryngolog</option>
                        <option value="okulista">Okulista</option>
                        <option value="dermatolog">Dermatolog</option>
                      </select>
                    </div>

                    <div style="padding: 15px;">
                      <label>Pokój: </label>
                      <input type="text" name="room" placeholder="101" style="color:black;" required>
                    </div>

                    <div style="padding: 15px;">
                      <label>Zdjęcie: </label>
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