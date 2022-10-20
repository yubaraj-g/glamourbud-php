function haircare() {
    let haircare = document.getElementById("haircare");
    haircare.classList.remove("btn-light");
    haircare.classList.toggle("selectedCatgry");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");

    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    // let removeSelected = document.querySelectorAll("li:not(#haircare)");
    // removeSelected.classList.remove("selectedCatgry");
    // removeSelected.classList.add("btn-light");
}

function facials() {
    let facials = document.getElementById("facials");
    facials.classList.remove("btn-light");
    facials.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");
}

