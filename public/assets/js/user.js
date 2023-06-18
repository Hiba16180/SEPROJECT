try{

    let hiddenInput =document.getElementById('ctk');
    fetch('/env').then(response => response.json())
    .then(data => {
      for (let i = 0; i < hiddenInput.length; i++) {
        const ciphertext = CryptoJS.AES.encrypt(hiddenInput[i].value, data.SECRET_KEY);
        hiddenInput[i].value = ciphertext;
          } 
          let token = document.getElementById('ctk');
          const ciphertext = CryptoJS.AES.encrypt(token.value, data.SECRET_KEY);
          token.value = ciphertext;
    });
    
  
  }catch{
  
    
  }

  
function openTab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "flex";
  evt.currentTarget.className += " active";
}

try{
openTab('click','profile')
}catch(e){

}
try{

// Get the profile picture element
const profilePicture = document.getElementById("profile-picture");

// Add an event listener to listen for clicks
profilePicture.addEventListener("click", async () => {
  // Create a file input element
  const fileInput = document.createElement("input");
  fileInput.type = "file";

  // Add an event listener to listen for changes to the file input
  fileInput.addEventListener("change", async () => {
    // Get the selected file

    // Create a form data object and append the selected file to it
   
    // Send an AJAX request to upload the image and update the profile picture
    try {
      fetch('/env').then(response => response.json())
      .then(data => {
        let token = CryptoJS.AES.decrypt (document.getElementById('ctk').value, data.SECRET_KEY).toString(CryptoJS.enc.Utf8);
        const selectedFile = fileInput.files[0];
        const formData = new FormData();
        formData.append("image", selectedFile);
      const response = fetch("/profile/update-image", {
        method: "POST",
        headers: {
            "X-CSRF-Token": token,
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
        credentials: "same-origin",
        body: formData,
      }).then((r)=>{
      // Update the profile picture with the uploaded image
      const imageUrl = URL.createObjectURL(selectedFile);
      profilePicture.src = imageUrl;
      }).catch((e)=>{
        console.log(e)
      });
    })
    .catch(error => {
      // handle errors
      console.error(error);
    });

   

    } catch (error) {
      console.error(error);
    }
  });

  // Trigger the file input element
  fileInput.click();
});


}catch(e){

}


try{
  let ec = document.getElementById("edf").addEventListener('click',()=>{
    let ele = document.getElementById("edfp");
    ele.style.display = ele.style.display=="none"?"inline-block":"none";
  })
}
catch(e){
    
  }

function removeChat(ele){
  ele.parentNode.parentElement.parentElement.remove()
}

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
  



const userList = document.getElementById('user-list');
const searchInput = document.getElementById('search-users');
const oldlist = Array.from(userList.children);
let beforLast = Array.from(userList.children);
searchInput.addEventListener('input', (event) => {
  
  const searchText = event.target.value.trim().toLowerCase();

  const users = Array.from(userList.children);
  let filteredUsers = [];

  if (searchText.length > 0) {
    filteredUsers = users.filter(user => {
      const username = document.querySelector('.username').textContent.trim().toLowerCase();
      return username.includes(searchText);
    });
  } else {
    // if search input is deleted, return original users
    filteredUsers = users;
  }

  // Display the matching users in the chat box
  userList.innerHTML = '';
  filteredUsers.forEach(user => {
    userList.appendChild(user);
  });
  console.log(searchText)
  if(searchText=="" ){
       userList.innerHTML = "";
       oldlist.forEach(user => {
               userList.appendChild(user);
         });        
  }
 
});