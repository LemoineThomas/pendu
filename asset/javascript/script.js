function initPendu(){
    var lettres = new Array;
    sessionStorage.setItem('lettres', JSON.stringify(lettres));
    sessionStorage.setItem('mot', ["python","php","javascript","html","css","java","c"][Math.floor(Math.random() * ["python","php","javascript","html","css","java","c"].length)]);
    //sessionStorage.setItem('mot', json.decode(name));
    sessionStorage.setItem('erreurs', 0);

    window.location.href = "index.php?partie=nouvelle";
}

function loadMot(){
    console.log("test");
    var mot = "";
    for (let index = 0; index < sessionStorage.getItem('mot').length; index++) {
        
        mot += "<td id='" + index + "'>_</td>";
    }
    document.getElementById("mot-tr").innerHTML = mot;
}

function p(lettre){
    window.location.href = "index.php?partie=proposition&lettre=" + lettre;
}


