

function getCookie(name) {
    var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    if (match) {
        return match[2];
    }
    return null;
}


let socket = null;



document.addEventListener('DOMContentLoaded', function() {

  let ip = '127.0.0.1';
  let port = '3000';
  socket = io(ip+':'+port);
  socket.auth = {ID:parseInt(getCookie('user_id'))};
  socket.emit('connections',socket.auth)

  socket.on("user connected", (user) => {
        console.log(user);
    });


  // on user on try sending a request to
    socket.on("users", (users) => {
      for(let i = 0 ; i<users.length ; i++){
        console.log(users[i].ID )
        }
    })
    
    
    // receive must be out of selected
    socket.on('receiveMessage',({message,to,from})=>{
 
       
      let userame = null;
      fetch('/env').then(response => response.json())
    .then(data => {

    let token = CryptoJS.AES.decrypt( document.querySelector('meta[name="csrf-token"]').content, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    console.log("token"+ token)
      fetch('/gusm',{
        method: "POST",
        headers: {
            "X-CSRF-Token": token,
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            'Content-Type': 'application/json',
        },
        credentials: "same-origin",
        body:  JSON.stringify({'id':from,'action':'record'}),
      })
      .then(r => r.json())
        .then(r => {
            userame = r['name']
            let id = r['id']
      console.log("drom",from,to,message);
      // if opened panned user then read it normally 
      
        console.log("Received message OTHER USER");
         
        if(document.getElementById("notify").getElementsByTagName("li").length  == 0){
          document.getElementById('dropdownMenuButton').innerHTML = '<div class="number"></div>'
          document.getElementById("notify").innerHTML+=
                    `<li class="mb-2" id="${id}" onclick="remove(this)">\
                              <a class="dropdown-item border-radius-md" href="javascript:;">\
                                <div class="d-flex py-1">\
                                  <div class="my-auto">\
                                    <img src="../assets/img/small-logos/messages.png" class="avatar avatar-sm me-3">\
                                  </div>\
                                  <div class="d-flex flex-column justify-content-center">\
                                    <h6 class="text-sm font-weight-normal mb-1">\
                                      <span class="font-weight-bold">New message</span> from  ${userame}\
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
        

             if(parseInt(document.getElementById("notify").getElementsByTagName("li")[i].id) != id){
              document.getElementById('dropdownMenuButton').innerHTML = '<div class="number"></div>'
              document.getElementById("notify").innerHTML+=
                    `<li class="mb-2" id="${id}" onclick="remove(this)">\
                              <a class="dropdown-item border-radius-md" href="javascript:;">\
                                <div class="d-flex py-1">\
                                  <div class="my-auto">\
                                    <img src="../assets/img/small-logos/messages.png" class="avatar avatar-sm me-3">\
                                  </div>\
                                  <div class="d-flex flex-column justify-content-center">\
                                    <h6 class="text-sm font-weight-normal mb-1">\
                                      <span class="font-weight-bold">New message</span> from  ${userame}\
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
                                    
                  
        });

      })
        .catch(error => console.error(error));
      })

  })


  

  function remove(ele){
    fetch('/env').then(response => response.json())
    .then(data => {
      let token = CryptoJS.AES.decrypt (document.getElementById('ctk').value, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    fetch('/gusm',{
      method: "POST",
      headers: {
          "X-CSRF-Token": token,
          "Accept": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          'Content-Type': 'application/json',
      },
      credentials: "same-origin",
      body:  JSON.stringify({'id':ele.id,'action':'read'}),
    })
  })
    ele.remove()
    if(document.getElementById("dropdownMenuButton").getElementsByClassName('mb-2').length==0){
        document.getElementById("dropdownMenuButton").innerHTML = "" ;
    } 

}
