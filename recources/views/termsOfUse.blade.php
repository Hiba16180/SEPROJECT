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





<style>
     body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 20px;
      padding: 0;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
      text-transform: uppercase;
      color: #333;
    }

    h2 {
      font-size: 20px;
      margin-top: 30px;
      margin-bottom: 10px;
      text-transform: uppercase;
      color: #0066cc;
    }

    h3 {
      font-size: 18px;
      margin-top: 20px;
      margin-bottom: 10px;
      
      color: #666;
    }

    p {
      margin-bottom: 10px;
    }

    ul {
      margin: 0;
      padding: 0;
      list-style-type: none;
    }

    ul li::before {
      content: "\2022";
      color: #666;
      display: inline-block;
      width: 1em;
      margin-left: -1em;
    }

    a {
      color: #0066cc;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    /* Additional styles */

    /* Add some spacing between sections */
    h2,
    h3 {
      margin-top: 40px;
    }

    /* Increase the font size of the first-level headings */
    h1 {
      font-size: 28px;
    }

    /* Add a background color to the unordered list */
    ul {
      background-color: #f2f2f2;
      padding: 10px;
      margin-bottom: 20px;
    }

    /* Add some padding to the list items */
    ul li {
      padding: 5px 0;
    }

    /* Change the color of the links on hover */
    a:hover {
      color: #003399;
    }
  </style>
</head>

  <h1>Terms of Use</h1>

  
  <h2>1. Introduction</h2>
  <p>Welcome to our online revision assistance app for Algerian students. By accessing and using our app, you agree to comply with these terms of use. This document outlines the rights and responsibilities of both the users and the app's developers. Please read these terms carefully before using the app.</p>

  
  <h2>2. Eligibility</h2>
  <p>Our app is intended for Algerian students. By using the app, you confirm that you are a student in Algeria and have the legal capacity to enter into these terms. If you are under the age of 18, you confirm that you have obtained parental or guardian consent to use the app.</p>

  
  <h2>3. User Account</h2>
  <ul>
    <li>To access certain features of the app, you may be required to create a user account. You agree to provide accurate and complete information during the registration process and to keep your account information up to date.</li>
    <li>You are responsible for maintaining the confidentiality of your account login credentials and for all activities that occur under your account.</li>
  </ul>

  
  <h2>4. App Usage Guidelines</h2>

  <h3>a. Respectful Behavior</h3>
  <ul>
    <li>As a user of our app, you are expected to treat other users with respect and courtesy. Harassment, discrimination, or hate speech in any form will not be tolerated.</li>
    <li>Refrain from sharing or posting any content that is offensive, inappropriate, or violates the rights of others.</li>
  </ul>

  <h3>b. Intellectual Property</h3>
  <ul>
    <li>Respect intellectual property rights when using our app. This means you should not use or distribute copyrighted materials without proper authorization.</li>
    <li>You should not infringe upon trademarks, patents, or any other proprietary rights held by others.</li>
  </ul>
  
  <h3>c. Compliance with Laws</h3>
  <ul>
    <li>When using our app, you must comply with all applicable laws and regulations in Algeria.</li>
    <li>You should not engage in any unlawful activities or use the app for unauthorized purposes.</li>
  </ul>


  <h2>5. User-Generated Content</h2>
  
  <h3>a. Content Ownership</h3>
  <ul>
    <li>Any content you submit or post on our app remains your ownership. However, by submitting content, you grant us a non-exclusive, worldwide, royalty-free license to use, modify, adapt, and reproduce your content for the purpose of operating and improving the app.
    </li>
  </ul>
  
  <h3>b. Content Guidelines</h3>
  <ul>
    <li>When submitting content to our app, please ensure that it does not infringe upon the rights of others. It should be accurate, truthful, and not misleading. </li>
    <li>We reserve the right to moderate, edit, or remove user-generated content that violates these guidelines.</li>
  </ul>

 
  <h2>6. Intellectual Property</h2>
  
  <h3>a. App Content</h3>
  <ul>
    <li>All content available on the app, including text, graphics, images, videos, and software, is protected by intellectual property laws and is the property of the app or its licensors.</li>
    <li>You may only access and use the app's content for personal, non-commercial purposes.</li>
  </ul>

  <h3>b. Trademarks:</h3>
  <ul>
    <li>All trademarks, logos, and service marks displayed on the app are the property of their respective owners.</li>
    <li>You may not use any trademarks or logos without the prior written permission of the respective owner.</li>
  </ul>


  <h2>7. Privacy and Data Collection</h2>

  <h3>a.  Data Collection:</h3>
  <ul>
    <li>We collect and process personal information in accordance with our Privacy Policy.</li>
    <li>By using the app, you consent to the collection, storage, and processing of your personal data as outlined in the Privacy Policy.</li>
  </ul>

  <h3>b. Data Security:</h3>
  <ul>
    <li>We take reasonable measures to protect your personal information, but we cannot guarantee absolute security.</li>
  </ul>


  <h2>8. Limitation of Liability</h2>

  <h3>a. Disclaimer:</h3>
  <ul>
    <li>The app and its content are provided on an "as-is" basis without warranties of any kind.</li>
    <li>We do not warrant that the app will be error-free, secure, or accessible at all times.</li>
  </ul>

  <h3>b. Limitation of Liability:</h3>
  <ul>
    <li>We shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of or related to the use of the app.</li>
    <li>We shall not be responsible for any loss of data, loss of profits, or any damages resulting from the use or inability to use the app.</li>
  </ul>


  <h2>9. Termination and Suspension</h2>
 
  <h3>a. Termination:</h3>
  <ul>
    <li>We reserve the right to terminate or suspend your access to the app at any time and for any reason without prior notice.</li>
    <li>You may also terminate your account by contacting our support team.</li>
  </ul>

  <h3>b. Suspension:</h3>
  <ul>
    <li>We may temporarily suspend your access to the app if we believe that you have violated these terms or engaged in any unauthorized or illegal activities.</li>
  </ul>


  <h2>10. Modifications and Updates</h2>

  <h3>a. Changes to Terms:</h3>
  <ul>
    <li>We reserve the right to modify or update these terms at any time.</li>
    <li>It is your responsibility to review the Terms regularly.</li>
    <li>We will not notify you of any material changes.</li>
  </ul>
  
  <h3>b. Continued Use:</h3>
  <ul>
    <li>Your continued use of the app after the revised terms have been posted constitutes your acceptance of the changes.</li>
    <li>You may contact our support team for further information.</li>
  </ul>
  

  <h2>11. Governing Law and Jurisdiction</h2>

  <h3>a. Governing Law:</h3>
  <ul>
    <li>These terms are governed by and construed in accordance with Algeria's laws.</li>
    <li>You may contact our support team for further information.</li>
  </ul>
  
  <h3>b. Jurisdiction:</h3>
  <ul>
    <li>Any disputes or claims arising out of or in connection with these terms shall be subject to the exclusive jurisdiction of Algeria's courts.</li>
    <li>You may contact our support team for further information.</li>
  </ul>
    
  


  </main>
  </section>
</body>
  
  
  
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
  
</body>

</html>