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

// let city = document.getElementById("subject").value;
// console.log(city);
const API_KEY = "cde63ddba12a624c40e28ed5fd2016c0";

function searchphotos() {
    let city = document.getElementById("subject").value;

    var name = document.querySelector('.name');
    var desc = document.querySelector('.desc');
    var temp = document.querySelector('.temp');

    console.log(city);
    fetch('https://api.openweathermap.org/data/2.5/weather?q='+city+'&units=imperial&appid='+API_KEY)
    // fetch('https://api.openweathermap.org/data/2.5/weather?q='+city+'&appid=cde63ddba12a624c40e28ed5fd2016c0')
    // fetch('https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=cde63ddba12a624c40e28ed5fd2016c0')
    .then(response => response.json())
    // .then(data => console.log(data))
    .then(data => {
    //     var nameValue = data['name'];
    //     var tempValue = data['main']['temp'];
    //     var descValue = data['weather'][0]['description'];
        var nameValue = data['name'];
        var tempValue = data['main']['temp'];
        var descValue = data['weather'][0]['description'];

        name.innerHTML = nameValue;
        temp.innerHTML = tempValue;
        desc.innerHTML = descValue;
        // console.log(data);
        // console.log(nameValue);
        // console.log(tempValue);
        // console.log(descValue);
    })

    .catch(err => console.log("Can't access " + city + ".  Check city name."))
};





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
