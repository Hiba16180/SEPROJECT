@if (Session::get('message'))
      <div class="overlay" id="overlayit">
        <div class="slfm" id="loginf"> 
       <!-- <a id="close-bar" id="close-overlay" style="top:0;position:absolute;right:0;margin:5px;padding:10px;float:right;">×</a>-->
                 we detected inappropriate text, please refrain from posting negative words as you agreed to the terms and policies of use.
                 <br><br>
                 <a id="close-overlay" class="btn mb-0 me-2" target="_blank"><i class="fab me-1" aria-hidden="true"></i>okay</a>
                 <a href="mailto:nebula1618@gmail.com?subject=Error in detection" style="background: linear-gradient(to bottom right, #ff0000, #ff6a00);color:white"  class="btn btn-red mb-0 me-2" target="_blank"><i class="fab me-1" aria-hidden="true"></i>report error</a>
        </div>
      </div>
@endif

<input type="hidden" id="ctk" value='{{ csrf_token() }}'>

@foreach (auth()->user()->notifications() as $noti)
@if ($noti->type == "alert")
<div class="overlay" id="overlayit">
        <div class="slfm" id="loginf"> 
       <!-- <a id="close-bar" id="close-overlay" style="top:0;position:absolute;right:0;margin:5px;padding:10px;float:right;">×</a>-->
                 we detected inappropriate text, please refrain from posting negative words as you agreed to the terms and policies of use.
                 <br><br>
                 <a id="close-overlay" class="btn mb-0 me-2" target="_blank"><i class="fab me-1" aria-hidden="true"></i>okay</a>
                 <a href="mailto:minassat.qalamona@gmail.com?subject=Error in detection" style="background: linear-gradient(to bottom right, #ff0000, #ff6a00);color:white"  class="btn btn-red mb-0 me-2" target="_blank"><i class="fab me-1" aria-hidden="true"></i>report error</a>
        </div>
</div>

<?php
auth()->user()->readAlert();
?>

@else
<style>

.number {
  position: absolute;
  top: 5px;
  right: 1px;
  width: 10px;
  height: 10px;
  background-color: #ff6b6b;
  color: #fff;
  font-size: 11px;
  font-weight: bold;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
                             <script>
                                    if(document.getElementById("notify").getElementsByTagName("li").length  == 0){
                                      document.getElementById('dropdownMenuButton').innerHTML = '<div class="number"></div>'
                                      document.getElementById("notify").innerHTML+=
                                                `<li class="mb-2" id="{{$noti->id}}" onclick="remove(this)">\
                                                          <a class="dropdown-item border-radius-md" href="javascript:;">\
                                                            <div class="d-flex py-1">\
                                                              <div class="my-auto">\
                                                                <img src="../assets/img/small-logos/messages.png" class="avatar avatar-sm me-3">\
                                                              </div>\
                                                              <div class="d-flex flex-column justify-content-center">\
                                                                <h6 class="text-sm font-weight-normal mb-1">\
                                                                  <span class="font-weight-bold">New message</span> from {{$noti->name}}\
                                                                </h6>\
                                                                <p class="text-xs text-secondary mb-0">\
                                                                  <i class="fa fa-clock me-1"></i>\
                                                                  13 minutes ago\
                                                                </p>\
                                                              </div>\
                                                            </div>\
                                                          </a>\
                                                  </li>`;
                                    }else{
                                    for (i = 0 ; i<   document.getElementById("notify").getElementsByTagName("li").length ; i++){
                                    

                                         if(document.getElementById("notify").getElementsByTagName("li")[i].id != parseInt("{{$noti->id}}")){
                                          console.log("{{$noti->id}}")
                                          document.getElementById('dropdownMenuButton').innerHTML = '<div class="number"></div>'
                                          document.getElementById("notify").innerHTML+=
                                                `<li class="mb-2" id="{{$noti->id}}" onclick="remove(this)">\
                                                          <a class="dropdown-item border-radius-md" href="javascript:;">\
                                                            <div class="d-flex py-1">\
                                                              <div class="my-auto">\
                                                                <img src="../assets/img/small-logos/messages.png" class="avatar avatar-sm me-3">\
                                                              </div>\
                                                              <div class="d-flex flex-column justify-content-center">\
                                                                <h6 class="text-sm font-weight-normal mb-1">\
                                                                  <span class="font-weight-bold">New message</span> from {{$noti->name}}\
                                                                </h6>\
                                                                <p class="text-xs text-secondary mb-0">\
                                                                  <i class="fa fa-clock me-1"></i>\
                                                                  13 minutes ago\
                                                                </p>\
                                                              </div>\
                                                            </div>\
                                                          </a>\
                                                  </li>`;
                                        break;
                                         }
                                    } 
                                  
                                  }
                            </script>
@endif
@endforeach 