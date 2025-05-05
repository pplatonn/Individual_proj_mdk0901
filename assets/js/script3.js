const resultDiv = document.getElementById('result');

resultDiv.insertAdjacentHTML("afterbegin", localStorage.getItem('favs'))

let favbtns=document.getElementsByClassName('favbtns')
for(let i of favbtns)
    {i.textContent="delete from favorites"}

removeExactText(document.body, "null");

function removeExactText(node, targetText) {
    node.childNodes.forEach(child => {
        if (child.nodeType === Node.TEXT_NODE && child.textContent.includes(targetText)) {
            child.textContent = child.textContent.replace(targetText, '');
        } else if (child.hasChildNodes()) {
            removeExactText(child, targetText);
        }
    });
}
function addfav(x) {
    alert('Удалено из избранного!')
    x.remove()
    favsStr=resultDiv.outerHTML
    localStorage.setItem('favs', favsStr);
    location.reload()
}
function torecept(y) {
    let data = y
    window.location.href = './card.html?id=' + encodeURIComponent(data);
}