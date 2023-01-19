@extends('view_karyawan_klinik.karyawan_klinik')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
       

            
     

      <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body"><center>
          <h3 class="card-title">MANAJEMEN</h3></center><br>
          <form action="{{ route('karyawan.klinik.manajemen') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

              <div>
               
               <table width="800px" cellpadding="8px">
                <tr>

                  <td >
<h5>dr. SUFRI HALWI,M.Kes</h5>
<img width="220px"  src="{{ asset('images/timkes/SufriHalwi.jpg') }}">
 </td>



 <td width="440px">
                 "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur "
               </td>




               
                </tr>

                <tr>
                  <td height="40px" colspan="2"></td>
                </tr>


<td>
<h5>dr. DEDDY GUNAWAN B </h5>
<img width="220px" height="230px" src="{{ asset('images/timkes/dedy.jpg') }}">
 </td>

 <td width="440px">
                 "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur "
               </td>

               
                </tr>
                   <tr>
                  <td height="40px" colspan="2"></td>
                </tr>

<td>
<h5>Ns. TEUKU ZULHARDI</h5>
<img width="220px" height="230px" src="{{ asset('images/timkes/SBI_LOGO.png') }}">
 </td>

 <td width="440px">
                 "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur "
               </td>

             
                </tr>
                   <tr>
                  <td height="40px" colspan="2"></td>
                </tr>

<td>
<h5>Ns. JASMIRUL AKBAR</h5>
<img width="220px" height="230px" src="{{ asset('images/timkes/Jasmirul_Akbar.jpg') }}">
 </td>

 <td width="640px">
                 "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur "
               </td>

      
                </tr>

                  <tr>
                  <td height="40px" colspan="2"></td>
                </tr>

<td>
<h5>Ns. BARMAWI</h5>
<img width="220px" height="230px" src="{{ asset('images/timkes/barmawi.jpg') }}">

 </td>

 <td width="640px">
                 "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur "
               </td>

        

                </tr>

                   <tr>
                  <td height="40px" colspan="2"></td>
                </tr>

<td>
<h5>Ns. ADLIN </h5>
<img width="220px" height="230px" src="{{ asset('images/timkes/Adlin.jpg') }}">

 </td>

 <td width="640px">
                 "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur "
               </td>


                </tr>

                  <tr>
                  <td height="40px" colspan="2"></td>
                </tr>

<td>
<h5>Ns. HERMANSYAH </h5>
<img width="220px" height="230px" src="{{ asset('images/timkes/Hermansyah.jpg') }}">

 </td>

 <td width="640px">
                 "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur "
               </td>


       

                </tr>

                  <tr>
                  <td height="40px" colspan="2"></td>
                </tr>




                  </td>

                </tr>

              </table>

                
              </div>

            

            
          </form>
        </div>
      </div>
    </div>
        </div>
      </div>
    </form>

    {{-- Table --}}
    <br>
   
   
  </div>
 

@endsection
