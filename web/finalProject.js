// const proxyurl = "https://cors-anywhere.herokuapp.com/";
// const url = "https://example.com"; // site that doesn’t send Access-Control-*
// fetch(proxyurl + url) // https://cors-anywhere.herokuapp.com/https://example.com
// .then(response => response.text())
// .then(contents => console.log(contents))
// .catch(() => console.log("Can’t access " + url + " response. Blocked by browser?"))



// const API_KEY = blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf;

// const proxyurl = "https://cors-anywhere.herokuapp.com/";
// const url = "https://images-api.nasa.gov/api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf?q=mars";

// function searchphotos() {
//     let photo = document.getElementById("subject").value;
//     // fetch('https://images-api.nasa.gov/api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf?q=mars')
//     fetch(proxyurl + url)
//     .then(response => response.json())
//     .then(subjectList => {
//         console.log(subjectList)
//         .catch(() => console.log("Can't access " + url + " response. Blocked by browser?"));
//     });
// }



const API_KEY = "cde63ddba624c40e28ed5fd2016c0";
function searchphotos() {
    fetch('api.openweathermap.org/data/2.5/forecast?id=524901&APPID=' + API_KEY)
    .then(response => response.json())
    .then(subjectList => {
        console.log(subjectList)
        .catch(() => console.log("Can't access " + url + " response. Blocked by browser?"));
    });
}





//     let photo = document.getElementById("subject").value;
//     var xhttp = new XMLHttpRequest();
//     console.log(photo);
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {                   
//             var photoList = this.responseText;
//             console.log(photoList);
//             var results = JSON.parse(photoList);
//             console.log(results);
//             display(results);
//         }
//     };
//     // xhttp.open("GET", "https://api.nasa.gov/planetary/search?api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf&q=" + movie, true);
//     // xhttp.open("GET", "https://images-api.nasa.gov/api_key=" + API_KEY + "?q=" + movie, true);
//     xhttp.open("GET", "https://images-api.nasa.gov/api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf?q=" + photo, true);
//     xhttp.send();
    
    
// }

// function display(results) {
//     var answerlist = "";
//     var i = 0;
//     for (i = 0; i < results.Search.length; i++) {
//         console.log(results.Search[i].Title);
//         console.log("New Photo: ");
//         answerlist = answerlist + "<p>" + results.Search[i].Title + "<br /><p>";
//     }
//     document.getElementById("list").innerHTML = answerlist; 
// }

// ************************************************
// ************************************************
// ************************************************

// // const API_KEY = blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf;

// function searchphotos() {
//     let photo = document.getElementById("subject").value;
//     var xhttp = new XMLHttpRequest();
//     console.log(photo);
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {                   
//             var photoList = this.responseText;
//             console.log(photoList);
//             var results = JSON.parse(photoList);
//             console.log(results);
//             display(results);
//         }
//     };
//     // xhttp.open("GET", "https://api.nasa.gov/planetary/search?api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf&q=" + movie, true);
//     // xhttp.open("GET", "https://images-api.nasa.gov/api_key=" + API_KEY + "?q=" + movie, true);
//     xhttp.open("GET", "https://images-api.nasa.gov/api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf?q=" + photo, true);
//     xhttp.send();
    
    
// }

// function display(results) {
//     var answerlist = "";
//     var i = 0;
//     for (i = 0; i < results.Search.length; i++) {
//         console.log(results.Search[i].Title);
//         console.log("New Photo: ");
//         answerlist = answerlist + "<p>" + results.Search[i].Title + "<br /><p>";
//     }
//     document.getElementById("list").innerHTML = answerlist; 
// }
