// const API_KEY = blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf;

function searchphotos() {
    let photo = document.getElementById("subject").value;
    var xhttp = new XMLHttpRequest();
    console.log(photo);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {                   
            var photoList = this.responseText;
            console.log(photoList);
            var results = JSON.parse(photoList);
            console.log(results);
            display(results);
        }
    };
    // xhttp.open("GET", "https://api.nasa.gov/planetary/search?api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf&q=" + movie, true);
    // xhttp.open("GET", "https://images-api.nasa.gov/api_key=" + API_KEY + "?q=" + movie, true);
    xhttp.open("GET", "https://images-api.nasa.gov/api_key=blE2mjygUav0KvjXibZo0sUVug6jPprSj2GdP6lf?q=" + movie, true);
    xhttp.send();
    
    
}

function display(results) {
    var answerlist = "";
    var i = 0;
    for (i = 0; i < results.Search.length; i++) {
        console.log(results.Search[i].Title);
        console.log("New Photo: ");
        answerlist = answerlist + "<p>" + results.Search[i].Title + "<br /><p>";
    }
    document.getElementById("list").innerHTML = answerlist; 
}

