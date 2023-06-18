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
  <link href="../assets/css/courses.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  
     @include('bar')

  

      


<!-- seaaaaaaaaaaaaaaaaaaaachhhhhhhhhhhherrrrrrrr-->


<div class="page-header min-height-300 border-radius-xl mt-4" id="coverPreview" style="background-image: url('../assets/img/curved-images/curved11-small.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6" ></span>
</div>

<div class="row  search-eng" style="top:-100px;display:relative">
<div class="col-md-7 mt-4 search-eng">
<div class="card search-eng">
<div class="card-header pb-0 px-3">
<h6 class="mb-0">Add A Course</h6>
</div>
<div class="card-body pt-4 p-3">
<ul class="list-group">
<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mb1618" style="display: flex !important;justify-content: center;
    justify-items: center;">

<form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">

<div class="container-fluid py-4">
      <div class="row center">
        <div class="col-lg-8 ">
          <div class="row ">
          
<form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data"  class="center">
        @csrf
   

                          
                      <div class="col-md-6 mb-md-0 mb-4  ">
                      <br>
                      <label for="materialUpload" class="text-dark" style="width:auto">Title:</label>
                      <input type="text" name="title" placeholder="e.g Geometry in the space" class="form-control" maxlength="255">
                        <div>
                        <label for="materialUpload" class="text-dark" style="width:auto">Duration:</label>
                          <input type="number" name="duration" id="duration" class="form-control ">
                        </div>
                          
                        <div id="addressField" class="col-md-6" style="display: none">
                                     <label for="materialUpload" class="text-dark" style="width:auto">Adress/Place:</label>
                                    <input type="text" name="address" class="form-control ">
                        </div>

                        <div class="col-md-6 mb-md-0 mb-4">
                                      <label for="materialUpload" class="text-dark" style="width:auto">Price:</label>
                                      <input name="price" type="number" min="0" class="form-control " required>
                        </div>
                        <div class="col-md-6 mb-md-0 mb-4">
                        <label for="materialUpload" class="text-dark" style="width:auto" maxlength="1000">Description:</label>
                        <textarea name="description" type="text" class="form-control " required></textarea>
                          </div>     


                      </div>
                      
                      <div class="col-md-6">
                      <br>
                      <label for="materialUpload" class="text-dark" style="width:auto">Module:</label>
                      <select name="module"  class="form-control ">
                          <option value="mathematics">Mathematics</option>
                          <option value="physics">Physics</option>
                          <option value="chemistry">Chemistry</option>
                          <option value="biology">Biology</option>
                          <option value="computer-science">Computer Science</option>
                          <option value="history">History</option>
                          <option value="geography">Geography</option>
                          <option value="literature">Literature</option>
                          <option value="foreign-languages">Foreign Languages</option>
                          <option value="economics">Economics</option>
                        </select>
                
                        <label for="materialUpload" class="text-dark" style="width:auto  ">Level:</label>                 
                        <select name="level"  class="form-control ">
                            <option value="primary-1">Primary School - Year 1</option>
                            <option value="primary-2">Primary School - Year 2</option>
                            <option value="primary-3">Primary School - Year 3</option>
                            <option value="primary-4">Primary School - Year 4</option>
                            <option value="primary-5">Primary School - Year 5</option>
                            <option value="primary-6">Primary School - Year 6</option>
                            <option value="middle-1">Middle School - Year 1</option>
                            <option value="middle-2">Middle School - Year 2</option>
                            <option value="middle-3">Middle School - Year 3</option>
                            <option value="middle-4">Middle School - Year 4</option>

                            <option value="high-1">High School - Year 1</option>
                            <option value="high-2">High School - Year 2</option>
                            <option value="high-3">High School - Year 3</option>
                            <option value="high-4">High School - Year 4</option>
                            <option value="undergraduate-1">Undergraduate - Year 1</option>
                            <option value="undergraduate-2">Undergraduate - Year 2</option>
                            <option value="undergraduate-3">Undergraduate - Year 3</option>
                            <option value="undergraduate-4">Undergraduate - Year 4</option>
                            <option value="master-1">Master's Degree - Year 1</option>
                            <option value="master-2">Master's Degree - Year 2</option>
                            <option value="phd-1">PhD - Year 1</option>
                            <option value="phd-2">PhD - Year 2</option>
                            <option value="phd-3">PhD - Year 3</option>
                            <option value="phd-4">PhD - Year 4</option>
                            <option value="phd-5">PhD - Year 5</option>
                            <option value="phd-6">PhD - Year 6</option>
                            <option value="phd-7">PhD - Year 7</option>
                          </select>  
                          
                          <label for="materialUpload" class="text-dark" style="width:auto  ">Mehode:</label>
                          <select name="place" id="studyFormat" class="form-control " onchange="toggleAddressField()">
                                      <option value="online">Online</option>
                                      <option value="presential">Presential</option>
                          </select>
                          <label for="materialUpload" class="text-dark" style="width:auto  ">Cover:</label>
                          <input type="file" name="cover"  id="cover" accept="image/*" maxlength="2097152" class="  form-control btn btn-primary btn-sm w-100 mb-0"  onchange="previewImage(event)" >
                          <br> <br> <br>
                      </div> 
                      
                      
                
                      <div class="center">
                      <label for="materialUpload" class="btn btn-outline-primary btn-sm" style="width:auto" >Add Material</label>
                      <input type="file" id="materialUpload" name="resources[]" class="d-none" accept=".pdf, image/*"  multiple>
                      </div>
                            
                      <button type="submit" class="btn bg-gradient-primary mt-3 w-100" >ADD COURSE </button>
              
                                
                         
                                 


                  



    </form> 
  
    </form> 


    

    <div class="row center">
<div class="card-body p-3 pb-0">
                              <ul class="list-group" id="courseMaterialsList">
                                <!-- Uploaded files will be dynamically added here -->
                              </ul>
    </div>
    </div>
<div>        
<div>        
<div>        
<div>        


</li>
<li> 

  </li>





            </div>
          </div>
        </div>
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
  </main>
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

    function toggleAddressField() {
    var addressField = document.getElementById("addressField");
    var studyFormat = document.getElementById("studyFormat").value;

    if (studyFormat === "presential") {
      addressField.style.display = "block";
      document.getElementById("address").style.display = "block";
    } else {
      addressField.style.display = "none";
      document.getElementById("address").style.display = "none";
    }
  }
  </script>

  <script src="../assets/js/courses.js">


</script> 
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  @include("shared")
</body>

</html>