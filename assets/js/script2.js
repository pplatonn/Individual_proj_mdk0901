const titl=document.getElementById('titl');
const result = document.getElementById("result1")
const urlParams = new URLSearchParams(window.location.search);
const paramData = urlParams.get('id');
const url = "https://api.spoonacular.com/recipes/" + paramData + "/information?apiKey=e6b5fb4461c4461ea694f28b90f43d5b"

fetch(url)
    .then(response => response.json())
    .then(data => {

        titl.textContent=JSON.stringify(data.title).replaceAll('"', '')
        
        result.insertAdjacentHTML("beforeend",
            "<h1>" + JSON.stringify(data.title).replaceAll('"', '') + "</h1>"
            + '<img src=' + JSON.stringify(data.image) + '>'
            + "<h2>Ingredients</h2>"
            + "<ul>")
            
        for (let i = 0; i < data.extendedIngredients.length; i++) {
          result.insertAdjacentHTML("beforeend",
          "<li>" + JSON.stringify(data.extendedIngredients[i].original).replaceAll('"', '') + "</li>"
        )}
        
        result.insertAdjacentHTML("beforeend",
            "</ul>"
            + "<h2>Description</h2>"
            + "<p>" + JSON.stringify(data.summary).replaceAll('"', '') + "</p>"
            + "<h2>Instructions</h2>"
            + "<p>" + JSON.stringify(data.instructions).replaceAll('"', '') + "</p>"
        )

        result.insertAdjacentHTML("beforeend",
            '<section>'
            + '<img src=' + JSON.stringify(data.image) + '>'
            + '<h2>' + JSON.stringify(data.title).replaceAll('"', '') + '</h2>'
            + '<button onclick="torecept(' + JSON.stringify(data.id) + ')">Recept</button>'
            + '<button onclick="addfav(this.parentNode)" class="favbtns">to favorites</button>'
            + '</section>'
        )
    })

function addfav(x){
    alert('Added to favorites!')
    favsStr=""
    favsStr+=localStorage.getItem('favs')
    favsStr+=x.outerHTML
    localStorage.setItem('favs', favsStr);
};
