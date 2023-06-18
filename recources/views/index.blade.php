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
Qalamona  </title>
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
  <link id="pagestyle" href="../assets/css/index.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{route('profile.show')}}">
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

                    <x-dropdown-link class="btn btn-round btn-sm mb-0 btn-outline-white me-2" href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
            </li>  
            <li class="nav-item d-flex align-items-center">
            <x-dropdown-link class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="{{ route('profile.show') }}"  > Profile  </x-dropdown-link>
                </li>
            @else
                <li class="nav-item d-flex align-items-center">
                   <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="{{ route('login') }}"  > Login</a>
                </li>

             @if (Route::has('register'))
                 <ul class="navbar-nav d-lg-block d-none">
                        <li class="nav-item">
                              <a href="{{ route('register') }}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Register</a>
                        </li>
                 </ul>                   
             @endif
                @endauth
            @endif

            
        
      </div>
    </div>
  </nav>
  
  
  
  
  
  
  
  
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/vasily-koloda-8CqDvPuo_kI-unsplash.jpg');">
        <span class="mask bg-gradient-dark opacity-6 bg-hb"></span>
        <div class="container">
          <div class="row justify-content-center">
              <span style="text-align:center">
              <br><br><br>
              <h1 class="text-white mb-2 mt-5 inline" style="display:inline;color:#3dd6ff !important">Welcome</h1><h1 class="text-white mb-2 mt-5 inline" style="display:inline"> to Qalamona!</h1>
              <br>
              <p class="text-lead text-white"><br>Your Gate to knownledge</p>
              <br>
              <br>
     
              <p class="text-lead text-white"><h5 class="text-lead text-white">Our platform connects passionate teachers with eager students, creating a <br>vibrant community of knowledge sharing and growth.</h5></p>  
            </span>
          </div>
          <br> <br> <br> <br> <br>
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto mxa">
               @if (Route::has('login'))
            @auth
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                
            </form>
          </a>
            @else
            <a class="btn bg-gradient-dark mb-0 file-upload-btn btn mb-0 mb-0-2"  href="{{route('login')}}">LogIn</a>

              @if (Route::has('register'))
              <a class="btn bg-gradient-dark mb-0 file-upload-btn btn mb-0 mb-0-1"  href="{{ route('register') }}">Register</a>
              @endif

              @endauth
              @endif
  
            </div>
          </div>
        </div>
      </div>
      
      </div>

      <!-- Start main content -->
      <div class="container-fluid py-4">
        <div class="row" style="flex-wrap: wrap;justify-content: center;">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Posts</p>
                      <h5 class="font-weight-bolder mb-0">


                        <?php
                        use App\Models\Post;
                                             
                        ?>      
                    
                    <div class="counter">
                      <span class="count">0</span>
                    </div>
                    
                        <script>
                          // Get the count element
                          let countElement = document.querySelector('.count');
                          
                          // Set the target number
                          let targetNumber = "{{Post::count()}}";
                          console.log(targetNumber)
                          // Function to animate the count
                          function animateCount(targetNumber,countElement) {
                            const duration = 2000; // Animation duration in milliseconds
                            const interval = 10; // Update interval in milliseconds
                            const step = Math.ceil(targetNumber / (duration / interval));
                          
                            let currentNumber = 0;
                          
                            const countInterval = setInterval(() => {
                              currentNumber += step;
                              if (currentNumber >= targetNumber) {
                                clearInterval(countInterval);
                                currentNumber = targetNumber;
                              }
                              countElement.textContent = currentNumber;
                            }, interval);
                          
                            countElement.classList.add('animate');
                          }
                          
                          // Call the animateCount function to start the animation
                          animateCount(targetNumber,countElement);
                          
                            </script>


                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center" style=" width:48px;height: 48px;">
                    <svg width="50px" height="20px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
                        </div>
                     </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Courses</p>
                      <h5 class="font-weight-bolder mb-0">
                        <div class="counter">
                          <span class="count">
      
                            <?php
                            use App\Models\Course;
                                                 
                            ?>      
                        
                        <div class="counter">
                          <span class="count1">0</span>
                        </div>
                        
                            <script>
                              // Get the count element
                               countElement = document.querySelector('.count1');
                              
                              // Set the target number
                              targetNumbers = "{{Course::count()}}";
                              console.log(targetNumbers) 
                        
                              // Call the animateCount function to start the animation
                              animateCount(targetNumbers,countElement);
                              
                                </script>
    






                        </span>
                      </div>
                    </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Users</p>
                      <h5 class="font-weight-bolder mb-0">
                        <?php
                        use App\Models\User;
                                             
                        ?>      
                    
                    <div class="counter">
                      <span class="count3">0</span>
                    </div>
                    
                        <script>
                          // Get the count element
                           countElement = document.querySelector('.count3');
                          
                          // Set the target number
                          targetNumberss = "{{User::count()}}";
                          console.log(targetNumberss)
                    
                          // Call the animateCount function to start the animation
                          animateCount(targetNumberss,countElement);
                          
                            </script>

                
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
     
        </div>
        
        <div class="row mt-4">
        <div class="col-lg-5">
            <div class="card h-100 p-3">
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                  <h5 class=" font-weight-bolder mb-4 pt-2">Find Teachers & Peers Across the Country!</h5>
                  <p class="">Our platform connects teachers and students, providing a one-stop destination for quality education. th an easy-to-use interface,
                    We students can find the right course or teacher, connect with them through chat or forums, 
                    and gain new skills through engaging courses. Join us today to unlock endless possibilities for personal and professional growth!</p>
                  <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                    Read More
                    <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="fas fa-book" style="color:#2636ff;"></i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0">Courses</h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Theachers can offer Courses, upload materials and much more.</p>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="fas fa-comments" style="color:#2636ff"></i>
                    </span>
                    <div class="timeline-content" >
                      <h6 class="text-dark text-sm font-weight-bold mb-0">Forums</h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Stuck? need help? or you just want to share you thoughts?, here you cn do all you want!</p>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="fas fa-comment" style="color:#2636ff"></i>
                    </span>
                    <div class="timeline-content" >
                      <h6 class="text-dark text-sm font-weight-bold mb-0">Chat</h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">You can contact other users directly from the chat in your profile !</p>
                    </div>
                  </div>
                  
                 
                </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <table class="table align-items-center mb-0">
              <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Posts</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Courses</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Likes</th>
                      <th class="text-secondary opacity-7"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                  <tr>
                      <td>
                          <div class="d-flex px-2 py-1">
                              <div>
                                  <img src="../{{$user->profile_photo_path}}" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                              </div>
                          </div>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $user->total_posts }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">{{ $user->total_courses }}</span>
                      </td>
                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{ $user->total_likes }}</span>
                      </td>
                      <td class="align-middle">
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          </a>
                          <i class="fas fa-arrow-up ml-2"></i> <!-- Add the arrow-up icon here -->
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          
          </div>
        </div>
        <div class="row my-4">
          <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
             




            
            </div>
          </div>
        </div>
      <!--  End main content -->


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