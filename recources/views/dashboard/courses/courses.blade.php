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
  <link id="pagestyle" href="../assets/css/general.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/forums.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <!-- to display the teacher name for a course -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/css/courses.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('bar')

            
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   
    <div class="container-fluid py-4">
      <div class="row">
        
      
      




<div class="row ">
<div class="col-md-7 mt-4 search-eng">
<div class="card search-eng">
<div class="card-header pb-0 px-3">
<h6 class="mb-0">Search for Courses</h6>
</div>

<div class="card-body pt-4 p-3">
<ul class="list-group">
<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mb1618">
@if (auth()->user()->status == "teacher")
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                <a  class="btn btn-outline-primary btn-sm mb-0"  href="/newcourse" >Add Course</a>
@endif
</li>
<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mb1618">

<!-- Filter form -->
<form id="filterForm">

  <!-- Filter options -->
  <select id="moduleFilter" name="module" class=" form-control" style="display:inline;width:auto">
      <option value="">All Modules</option>
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
  <select id="levelFilter" name="level" class="active   form-control" style="display:inline;width:auto">
      <option value="">All Levels</option>
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

  <!-- Filter button -->
  <button type="button" class="btn btn-outline-primary btn-sm mb-0" onclick="filterCourses()">Filter</button>

</form>
</li>
</ul>
<div>
<div>
<div>
<div>
  
<!-- Course list container -->
<div id="coursesContainer"></div>

    
      <div class="row mt-4">
        @foreach ($courses as $course)  
          <!-- Single course item -->
          <div class="col-lg-7 mb-lg-0 mb-4 course-item" data-module="{{ $course->module }}" data-level="{{ $course->level }}"><div class="card">
            <div class="card-body p-3 cbd">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold" > {{ app('App\Http\Controllers\UserController')->getTeacher($course->user_id)['name'] }}</p>
                    <h5 class="font-weight-bolder">
                    <?php /*echo implode(' ', array_slice(str_word_count($post->body, 1), 0, 10)).'...'; */ 
                      echo rtrim(substr($course->title, 0, 10),'\n');
                      ?> 
                      </h5>
                    
                    <p class="mb-5" style="font-size:14px">
                      
                    <?php /*echo implode(' ', array_slice(str_word_count($post->body, 1), 0, 10)).'...'; */ 
                      echo rtrim(substr($course->description, 0, 30),'\n').'...'; ?>   
                    </p>
                    <div class="d-flex flex-row h-100">
                    <i class="fas fa-clock fa-xs">&nbsp;{{$course->duration}}  h</i>&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($course->place == "online")
                    <i class="fas fa-circle fa-xs" style="color: green;"> Online</i>
                    @else
                    <i class="fas fa-circle fa-xs" style="color: red;"> Offline </i>
                    @endif
                    <br>                      <br>  

                    </div>


                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" style="display:inline" href="{{ url('coursedetails/' . $course->id) }}">Read More
                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"  style="display:inline"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100 imgc">
                      <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <?php 
                           if(!$course->cover){
                            echo '<img  style="padding:0 !important;border-radius:8px"  class="w-100 h-100 object-fit-cover position-relative z-index-2 pt-4 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAhFBMVEX///8rKikAAAAoJyb7+/vo6OgyMTBLSkklJCMiISAQDgz39/cTEQ+3t7ceHRwWFRPe3t4bGRjv7+9TUlFycXEJBgE5ODefn56JiIhiYWHq6up6enppaWjAwMCioaHV1dWDgoLJycmrq6uVlZVEQ0KHh4eSkpI2NTRMS0qqqqlubW0/Pj3ClDLdAAAEZ0lEQVR4nO3bbXuaMBQGYBqwJrxKgSqtVp2snfb//79VXddtnoMgShby3J/NdYXHkHccBwAAAAAAAAAAAAAAAAAAAAAAwHwPy2g6y8tsXFXjrMy/T6P1SHedeuStN6Uv/DCNlZLSdaWUKk4TX4hqFdkQxNM2E34q70hunIh4tdZdx9uKMsE9/1cOvnhe6q7orXibMDwTwC+xeF/oru1NbETaKIAD6d8PL4WFSponcHgnimqiu9JXFZTCbRfBvi2I77rrfUXrULVOYC99G8xQubmgEXw2hUh35a8jLy5MYE+86q7+NZQtO8N/FM+6H6C7rMWISApz3Y/QVdk1go8QDG8JebcX4cg3uk+YdukOv5g8OizFuadzpfogz42dwth5gpfWPptMCiGz+W43z1xRJHXTKPde97NcKo9rnioR5Xbp/f7tJNqJkI8snWl8jg7W/Jvghu42OCkQvftsCsLMBdQb+0Aq/EYXWSiu6cis38pfR+RzERRzjy0150oJE7fY7rhmILZ1xTbMG2RiQ1iwf+iZDaIXJgQDe4SM2To8F4HjzOi5ZWzcjsoT82/60/Nlf5Dxuenta31dL/RaSZUNyo7o/ArTdtzp//JOnM4KCCtyhEwbNKH/SUD/lclLo9J0Q5BN2tB/ZE2OCq5qWJxuReFNq3x1U7I7SGpnBmeLi4eb1vnaduQqUDQtTjejwqwZwiM1SYxXTYuPyL0X36zpMtmpNR/cHsjyoVFHkIGI1UlLaDHJYTIwakst2M52lS8KP/kji+avAjM4mpXBUTBZf3vdVeExC9miKdN9olnvwt8OWeTjFkMbPdP2TZssd0IvOg2bH3TDLDp93fXqE71mMm290Amzdk6bLbiGYcysu82aKneyovfSzD1rau+VOae16FWYcadTzbaghuCZ25KPDT1xbI+/vGRLMwgq9qQ6NGxD9VIjxd5BkI+6K9ePdc1VTkvmBtOaizuCOasfmLrbrInht/OaCaqae4yxgcfu7U3SmhtZyor+cFF3sV3e2TAz4G5dHCOQNuwesSuEQwTKhgjYFcIhAteGCPKwJgJ1b0NfUBtB/M5f4huOVV0EqRXzgtq7/eFcd/X6sKgbEQb1dSOL2UP/FUHTOytme+S/AHeNvJ7c3iv/rZOK7dgvqHkT0sqGacGHkl0q+lYMCB8mbDMQ1uyiP3PNQFhznuSxx0kGXjq60IKZJFsUgZPTr4IlG8hH9NwgtKY7dLjJgbJiofgpIrsDW85VjzbU4appH6p0RN7tt+r+oeNUxIGCiV9xdkF1B/FGd636RQ0LJl/JvgD52Zthn+p0RX6jYVmXSF7KbvzF1zCQGRj2+WJX1LvgSt216heZgUX3kffIDKy4bvIlEPKEsqwdeG/jU5ZNlQEAAOAfI5ruavXJEzTd9eoTc+KKDJABMkAGyAAZIANkgAyQATJABsjAQQZ7yAAZ7CEDZLCHDJDBnidcil0ZhPcUy24kAQAAAAAAAAAAAAAAAAAAAADAsPwE7eo0R45Or2sAAAAASUVORK5CYII=" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg p-image">';
                      }else{
                        echo '<img class="w-100 h-100 object-fit-cover position-relative z-index-2 pt-4 " style="padding:0 !important;border-radius:8px" src="../'.$course->cover.'">';
                      }
                        ?>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
        <!--end or course zone--> 
        @endforeach
        <div class="paginate">{{ $courses->links() }}</div>

      </div>

      </div>
      <div>


    </div>
  
  </main>


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
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#17c2f7",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

  </script>
  <script>
function filterCourses() {
  var module = document.getElementById('moduleFilter').value;
  var level = document.getElementById('levelFilter').value;

  // Get all course elements
  var courseElements = document.getElementsByClassName('course-item');

  // Iterate over each course element
  for (var i = 0; i < courseElements.length; i++) {
    var courseElement = courseElements[i];

    // Get the data attributes for module and level
    var courseModule = courseElement.getAttribute('data-module');
    var courseLevel = courseElement.getAttribute('data-level');

    // Show or hide the course element based on the selected options
    if ((module === '' || courseModule === module) && (level === '' || courseLevel === level)) {
      courseElement.style.display = 'block';
    } else {
      courseElement.style.display = 'none';
    }
  }
}

  </script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  @include("shared")

</body>

</html>