<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Umów wizytę</h1>

      <form class="main-form" action="{{url('appointment')}}" method="POST">
        @csrf
        <div class="row mt-5 ">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" name="name" class="form-control" placeholder="Imię i nazwisko..." @if(Auth::id()) value={{Auth::user()->name}} @endif required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" name="email" class="form-control" placeholder="Adres email..." @if(Auth::id()) value={{Auth::user()->email}} @endif required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <input type="date" name="date" class="form-control"  required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <select name="doctor" id="departement" class="custom-select" required>
            <option>---Wybierz lekarza---</option>
            @foreach($doctor as $doctors)
            <option value="{{$doctors->name}}">{{$doctors->name}}, {{$doctors->speciality}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="number" class="form-control" placeholder="Numer telefonu..." @if(Auth::id()) value={{Auth::user()->phone}} @endif required>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" id="message" class="form-control" rows="6" placeholder="Wiadomość..."></textarea>
        </div>
        
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Wyślij</button>
      </form>
    </div>
  </div> <!-- .page-section -->