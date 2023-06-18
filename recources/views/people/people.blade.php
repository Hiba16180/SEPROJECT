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
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
  <link href="../assets/css/poeple.css" rel="stylesheet" />
  <link href="../assets/css/general.css" rel="stylesheet" />

</head>

<body class="g-sidenav-show bg-gray-100">


       

@include('bar')




<!-- seaaaaaaaaaaaaaaaaaaaachhhhhhhhhhhherrrrrrrr-->



<div class="row ">
<div class="col-md-7 mt-4 search-eng">
<div class="card search-eng">
<div class="card-header pb-0 px-3">
<h6 class="mb-0">Search for teachers, peers and more !</h6>
</div>
<div class="card-body pt-4 p-3">
<ul class="list-group">
<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mb1618">
<form  action="{{ route('people.search') }}" method="GET" >
@csrf
<div class=" flex-column">
<div class="section-1">
<label for="wilaya"  class="mb-3" style="display: inline-block">Filter By Region&nbsp;&nbsp;</label>
<select name="wilaya"  style="display: inline-block"  class="sform-control form-control" id="wilaya" value="Wilaya" >
                    <option value=""  selected>Wilaya</option>
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
                <label for="status"  class="mb-1618" style="display: inline-block">Filter By Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="status"  style="display: inline-block"  class="sform-control form-control wilaya" id="status" value="status" required>
                    <option value="teacher" selected >Teacher</option>
                    <option value="student">Student</option>
                </select>
                </div>
                <div class="section-1">
                <label for="degree"  style="display: inline-block">Filter By Degree&nbsp;&nbsp;</label>
                <select type="text" class="form-control" placeholder="Degree" aria-label="Degree" aria-describedby="degree-addon" name="degree" id="degree">
                        <option value=""  selected>Degree</option>
                        <option value="bachelor">Bachelor's Degree</option>
                        <option value="master">Master's Degree</option>
                        <option value="doctorate">Doctorate Degree</option>
                        <option value="professional">Professional Degree</option>
                        <option value="specialized">Specialized Degree</option>
                </select>
                <label for="diploma"  class="mb-1618" style="display: inline-block">Filter By Diplomat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select type="text" name="diplomaField" class="form-control" placeholder="Diploma" aria-label="Diploma" aria-describedby="diploma-addon" name="diploma" id="diploma">
                          <option value=""  selected>Diploma</option>
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
                        </div>


</div>
<br>      
<div class=" flex-column  center" style="display: flex; align-items: center;">                   
                  <input type="submit" value="Search" class="btn btn-outline-primary btn-sm mb-0" style="display: inline;">
</div>

</form>
</li>









</ul>
</div>
</div>
</div>







<!-- seaaaaaaaaaaaaaaaaaaaachhhhhhhhhhhherrrrrrrr     ennnnnnnnnnnnddddddddd-->


        <div class="col-12 mt-4">
          <div class="card mb-4 cardi">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-1">People</h6>
              <p class="text-sm">Find peers and colleagues across the country!</p>
            </div>
            <div class="posts card-body p-3">
              <div class="row p-g people-body">
               
                
                
                
                
<!--


################################## here ###################################


-->


@if( $all)
@if(count($users)>0)
<h6>{{$users[0]->status}}:</h6>
@endif

@foreach ($users as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  <?php /*echo implode(' ', array_slice(str_word_count($post->body, 1), 0, 10)).'...'; */ 
                      echo rtrim(substr($user->description, 0, 42),'\n')."...";
                      ?> 

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="../{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>

</div>
@endforeach


<div class="list-group-item border-0 ps-0 pb-0" style="margin:20px">
<div class="paginate">{{ $users->links() }}</div>
</div>

@else

@if(count($teacher)>0)
<h6>Teachers:</h6>
@endif

@foreach ($teacher as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>  
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach


@if(count($teacher)>0)
<a href="{{ url(route('people.all', ['type' => 'teacher'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif


@if(count($student)>0)


<hr>

<h6>Students:</h6>
@endif

@foreach ($student as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach


@if(count($student)>0)
<a href="{{ url(route('people.all', ['type' => 'student'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif


@if(count($doctor)>0)

 <hr>
 <h6>Doctors:</h6>
@endif
@foreach ($doctor as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach



@if(count($doctor)>0)
<a href="{{ url(route('people.all', ['type' => 'doctor'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif






@if(count($professor)>0)


 <hr>

 <h6>Professors:</h6>

@endif
@foreach ($professor as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach


@if(count($professor)>0)
<a href="{{ url(route('people.all', ['type' => 'professor'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif





@if(count($phd)>0)
 <hr>
 <h6>Phds:</h6>
@endif
@foreach ($phd as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach

@if(count($phd)>0)
<a href="{{ url(route('people.all', ['type' => 'phd'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif


@if(count($phd_student)>0)

 <hr>


 <h6>Phd Students:</h6>

@endif
@foreach ($phd_student as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach


@if(count($phd_student)>0)
<a href="{{ url(route('people.all', ['type' => 'phd-student'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif




@if(count($doctorah_student)>0)

 <hr>

 <h6>Doctorat Students:</h6>
@endif
@foreach ($doctorah_student as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
{{$user->description}}
</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach


@if(count($doctorah_student)>0)
<a href="{{ url(route('people.all', ['type' => 'doctorah-student'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif



@if(count($graduate_student)>0)

 <hr>
 <h6>Graduate Students:</h6>
@endif
@foreach ($graduate_student as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach


@if(count($graduate_student)>0)
<a href="{{ url(route('people.all', ['type' => 'graduate-student'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif




@if(count($researcher)>0)
 <hr>
 <h6>Researches:</h6>
@endif
@foreach ($researcher as $user)

<div class="col-lg-7 mb-lg-0 mb-4" >
<div class="cards">
<div class="card-body  p-3">
<div class="row">
<div class="col-lg-6">
<div class="d-flex flex-column h-100">
<p class="mb-1 pt-2 text-bold">{{$user->status}}</p>
<br>
<h5 class="font-weight-bolder">{{$user->name}}</h5>
<p class="mb-5 text-sm">
  {{$user->description}}

</p>

<div class="list-group-item border-0 ps-0 pb-0">
                  @if ($user->instagram || $user->linkedin || $user->facebook || $user->twiter)  
                  <strong class="text-dar k text-sm">Social:</strong> &nbsp;
                  @endif
                  @if ($user->facebook)
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->facebook}}">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->twiter)
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->twiter}}">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->instagram)
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{$user->instagram}}">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                  @endif
                  @if ($user->linkedin)
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $user->linkedin }}">
                      <i class="fab fa-linkedin-in fa-lg"></i>
                  </a>
                  @endif
</div>
<br><br>
<a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/profile/users?id={{$user->id}}">
visite profile
<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
</a>
</div>
</div>

<img src="{{$user->profile_photo_path}}"  class="user-im" alt="waves">

</div>
</div>
</div>
</div>
@endforeach

@if(count($researcher)>0)
<a href="{{ url(route('people.all', ['type' => 'researcher'])) }}" class="see-all" ><strong>SEE ALL</strong></a>
@endif

@endif




<!--


################################## here ###################################


-->











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
      <hr>
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
  <script src="../assets/js/forums.js"></script>
  <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
  <script src="../assets/js/user.js"></script>
  <script src="../assets/js/connection.js" ></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>






<input type="hidden" id="ctk" value='{{ csrf_token() }}'>

@include("shared")

</body>

</html>