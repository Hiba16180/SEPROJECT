<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
Qalamona
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid pe-0">
              <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
                Qalamona
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button>
              <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                
                </ul>
                @if (Route::has('login'))
              @auth
              
                <li class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" >
                  <form method="POST" action="{{ route('logout') }}" x-data>
                      @csrf
  
                      <x-dropdown-link href="{{ route('logout') }}"
                               @click.prevent="$root.submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
              </li>  
              @else
                  <li class="nav-item d-flex align-items-center">
                     <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="{{ route('login') }}"  > Login</a>
                  </li>
  
               @if (Route::has('register'))
                   <ul class="navbar-nav d-lg-block d-none">
                          <li class="nav-item d-flex align-items-center">
                                <a href="{{ route('register') }}" class="btn btn-round btn-sm mb-0 btn-outline-primary me-2">Register</a>
                          </li>
                   </ul>                   
               @endif
                  @endauth
              @endif
                
                <ul class="navbar-nav d-lg-block d-none">
                  <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class=" align-items-start min-vh-43 pt-5 pb-11 m-3 border-radius-lg"  >      
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
              <h3 class="font-weight-bolder text-info text-gradient">Welcome to Qalamona</h3>
                  <p class="mb-0">Enter Information to register</p>
                          
              </div>
              <div class="card-body">
                <x-authentication-card>
                  <x-validation-errors class="mb-4" />
                  <form method="POST" action="{{ route('register') }}" role="form text-left">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="email" aria-label="email" aria-describedby="email-addon" id="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                      </div>


                    <div class="mb-3">
                      <select type="text" class="form-control" placeholder="Region" aria-label="Region" aria-describedby="email-addon" name="region" id="region">
                        <option value="" disabled selected>Wilaya</option>
                        <option value="Adrar">Adrar</option>
                        <option value="Chlef">Chlef</option>
                        <option value="Laghouat">Laghouat</option>
                        <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                        <option value="Batna">Batna</option>
                        <option value="Béjaïa">Béjaïa</option>
                        <option value="Biskra">Biskra</option>
                        <option value="Béchar">Béchar</option>
                        <option value="Blida">Blida</option>
                        <option value="Bouïra">Bouïra</option>
                        <option value="Tamanrasset">Tamanrasset</option>
                        <option value="Tébessa">Tébessa</option>
                        <option value="Tlemcen">Tlemcen</option>
                        <option value="Tiaret">Tiaret</option>
                        <option value="Tizi Ouzou">Tizi Ouzou</option>
                        <option value="Algiers">Algiers</option>
                        <option value="Djelfa">Djelfa</option>
                        <option value="Jijel">Jijel</option>
                        <option value="Sétif">Sétif</option>
                        <option value="Saïda">Saïda</option>
                        <option value="Skikda">Skikda</option>
                        <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                        <option value="Annaba">Annaba</option>
                        <option value="Guelma">Guelma</option>
                        <option value="Constantine">Constantine</option>
                        <option value="Médéa">Médéa</option>
                        <option value="Mostaganem">Mostaganem</option>
                        <option value="M'Sila">M'Sila</option>
                        <option value="Mascara">Mascara</option>
                        <option value="Ouargla">Ouargla</option>
                        <option value="Oran">Oran</option>
                        <option value="El Bayadh">El Bayadh</option>
                        <option value="Illizi">Illizi</option>
                        <option value="Bordj Bou Arréridj">Bordj Bou Arréridj</option>
                        <option value="Boumerdès">Boumerdès</option>
                        <option value="El Tarf">El Tarf</option>
                        <option value="Tindouf">Tindouf</option>
                        <option value="Tissemsilt">Tissemsilt</option>
                        <option value="El Oued">El Oued</option>
                        <option value="Khenchela">Khenchela</option>
                        <option value="Souk Ahras">Souk Ahras</option>
                        <option value="Tipaza">Tipaza</option>
                        <option value="Mila">Mila</option>
                        <option value="Aïn Defla">Aïn Defla</option>
                        <option value="Naâma">Naâma</option>
                        <option value="Aïn Témouchent">Aïn Témouchent</option>
                        <option value="Ghardaïa">Ghardaïa</option>
                        <option value="Relizane">Relizane</option>
                        <option value="El M'Ghair">El M'Ghair</option>
                        <option value="El Menia">El Menia</option>
                        <option value="Ouled Djellal">Ouled Djellal</option>
                        <option value="Bordj Baji Mokhtar">Bordj Baji Mokhtar</option>
                        <option value="Béni Abbès">Béni Abbès</option>
                        <option value="Timimoun">Timimoun</option>
                        <option value="Touggourt">Touggourt</option>
                        <option value="Djanet">Djanet</option>
                        <option value="Ain Salah">Ain Salah</option>
                        <option value="Ain Guezzam">Ain Guezzam</option>       
                     </select>
                      @error('region')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <select type="text" class="form-control" placeholder="Status" aria-label="Status" aria-describedby="email-addon" name="status" id="status" onchange="toggleFields()">
                        <option value="" disabled selected>Student or Teacher?</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                      </select>
                    </div>
                    
                    <div class="mb-3" name="degree" id="degreeField" style="display: none;">
                      <select type="text" class="form-control" placeholder="Degree" aria-label="Degree" aria-describedby="degree-addon" name="degree" id="degree">
                        <option value="" disabled selected>Select a Degree</option>
                        <option value="bachelor">Bachelor's Degree</option>
                        <option value="master">Master's Degree</option>
                        <option value="doctorate">Doctorate Degree</option>
                        <option value="professional">Professional Degree</option>
                        <option value="specialized">Specialized Degree</option>
                      </select>
                    </div>
                    
                    <div class="mb-3"  id="diplomaField" style="display: none;">
                        <select type="text" name="diplomaField" class="form-control" placeholder="Diploma" aria-label="Diploma" aria-describedby="diploma-addon" name="diploma" id="diploma">
                          <option value="" disabled selected>Select a Diploma</option>
                          <option value="business-administration">Business Administration</option>
                          <option value="computer-science">Computer Science</option>
                          <option value="nursing">Nursing</option>
                          <option value="engineering">Engineering</option>
                          <option value="psychology">Psychology</option>
                          <option value="biology">Biology</option>
                          <option value="communication-studies">Communication Studies</option>
                          <option value="economics">Economics</option>
                          <option value="education">Education</option>
                          <option value="english-literature">English Literature</option>
                          <option value="environmental-science">Environmental Science</option>
                          <option value="history">History</option>
                          <option value="international-relations">International Relations</option>
                          <option value="marketing">Marketing</option>
                          <option value="mathematics">Mathematics</option>
                          <option value="political-science">Political Science</option>
                          <option value="sociology">Sociology</option>
                        </select>
                        </div>                              </div>

                    
                    <script>
                      function toggleFields() {
                        var statusField = document.getElementById('status');
                        var degreeField = document.getElementById('degreeField');
                        var diplomaField = document.getElementById('diplomaField');
                    
                        if (statusField.value === 'teacher') {
                          degreeField.style.display = 'block';
                          diplomaField.style.display = 'block';
                        } else {
                          degreeField.style.display = 'none';
                          diplomaField.style.display = 'none';
                        }
                      }
                    </script>
                    
                    
                    <div class="mb-3">
                      <x-input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" id="password" name="password" required autocomplete="new-password" />
                    </div>
                    <div class="mb-3">
                      <x-input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="password-confirmation-addon" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <div class="mt-4">
                      <label for="terms" class="flex items-center">
                          <input id="terms" type="checkbox" name="terms" class="form-checkbox" {{ old('terms') ? 'checked' : '' }}>
                          <span class="ml-2 text-sm text-gray-600"><a href="{{route('terms')}}" >I accept the terms and privacy policy</a></span>
                      </label>
                      @error('terms')
                          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                      @enderror
                  </div>

                  
                    <div class="d-flex justify-content-end">
                      <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 btn bg-gradient-info w-100 mt-4 mb-0">Register</button>
                    </div>
                    <br>
                    <a href="{{ route('login') }}" style="font-size:12px;display:block">Already registered?</a>
                  </form>
                </x-authentication-card>
                
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            
            <a  href="mailto:minassat.qalamona@gmail.com" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Contact Us
            </a>
            
          </div>
         
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Soft by Creative Tim.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <script type="text/javascript">
    document.addEventListener('contextmenu', function (event) {
        event.preventDefault(); // Prevent the default right-click behavior
    });
</script>
</body>

</html>