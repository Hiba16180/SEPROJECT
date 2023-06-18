document.addEventListener('DOMContentLoaded', () => {

try{
  let filter = document.getElementsByClassName("filter");
  for (let i = 0 ; i <  filter.length ; i++ ){
  
    filter[i].addEventListener("click", function() {
          this.classList.toggle("clicked");
        });
  
  }
  }catch(e){
  
  }




try{
  let ec = document.getElementsByClassName("sh-ed-cm");
  for(let i = 0 ; i < ec.length ; i++){
    ec[i].addEventListener('click',()=>{
    let ele = ec[i].parentElement.parentElement.parentElement.getElementsByClassName("ed-rp")[0];
    ele.style.display = ele.style.display=="none"?"inline-block":"none";
  })
}
  }catch(e){
    
  }




  try{

    let btn =  document.getElementById('upvote');
    btn = btn.addEventListener('click', event => {
    event.currentTarget.classList.toggle('on');
    const regex = /\/post\/(\d+)?/;

    fetch('/env').then(response => response.json()).then(data => {
    let token = CryptoJS.AES.decrypt(document.querySelector('meta[name="csrf-token"]').content, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    let post = CryptoJS.AES.decrypt( document.getElementById('upvote-count').getElementsByClassName("post")[0], data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    console.log(token);
    const postId = window.location.href.match(regex)[0].split('/')[2];
   
    
    if (!document.getElementsByClassName("on").length==0){
    
    fetch(postId+'/update-upvotes/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        "X-CSRF-Token": token,
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      credentials: "same-origin",
      body: JSON.stringify({'vote': 1}),
    }).then((data)=>{
      console.log(data)
      document.getElementById('upvote-count').innerText=" "+parseInt(parseInt(document.getElementById('upvote-count').innerText)+1)
    })
  }else{
    fetch(postId+'/update-upvotes/', {
      method: 'POST',
      headers: {  
        'Content-Type': 'application/json',
        "X-CSRF-Token": token,
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      credentials: "same-origin",
      body: JSON.stringify({'vote': -1}), 
    }).then((response)=>{
      console.log(response)
      document.getElementById('upvote-count').innerText=' '+parseInt(parseInt(document.getElementById('upvote-count').innerText)-1)
      
    })
  }
}).catch(error => {
  // handle errors
  console.error(error);
});
  })
}catch(e){
    
}



try{

  let hiddenInput = document.querySelectorAll('input[type="hidden"]');
  fetch('/env').then(response => response.json())
  .then(data => {
    for (let i = 0; i < hiddenInput.length; i++) {
      if (hiddenInput[i].parentNode.id != "post-create" && hiddenInput[i].id !== "im"){
        const ciphertext = CryptoJS.AES.encrypt(hiddenInput[i].value, data.SECRET_KEY);
      hiddenInput[i].value = ciphertext;
      }
    } 
        let token = document.querySelector('meta[name="csrf-token"]');
        console.log('tok',token)
        const ciphertext = CryptoJS.AES.encrypt(token.content, data.SECRET_KEY);
        token.content = ciphertext;
  });
  

}catch{

  
}









function deleteit(form){

// do delete and edit add likes integrate the checker
  let hiddenInput = form.querySelectorAll('input[type="hidden"]');
  let reply = "";
  let post = "";
  fetch('/env').then(response => response.json())
    .then(data => {
    let token = CryptoJS.AES.decrypt (document.querySelector('meta[name="csrf-token"]').content, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    reply = CryptoJS.AES.decrypt(hiddenInput[hiddenInput.length-2].value, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    post = CryptoJS.AES.decrypt(hiddenInput[hiddenInput.length-1].value, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
  
    form.addEventListener('submit', (event) => {
    event.preventDefault();
    const regex = /\/post\/(\d+)?/;
    const postId = window.location.href.match(regex)[0].split('/')[2];

    fetch(postId+'/delete-comment/'+JSON.parse(reply)['id'], {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        "X-CSRF-Token": token,
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      credentials: "same-origin",
      reply: reply,
      post : post
    })
    .then(_ => {
      console.log(form.parentNode.parentNode)
        form.parentNode.parentNode.remove();
        if (!document.getElementById("rpl-sc")){
          document.getElementById("comments").innerHTML = '<div id="rpl-sc" class="replies"></div>';
        };
    })
    .catch(error => {
      // handle errors
      console.error(error);
    });
  });
});


}


try{
  let fa = document.getElementsByClassName('dl-rp');
  for(let k = 0 ; k < fa.length ; k++){
      deleteit(fa[k])
  }
  }catch(e){
    
  }


function edit(form){
  let hiddenInput = form.querySelectorAll('input[type="hidden"]');
  fetch('/env').then(response => response.json())
    .then(data => {
    let token = CryptoJS.AES.decrypt (document.querySelector('meta[name="csrf-token"]').content, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    let reply = CryptoJS.AES.decrypt(hiddenInput[hiddenInput.length-2].value, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    let post = CryptoJS.AES.decrypt(hiddenInput[hiddenInput.length-1].value, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
    
    form.addEventListener('submit', (event) => {
    event.preventDefault();
    const regex = /\/post\/(\d+)?/;
    const postId = window.location.href.match(regex)[0].split('/')[2]    ;
    const replyBody = form.querySelector('[name="body"]').value;
    console.log(replyBody)
    console.log(postId+'/edit-comment/'+JSON.parse(reply)['id'])
    console.log(post)
    console.log("reply : ")
    console.log(reply)

    fetch(postId+'/edit-comment/'+JSON.parse(reply)['id'], {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        "X-CSRF-Token": token,
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      credentials: "same-origin",
      reply: reply,
      post : post,
      body: JSON.stringify({ 'body': replyBody })
    })
    .then(_ => {

        form.parentElement.getElementsByTagName("p")[0].innerText = replyBody;
        form.querySelector('[name="body"]').value = replyBody;
        form.style.display  = "none";  
    })
    .catch(error => {
      // handle errors
      console.error(error);
    });
  });
})

;}





try{
let forms =  document.getElementsByClassName('ed-rp');
for(let k = 0 ; k < forms.length ; k++){
edit(forms[k]);
}
}catch{

}






try {

  let form = document.getElementById('comment-form');
  let hiddenInput = form.querySelectorAll('input[type="hidden"]');
  fetch('/env', {
          method: 'GET'
      }).then(response => response.json())
      .then(dt => {
          let token = CryptoJS.AES.decrypt(document.querySelector('meta[name="csrf-token"]').content, dt.SECRET_KEY).toString(CryptoJS.enc.Utf8);
          let username = CryptoJS.AES.decrypt(hiddenInput[hiddenInput.length - 1].value, dt.SECRET_KEY).toString(CryptoJS.enc.Utf8);

          const regex = /\/post\/(\d+)/;
          const postId = window.location.href.match(regex)[0].replace(/\?view-post=|\?/g, '').split('/')[2];

          form.addEventListener('submit', (event) => {
              event.preventDefault();
              const replyBody = form.querySelector('[name="body"]').value;

              fetch(postId + "/replies", {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          "X-CSRF-Token": token,
                          "Content-Type": "application/json",
                          "Accept": "application/json",
                          "X-Requested-With": "XMLHttpRequest",
                      },
                      credentials: "same-origin",
                      body: JSON.stringify({
                          "body": replyBody
                      })
                  })
                  // must return the post andd the reply so i can intergrate them 
                  .then(response => response.json())
                  .then(data => {

 
                      let post = CryptoJS.AES.encrypt(JSON.stringify(data.post), dt.SECRET_KEY);
                      let reply  = CryptoJS.AES.encrypt(JSON.stringify(data.reply), dt.SECRET_KEY);
                      let im = document.getElementById('im').value;
                      document.getElementById('rpl-sc').innerHTML += `\
        <div class="panel panel-default" style="margin:10px>"\
          <div class="ms-auto text-end">\
          <div class="forms-container">\
          &nbsp;&nbsp;&nbsp;<img src="../${im}" style="width:30px!important;heigth:30px!important;border-radius:100px" class="">\
          &nbsp;<a href='#' style="display: inline-block; vertical-align: bottom;">${username}</a> \
          &nbsp;<span style="display: inline-block; vertical-align: bottom;font-size:12px"> said 1 seconds </span>\
              <form style="width:30px!important;heigth:10px!important;margin-right:15px;margin-left:15px" method="GET" class="dl-rp"  >\
              <button type="submit" value="delete" class="btn btn-link text-danger text-gradient px-3 mb-0">\
              <i  class="far fa-trash-alt me-2" aria-hidden="true"></i>\
              </button>\
              <input type="hidden" id="reply" value="${reply}">
              <input type="hidden" id="post" value="${post}">
              </form>\
               
              <button  type="submit" class="sh-ed-cm btn btn-link text-dark text-gradient px-3 mb-0">\
              <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>\
              </button>    \
              </div>\
              <p class="cm-bd" style="margin:5px">\        
              &nbsp;&nbsp;&nbsp;&nbsp;${replyBody}\
      </p>\
      <form  id="ed-cm" style="display:none; margin-top:8px" method='POST' class="ed-rp" >\
      <input type="hidden" id="reply" value="${reply}">\
      <input type="hidden" id="post" value="${post}">\
      <textarea  name='body' id='body' class='form-control' placeholder='Write your comment here' rows='1' cols='80' >${replyBody}</textarea>\
      <button type="submit"  value="edit" class="btn btn-link text-dark px-3 mb-0">submit</button>\
        </form>   \
        <hr color="grey" size="5" width="50%">\ 
              </div>\
      <br>\
     
        </div>`;
                    
            
                  
                  }).then(()=>{
                      /***edit post */

                      let form2 = document.getElementsByClassName('forms-container')[document.getElementsByClassName('forms-container').length - 1];
                      let edit_comment = form2.getElementsByTagName("button")[1];
                      let childForm = form2.parentElement.parentElement.getElementsByClassName("ed-rp")[form2.parentElement.parentElement.getElementsByClassName("ed-rp").length-1];
                      edit_comment.addEventListener('click', () => {
                          childForm.style.display = childForm.style.display == "none" ? "inline-block" : "none";
                      })
                      console.log(childForm)
                                          
                      edit(childForm);

             
                        /**deleteReply*/
 
                        let form1 = document.getElementsByClassName("dl-rp")[document.getElementsByClassName("dl-rp").length-1];
                        deleteit(form1)
                  });
                  form.reset();

                })
        });


} catch (e) {}


try{
console.log( document.getElementById("close-overlay"))
  document.getElementById("close-overlay").addEventListener("click",()=>{
     
    document.getElementById("overlayit").style.display = "none";

  })

}catch{


}





try{

  let edit_post = document.getElementById("post-writes");

edit_post.addEventListener('click',()=>{
  let ele = document.getElementById("post-create");
  ele.style.display = ele.style.display=="none"?"flex":"none";
})



}catch(e){

}


})



try{

  var slideIndex = 1;
  showDivs(slideIndex);
  
  function plusDivs(n) {
    showDivs(slideIndex += n);
  }
  
  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
  }
}catch{

}