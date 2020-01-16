const btn = document.getElementById('button');
const btn_color = document.getElementById('button_color');

btn.addEventListener('click', clickAlert);
btn_color.addEventListener('click', colorChange);

function clickAlert() {
    alert('Clicked!');
}

function colorChange() {
    div1.style.backgroundColor = document.getElementById('div1Color').value;
}