//localStorage.clear();
const urlParams = new URLSearchParams(window.location.search);
const paramData = urlParams.get('request');
const resultDiv = document.getElementById('result');
const url = 'https://api.spoonacular.com/recipes/complexSearch?apiKey=e6b5fb4461c4461ea694f28b90f43d5b&query=' + paramData;

fetch(url)
    .then(response => response.json())
    .then(data => {
        for (let i = 0; i < data.results.length; i++) {
            resultDiv.insertAdjacentHTML("afterbegin", '<section>'

                + '<img src=' + JSON.stringify(data.results[i].image) + '>'
                + '<h2>' + JSON.stringify(data.results[i].title).replaceAll('"', '') + '</h2>'
                + '<button onclick="torecept(' + JSON.stringify(data.results[i].id) + ')">Recept</button>'
                + '<button onclick="addfav(this.parentNode)" class="favbtns">to favorites</button>'
                + '</section>')
        }
    })

function addfav(x) {
    alert('Added to favorites!')
    favsStr=""
    favsStr+=localStorage.getItem('favs')
    favsStr+=x.outerHTML
    localStorage.setItem('favs', favsStr);
}
function torecept(y) {
    let data = y
    window.location.href = './card.html?id=' + encodeURIComponent(data);
}
