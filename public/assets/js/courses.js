function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
      var coverPreview = document.getElementById('coverPreview');
      coverPreview.src = reader.result;
      coverPreview.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(event.target.files[0]);
  }


   // Function to handle the file upload
function handleFileUpload(files) {
    // Iterate through each selected file
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      
      // Create a list item element to display file details
      const  listItem = document.createElement('li');
      listItem.classList.add('list-group-item', 'border-0', 'd-flex', 'justify-content-between', 'ps-0', 'mb-2', 'border-radius-lg');
      
      // Create a div for file details
      const fileDetailsDiv = document.createElement('div');
      fileDetailsDiv.classList.add('d-flex', 'flex-column');
      
      // Display file name and type
      const fileName = document.createElement('h6');
      fileName.classList.add('mb-1', 'text-dark', 'font-weight-bold', 'text-sm');
      fileName.innerText = file.name;
      fileDetailsDiv.appendChild(fileName);
      
      const fileType = document.createElement('span');
      fileType.classList.add('text-xs');
      fileType.innerText = '#' + file.type.toUpperCase();
      fileDetailsDiv.appendChild(fileType);
      
      // Create a div for price and file type icon
      const filePriceDiv = document.createElement('div');
      filePriceDiv.classList.add('d-flex', 'align-items-center', 'text-sm');
      
      // Display file size (example: $180)
      const fileSize = document.createElement('span');
      fileSize.innerText = file.size + ' bytes';
      filePriceDiv.appendChild(fileSize);
      
      // Create an icon for file type (example: PDF)
      const fileTypeIcon = document.createElement('i');
      fileTypeIcon.classList.add('fas', 'fa-file-pdf', 'text-lg', 'me-1'); // Modify the class based on the file type
      filePriceDiv.appendChild(fileTypeIcon);
      
      // Append file details and price to the list item
      listItem.appendChild(fileDetailsDiv);
      listItem.appendChild(filePriceDiv);
      
      // Append the list item to the course materials list
      const courseMaterialsList = document.getElementById('courseMaterialsList');
      courseMaterialsList.appendChild(listItem);
    }
  }
  
  // Event listener for the file input change
  document.getElementById('materialUpload').addEventListener('change', function (event) {
    const files = event.target.files;
    handleFileUpload(files);
  });