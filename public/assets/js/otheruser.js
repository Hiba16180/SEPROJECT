

async function  befriend(id){
        const response = await fetch("users/message?id="+id, {
          method: "GET",
          headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
          },
          credentials: "same-origin",
        }
        ).then((R)=>{
          window.location.href = "/profile"; 
        }).catch((e)=>{
          console.log(e)
        });  
        console.log(response);
   
}

