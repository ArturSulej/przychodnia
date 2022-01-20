<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Show appointments</title>
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
            <div align="center" style="padding-top:100px;">
              <table>
                <tr style="background-color: black;">
                  <th style="padding:10px;">Customer name</th>
                  <th style="padding:10px;">Email</th>
                  <th style="padding:10px;">Phone</th>
                  <th style="padding:10px;">Doctor Name</th>
                  <th style="padding:10px;">Date</th>
                  <th style="padding:10px;">Message</th>
                  <th style="padding:10px;">Status</th>
                  <th style="padding:10px;">Approve</th>
                  <th style="padding:10px;">Cancel</th>
                  <th style="padding:10px;">Send mail</th>
                </tr>
                @foreach($data as $appoint)
                <tr align="center" style="background-color: skyblue;">
                    <td>{{$appoint->name}}</td>
                    <td>{{$appoint->email}}</td>
                    <td>{{$appoint->phone}}</td>
                    <td>{{$appoint->doctor}}</td>
                    <td>{{$appoint->date}}</td>
                    <td>{{$appoint->message}}</td>
                    <td>{{$appoint->status}}</td>
                    <td><a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a></td>
                    <td><a class="btn btn-danger" href="{{url('declined',$appoint->id)}}">Canceled</a></td>
                    <td><a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send email</a></td>
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