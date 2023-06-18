<div>
<!--<div wire:poll>
</div>-->

<div class="discussion search" style="border-radius: 0;">
          <div class="searchbar">
            <input id="search-users" class="form-control" type="text" placeholder="Search..."></input>
          </div>
</div>
<div id="user-list">
@foreach ($users as $user)
@if ($user->id != auth()->id())
<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                    <img src="{{$user->profile_photo_path}}" alt="kal" class="border-radius-lg shadow prf-ims">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center username" >
                    <h6 style='display:inline' id="{{ $user->id }}" class="mb-0 text-sm">
                    {{$user->name}}
                    @if (in_array($user->id, $connectedID))
                    &nbsp;&nbsp;&nbsp;&nbsp;<span style="display: inline-block;border-radius: 50%;height: 8px;width: 8px;background-color: #5cff54;" class="dot"></span>
                    @endif
                  </h6>
                  
                    <p class="mb-0 text-xs" id=" new-m">
                    @if(in_array($user->id,$userWithMessage)  ) 
                        <?php echo "new message" ?>
                    @else
                    @foreach ($userWithMessage as $case)
                          @if($case == $user->id)
                          new messages
                              <script>
                                    document.getElementById('dropdownMenuButton').innerHTML = '<div class="number"></div>'
                                
                                    let userame = "{{$user->name}}";
                                    let condition = document.getElementById(userame)
                                    if (! condition ){
                          
                                      document.getElementById("notify").innerHTML+=
                                      `<li class="mb-2" id="{{$user->id}}" onclick="remove(this)">\
                                                <a class="dropdown-item border-radius-md" href="javascript:;">\
                                                  <div class="d-flex py-1">\
                                                    <div class="my-auto">\
                                                      <img src="../assets/img/small-logos/messages.png" class="avatar avatar-sm me-3">\
                                                    </div>\
                                                    <div class="d-flex flex-column justify-content-center">\
                                                      <h6 class="text-sm font-weight-normal mb-1">\
                                                        <span class="font-weight-bold">New message</span> from ${userame}\
                                                      </h6>\
                                                      <p class="text-xs text-secondary mb-0">\
                                                        <i class="fa fa-clock me-1"></i>\
                                                        13 minutes ago\
                                                      </p>\
                                                    </div>\
                                                  </div>\
                                                </a>\
                                        </li>`;
                                    }
                            </script>
                            
                          @endif
                    @endforeach 
                    @if (count($userWithMessage) == 0)
                    <script>
                      document.getElementById('dropdownMenuButton').innerHTML = ''
                    </script>
                    @endif
                    @endif
                    </p>
                  </div>
                  <a wire:click="$emit('showMessages', {{ $user->id }})" class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Message</a>
                </li>
@endif
@endforeach
<div>

<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>

@if (Route::has('login') && $user != "" )


<script>
let socket = null;

document.addEventListener('DOMContentLoaded', function() {

  let ip = '127.0.0.1';
  let port = '3000';
  socket = io(ip+':'+port);

  socket.auth = {ID:parseInt('{{auth()->id()}}')};
  socket.emit('connections',socket.auth)
  

  socket.on("user connected", (user) => {
        window.livewire.emit('userConnected',{ status: 'connected', id: user.ID });
        console.log(user);
        //document.getElementById(user.ID).innerHTML+='&nbsp;&nbsp;&nbsp;&nbsp;<span style="display: inline-block;border-radius: 50%;height: 8px;width: 8px;background-color: #5cff54;" class="dot"></span>';            
    });


  // on user on try sending a request to
    socket.on("users", (users) => {
      for(let i = 0 ; i<users.length ; i++){
        window.livewire.emit('userConnected', { status: 'connected', id: users[i].ID });
        console.log(users[i].ID )
        //document.getElementById(users[i].ID).innerHTML+='<span style="display:inline-block;border-radius: 50%;height: 8px;width: 8px;background-color: #5cff54;;" class="dot"></span>';                    
        }
    })
    
    
    // receive must be out of selected
    socket.on('Notification',({message,to,from})=>{
        let other = document.getElementById("chatbox")
        if(!other){
              
          console.log("other "+other);
          document.getElementById('dropdownMenuButton').innerHTML = '<div id ="number" class="number"></div>'  
                          let userame = "{{$user->name}}";
                                      document.getElementById("notify").innerHTML+=
                                      `<li class="mb-2" id="${from}" onclick="remove(this)">\
                                                <a class="dropdown-item border-radius-md" href="javascript:;">\
                                                  <div class="d-flex py-1">\
                                                    <div class="my-auto">\
                                                      <img src="../assets/img/small-logos/messages.png" class="avatar avatar-sm me-3">\
                                                    </div>\
                                                    <div class="d-flex flex-column justify-content-center">\
                                                      <h6 class="text-sm font-weight-normal mb-1">\
                                                        <span class="font-weight-bold">New message</span> from ${userame}\
                                                      </h6>\
                                                      <p class="text-xs text-secondary mb-0">\
                                                        <i class="fa fa-clock me-1"></i>\
                                                        13 minutes ago\
                                                      </p>\
                                                    </div>\
                                                  </div>\
                                                </a>\
                                        </li>`;
                                    
            window.livewire.emit('receivedMessage',from,message,'1');               
 
        }
        });


 
        socket.on("disconnect", (user) => {
    window.livewire.emit('userConnected',{ status: 'disconnect', id: user.ID });
      //document.getElementById(user.ID).innerHTML+='&nbsp;&nbsp;&nbsp;&nbsp;<span style="display: inline-block;border-radius: 50%;height: 8px;width: 8px;background-color: #5cff54;" class="dot"></span>';            
   });
  })


</script>


@endif



@if ($selected)

  <div class="chatbox" id="chatbox">
    <input type="hidden" id="xcs" value="{{$selected->name}}">
    <div class="top-bar" id="chat-close">
      <div class="avatarc" style='background-image: url("{{$selected->profile_photo_path}}");    background-size: contain;'></div>
      <div class="name">{{$selected['name']}}</div>
      <div class="menu">
         <div class="exit-btn fa fa-close" id="exit" aria-hidden="true" wire:click="$emit('deleteSelected')" onclick="removeChat(this)"></div>
      </div>
    </div>
    <div id='chat-body' class="chat-body">
      @foreach ($messages as $m)
      @if ($m['reseiver_id'] == auth()->id() && $m['sender_id'] == $selected->id)
        <div class="message received">
            <p class='message__bubble bubble' >{{$m['message']}}</p>
         </div>
      @elseif (  $m['sender_id'] == auth()->id() && $m['reseiver_id'] == $selected->id)
      <div class="message sent">
            <p class='message__bubble bubble'>{{$m['message']}}</p>
      </div>
      @endif
      @endforeach
    </div>
    <div class="bottom-bar">
      <div class="chat">
        <!--wire:model.debounce.500ms="text"  wire:click="sendMessages" wire:keydown.enter="sendMessages" -->
        <input class='inpc' id="inputmess" type="text" placeholder="Type a message..." />
        <button class ="btnc" style="color: #5488ff;"  wire:model.debounce.50ms="text"  type="submit"><i class="fas fa-paper-plane"></i></button>
      </div>
    </div>



  @if (Route::has('login'))
  @push('scripts')
  @endpush
  
  <script>
    function scrollDown(){
      document.getElementsByClassName('chat')[0].scrollTop = document.getElementsByClassName('chat')[0].scrollHeight ;
  }
  scrollDown();
 
    // socket.on("connected");
    document.getElementById("inputmess").addEventListener("keypress",function(e){
    let mssg = this.value;
    if(e.which == 13 && !e.shiftKey){
    // user sends message     
    window.livewire.emit('sendMessages',mssg);
    socket.emit("chat",{'message':mssg,'to':"{{$selected->id}}"})
    //  document.getElementById("ccm").innerHTML += `<div class="outgoing"><div class="bubble">${mssg}</div></div>`;
    this.value = "";
    //document.getElementById("chat-body").innerHTML += `<div class="message sent"><p class="message__bubble bubble">${mssg}</p></div>`;
    scrollDown()
    return false; 
    }
  }) 
 
  socket.on('receiveMessage',({message,to,from})=>{
      // if opened panned user then read it normally
      if(document.getElementById("chatbox")){ 
      if(from == parseInt('{{$selected["id"]}}') && parseInt("{{auth()->id()}}") == parseInt(to)){
        window.livewire.emit('receivedMessage',from,message,'0');
        console.log("Received message CURRENT USER")
       // document.getElementById("chat-body").innerHTML += `<div class="message received"><p class="message__bubble bubble">${message}</p></div>`;
        window.livewire.hook('element.updated', function(el, component) {
          scrollDown()                       
      });
      }else if ( parseInt("{{auth()->id()}}") == parseInt(to) && (from != parseInt('{{$selected["id"]}}') || !'{{$selected["id"]}}') )  {  
        let userame = document.getElementById(""+from+"").innerText;
        console.log("Received message OTHER USER");
        window.livewire.emit('receivedMessage',from,message,'1');        
      }
    }
    })


 </script>
  @endif


</div>

@endif


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

@endif
   
@endforeach 



</div>
