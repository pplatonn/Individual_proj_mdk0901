document.getElementById('apiForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const recept = document.getElementById('recept');
    window.location.href = './results.html?request=' + encodeURIComponent(recept.value);
})
