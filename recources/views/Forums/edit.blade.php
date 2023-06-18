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
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
Qalamona  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->

  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <link href="/assets/css/forums.css" rel="stylesheet" />
  <link href="/assets/css/general.css" rel="stylesheet" />
<style>
  .tox{
    width: 100%;
  }
</style>
</head>

<body class="g-sidenav-show bg-gray-100">
@include('bar')

    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('/assets/img/curved-images/curved11-small.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <form>
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
              </div>
              <div class="filters">
              <div class="filter">
                    <label>
                    <input type="checkbox" class="filter " name="Science" value="Science" ><span class="filtered">Science</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="languages" value="languages" ><span class="filtered">languages</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="Sports" value="Sports" ><span class="filtered">Sports</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="Business and Entrepreneurship" value="Business and Entrepreneurship" ><span class="filtered">Business and Entrepreneurship</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="Politics" value="Politics" ><span class="filtered">Politics</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="Arts and Culture" value="Arts and Culture" ><span class="filtered">Arts and Culture</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="Technology" value="Technology" ><span class="filtered">Technology</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="Education" value="Education" ><span class="filtered">Education</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="Q&A" value="Q&A" ><span class="filtered">Q&A</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="General Discussion" value="General Discussion" ><span class="filtered">General Discussion</span>
                    </label>
                  </div>
              </div>
           </form>
        </div>
      </div>
    </div>
    <div class="col-12 mt-4 ">
    <!----    ############################################                -->
    <div class="col-12 mt-4 "  width="100% ">
    <!----    ############################################                -->
    <div class="indv-posts">
      <div class="card indv-post" width="100% ">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">home > forums </h6>
        </div>
        <div class="card-body pt-4 p-3"> 
            <div class="ms-auto text-end">
            <form style="display:flex" method='POST' action="<?php echo route('post.edit.confirm',$post); ?>"  id="post-create" style="width:auto;" enctype="multipart/form-data">
                @csrf
                <input name="title" class="title post-it" placeholder="Title" value="{{$post->title}}" required>
                <textarea id="content" name="body"   placeholder="Write something . . ." class="post-it" rows="8" cols="50" width="100%" required>{{$post->body}}</textarea>
                <div class="filters">
                 <div class="filter">
                    <label>
                    <input type="checkbox" class="filter " name="tags[]" value="Science" ><span class="filtered">Science</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="languages" ><span class="filtered">languages</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="Sports" ><span class="filtered">Sports</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="Business and Entrepreneurship" ><span class="filtered">Business and Entrepreneurship</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="Politics" ><span class="filtered">Politics</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="Arts and Culture" ><span class="filtered">Arts and Culture</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="Technology" ><span class="filtered">Technology</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="Education" ><span class="filtered">Education</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="Q&A" ><span class="filtered">Q&A</span>
                    </label>
                  </div>
                  <div class="filter">
                    <label>
                    <input type="checkbox" class="filter" name="tags[]" value="General" ><span class="filtered">General</span>
                    </label>
                  </div>
                </div> 
                <input type="file" name="image" accept="image/*" class="btn bg-gradient-dark mb-0" multiple>
                <input type="submit" value="Post" class="btn bg-gradient-dark mb-0" href="javascript:;">
               </form> 
            </div>       
         
          </div>
    
      </div>
    </div>
 
    <!----    ############################################                -->
  </div>
  </div>


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
    </div>
  </div>
  <div class="fixed-plugin">
 
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  
  
  
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
  <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <script src="/assets/js/forums.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <script>
    tinymce.init({
      selector: 'textarea[name="body"]',
      plugins: 'anchor autolink charmap codesample emoticons  link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Qalamona',
      extended_valid_elements: 'p[strong],strong', // Add the desired elements and attributes here
    });
  </script>



@if (Route::has('login'))


<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>

<script src="../assets/js/connection.js" ></script>


@endif
<input type="hidden" id="ctk" value='{{ csrf_token() }}'>

@include("shared")



</body>

</html>