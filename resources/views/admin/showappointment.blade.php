<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pokaż wizyty</title>
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
            <div class="table-responsive" style="padding-top: 100px;">
              <table class="table table-striped">
                <tr>
                  <th scope="col">Pacjent</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefon</th>
                  <th scope="col">Lekarz</th>
                  <th scope="col">Data</th>
                  <th scope="col">Wiadomość</th>
                  <th scope="col">Status</th>
                  <th scope="col">Akceptuj</th>
                  <th scope="col">Odrzuć</th>
                  <th scope="col">Wyślij email</th>
                </tr>
                @foreach($data as $appoint)
                <tr>
                    <td>{{$appoint->name}}</td>
                    <td>{{$appoint->email}}</td>
                    <td>{{$appoint->phone}}</td>
                    <td>{{$appoint->doctor}}</td>
                    <td>{{$appoint->date}}</td>
                    <td>{{$appoint->message}}</td>
                    <td>{{$appoint->status}}</td>
                    @if($appoint->status == 'In progress')
                      <td><a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Akceptuj</a></td>
                      <td><a class="btn btn-danger" href="{{url('declined',$appoint->id)}}">Anuluj</a></td>
                      <td><a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Wyślij email</a></td>
                      @else
                        @if($appoint->status == 'Approved' || $appoint->status == 'Declined')
                          <td><a class="btn btn-success disabled" href="{{url('approved',$appoint->id)}}">Akceptuj</a></td>
                          <td><a class="btn btn-danger disabled" href="{{url('declined',$appoint->id)}}">Anuluj</a></td>
                          <td><a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Wyślij email</a></td>
                        @endif
                    @endif
                    
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