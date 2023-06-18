
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
      socket.on('receiveMessage',({message,to,from})=>{
        console.log("drom",from,to,message);
        // if opened panned user then read it normally 
        if(from == parseInt('{{$selected["id"]}}') && parseInt("{{auth()->id()}}") == parseInt(to)){
          window.livewire.emit('receivedMessage',from,message,'0');
          console.log("Received message CURRENT USER")
         // document.getElementById("chat-body").innerHTML += `<div class="message received"><p class="message__bubble bubble">${message}</p></div>`;
          scrollDown()
        }else if ( parseInt("{{auth()->id()}}") == parseInt(to) && from !=  parseInt('{{$selected["id"]}}') )  {  
          let userame = document.getElementById(""+from+"").innerText;
          console.log("Received message OTHER USER");
    /*      document.getElementById("notify").innerHTML+=
          '<li class="mb-2">\
                    <a class="dropdown-item border-radius-md" href="javascript:;">\
                      <div class="d-flex py-1">\
                        <div class="my-auto">\
                          <img src="../assets/img/messages.png" class="avatar avatar-sm me-3">\
                        </div>\
                        <div class="d-flex flex-column justify-content-center">\
                          <h6 class="text-sm font-weight-normal mb-1">\
                            <span class="font-weight-bold">New message</span> from '+userame+'\
                          </h6>\
                          <p class="text-xs text-secondary mb-0">\
                            <i class="fa fa-clock me-1"></i>\
                            13 minutes ago\
                          </p>\
                        </div>\
                      </div>\
                    </a>\
            </li>';
    */              
          window.livewire.emit('receivedMessage',from,message,'1');
          window.livewire.hook('element.updated', function(el, component) {
                 //document.getElementById('dropdownMenuButton').innerHTML = '<div class="number"></div>'
                 document.getElementById('dropdownMenuButton').innerHTML = '<div id ="number" class="number"></div>'           
                            userame = "{{$user->name}}";
                            condition = document.getElementById(userame)
                                      if (! condition ){
                                        document.getElementById("notify").innerHTML+=
                                        `<li class="mb-2" id="${userame}" onclick="remove(this)">\
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
                    
          });
        }
  
      })
  
   
  
  
  
  
   

   socket.on("disconnect", (user) => {
    window.livewire.emit('userConnected',{ status: 'disconnect', id: user.ID });
      //document.getElementById(user.ID).innerHTML+='&nbsp;&nbsp;&nbsp;&nbsp;<span style="display: inline-block;border-radius: 50%;height: 8px;width: 8px;background-color: #5cff54;" class="dot"></span>';            
   });
  })