<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="copyright" content="MACode ID, https://macodeid.com/">

        <title>Moje wizyty</title>

        <link rel="stylesheet" href="../assets/css/maicons.css">

        <link rel="stylesheet" href="../assets/css/bootstrap.css">

        <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

        <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

        <link rel="stylesheet" href="../assets/css/theme.css">
    </head>
    <body>
        @include('user.header')

        <div align="center" style="padding: 70px;">
            <table class="table table-striped">
                <tr>
                    <th scope="col">Doktor</th>
                    <th scope="col">Data wizyty</th>
                    <th scope="col">Wiadomość</th>
                    <th scope="col">Status</th>
                    <th scope="col">Anuluj wizytę</th>
                </tr>
                @foreach($appoint as $appoints)
                <tr>
                    <td>{{$appoints->doctor}}</td>
                    <td>{{$appoints->date}}</td>
                    <td>{{$appoints->message}}</td>
                    <td>{{$appoints->status}}</td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('cancel_appoint',$appoints->id)}}">Anuluj</a></td>
                </tr>
                @endforeach
            </table>
        </div>

        <script src="../assets/js/jquery-3.5.1.min.js"></script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

        <script src="../assets/vendor/wow/wow.min.js"></script>

        <script src="../assets/js/theme.js"></script>
    </body>
    
</html>