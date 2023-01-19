@extends('master.blank')

@section('title', 'E-MONEV BAPPEDA  ')

@section('content')
  <div class="login-card">
    <div class="card">
      <div class="card-body">



<div class="row" >

 <div class="col-9" >
  <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">

  <!--   <div class="carousel-item active" data-interval="5000">
        <img src="{{asset('images/slides/background0.jpg')}}" width="100%"" height="80%" alt="...">
    </div> -->

    <div class="carousel-item active" data-interval="5000">
      <img src="{{asset('images/slides/background1.jpg')}}" width="100%"" height="80%" alt="...">
    </div>

  <div class="carousel-item" data-interval="5000">
      <img src="{{asset('images/slides/background2.jpg')}}" width="100%"" height="80%" alt="...">
    </div>
 
        <!--   @for ($i=0; $i < 9; $i++)
            <div class="carousel-item{{$i==0?'active':''}}">
              <img height="470px" 
                    class="d-block" 
                      src="{{asset('images/slides/background'.$i.'.jpg')}}" 
                      alt="Slide {{$i}}">
            </div>
          @endfor -->
        </div>

      </div>

     </div>





     <div class="col-3" >
        <h4 align="center"> APLIKASI E-MONEV <br>REALISASI ANGGARAN<br><font size="1">PEMERINTAH KABUPATEN ACEH BARAT DAYA</font></h4>
        <div class="img-responsive" alt="Responsive image" align="center">
          <img src="{{ asset('images/Logo_Abdya.jpg') }}" >
             
        </div>

         {{-- AWAL FORM --}}
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="email">Username</label>
            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Username">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          {{-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div> --}}



          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
       <!-- <p class="mt-3 text-center">Belum punya akun? silahkan <a href="{{ route('register') }}" class="btn btn-secondary">Daftar</a></p> -->
    
     </div>
    </div>





    </div>
  </div>
</div>



@endsection
