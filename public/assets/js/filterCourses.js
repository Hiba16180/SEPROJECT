function filterCourses() {
    var module = document.getElementById('moduleFilter').value;
    var level = document.getElementById('levelFilter').value;

    // Send an AJAX request to the backend
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the response JSON
                var response = JSON.parse(xhr.responseText);

                // Update the course list
                var courses = response.courses;
                var coursesContainer = document.getElementById('coursesContainer');
                coursesContainer.innerHTML = ''; // Clear the existing courses

                // Add the filtered courses to the container
                for (var i = 0; i < courses.length; i++) {
                    var course = courses[i];
                    var courseElement = document.createElement('div');
                    courseElement.textContent = course.title; // Add more course details as needed
                    coursesContainer.appendChild(courseElement);
                }
            } else {
                // Handle error
            }
        }
    };

    // Construct the URL with filters
    var url = '/courses';
    url += '?module=' + module;
    url += '&level=' + level;

    // Send the GET request
    xhr.open('GET', url, true);
    xhr.send();
}
