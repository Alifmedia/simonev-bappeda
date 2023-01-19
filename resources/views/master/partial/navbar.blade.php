<nav class="navbar navbar-expand-lg navbar-dark">

   <div class="" id="navbarNav" >
      <div class="img-responsive" alt="Responsive image" ></div> 
    <ul class="navbar-nav ml-auto" align="margin-top">

      
         
             
       

      <!-- JIKA USER LEVEL 2 KEATAS -->
       @if (Auth::user()->level > 2)
      
     
        <li class="nav-item"> <img width="70%" height="100%"  src="{{ asset('images/SIMONEV-04.png') }}" ></li> 
       <li class="nav-item"><a href="{{ route('admin.renstra.setujuopd') }}" class="nav-link">RENSTRA</a></li>

       <li class="nav-item"><a href="{{ route('admin.renja.tahunan') }}"     class="nav-link">RENJA</a></li>

       <li class="nav-item"><a href="{{ route('admin.dpa.setuju') }}"       class="nav-link">DPA</a></li>

       <li class="nav-item"><a href="{{ route('admin.realisasi.pending') }}" class="nav-link">REALISASI</a></li>
   
     
       <li class="nav-item"><a href="{{ route('admin.matrix.rfk') }}"        class="nav-link">MATRIX</a></li>

  

      
          <!-- TAMBAHAN MENU JIKA USER LEVEL 3 -->
            @if (Auth::user()->level == 3)
            {
            <li class="nav-item"><a href="{{ route('superadmin.pengguna.administrator') }}" class="nav-link">Admin</a></li>
            }
            @endif


             <!-- TAMBAHAN MENU JIKA USER LEVEL 3 -->
            @if (Auth::user()->level == 4)
            {

            <li class="nav-item"><a href="{{ route('superadmin.opd.badan') }}" class="nav-link">SKPD/OPD</a></li> 
            <li class="nav-item"><a href="{{ route('superadmin.pengguna.umum') }}" class="nav-link">PENGGUNA</a></li>
            }
            @endif

    
      
  


      <!-- JIKA USER LEVEL 1 DAN KEBAWAH -->
        @elseif(Auth::user()->level ==2 )
        
           <li class="nav-item"><a href="{{ route('supervisor.renstra.setujuopd') }}"        class="nav-link">RENSTRA</a></li>
           <li class="nav-item"><a href="{{ route('supervisor.renja.tahunan') }}"            class="nav-link">RENJA</a></li>
           <li class="nav-item"><a href="{{ route('supervisor.dpa.setuju') }}"               class="nav-link">DPA</a></li>
           <li class="nav-item"><a href="{{ route('supervisor_rekammedik.supervisor_rm') }}" class="nav-link">REALISASI</a></li>
           <li class="nav-item"><a href="{{ route('admin.opd.setuju') }}"                    class="nav-link">OPD</a></li>
           <li class="nav-item"><a href="{{ route('supervisor.matrix.rfk') }}"               class="nav-link">MATRIX</a></li>
     
         
         
          

         @else
        

          <li class="nav-item"> <a href="{{ route('karyawan.renstra.tujuansasaran')  }}" class="nav-link ">RENSTRA</a></li>
          <li class="nav-item"> <a href="{{ route('karyawan.renja.setujuopd')        }}" class="nav-link">RENJA</a></li>
          <li class="nav-item"> <a href="{{ route('karyawan.dpa.renja')              }}" class="nav-link">DPA</a></li>
          <li class="nav-item"> <a href="{{ route('karyawan_rekammedik.karyawan_rm') }}" class="nav-link">REALISASI</a></li>
          <li class="nav-item"> <a href="{{ route('karyawan_matrix.karyawan_matrix') }}" class="nav-link">MATRIX</a></li>
          <li class="nav-item"> <a href="{{ route('karyawan_biodata.karyawan_data')  }}" class="nav-link">OPERATOR</a></li>

      
          
         
       
  @endif


   
        </ul> 
        </div>  
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  <div class="collapse navbar-collapse" id="navbarNav">
   
    <ul class="navbar-nav ml-auto">


   
      <li class="nav-item">
        <a class="nav-link active" href="">Dashboard</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('user.ubahEmail') }}">Ganti Username</a>
          <a class="dropdown-item" href="{{ route('user.ubahPassword') }}">Ganti Password</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
      </li>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </ul>
  </div>

    



</nav>
