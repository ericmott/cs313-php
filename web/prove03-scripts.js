function addShorts() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cartTotal").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "prove03-shorts.php", true);
    xhttp.send();
    document.getElementById("cartTotal").innerHTML = xhttp.responseText;


}

// Check quantity to verify a positive whole number
function checkQty() {

}

function updateCart() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("?????").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "prove03-php.php", true);
    xhttp.send();
    document.getElementById("???").innerHTML = xhttp.responseText;
}

/*
<?php
$_SESSION["totalCartQty"] = 0;
$_SESSION["totalShortsQty"] = 0;
$_SESSION["totalJacketQty"] = 0;
$_SESSION["totalWatchQty"] = 0;
?>


*/