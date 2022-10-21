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

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");


    // let removeSelected = document.querySelectorAll("li:not(#haircare)");
    // removeSelected.classList.remove("selectedCatgry");
    // removeSelected.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><div class="service-item"><h6 id="service1">Haircut Men</h6><p class="price">26$</p><button class="btn btn-primary" onclick="addS1()">add</button></div><div class="service-item"><h6 id="service2">Haircut Women (above shoulders)</h6><p class="price">28$</p><button class="btn btn-primary" onclick="addS2()">add</button></div><div class="service-item"><h6 id="service3">Haircut Women (below shoulders)</h6><p class="price">35$</p><button class="btn btn-primary" onclick="addS3()">add</button></div><div class="service-item"><h6 id="service4">Highlights & Color (Full)</h6><p class="price">130$</p><button class="btn btn-primary" onclick="addS4()">add</button></div><div class="service-item"><h6 id="service5">Permanent Color</h6><p class="price">99$</p><button class="btn btn-primary" onclick="addS5()">add</button></div><div class="service-item"><h6 id="service6">Full Perm</h6><p class="price">99$</p><button class="btn btn-primary" onclick="addS6()">add</button></div><div class="service-item"><h6 id="service7">Acid Repair Perm</h6><p class="price">129$</p><button class="btn btn-primary" onclick="addS7()">add</button></div><div class="service-item"><h6 id="service8">Japanese Straightning Perm</h6><p class="price">290$</p><button class="btn btn-primary" onclick="addS8()">add</button></div>';

    document.getElementById("services").innerHTML = servicelist;
}

function facials() {
    let facials = document.getElementById("facials");
    facials.classList.remove("btn-light");
    facials.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");


    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}

function advFacials() {
    let advf = document.getElementById("advFacials");
    advf.classList.remove("btn-light");
    advf.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}
function antiAging() {
    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("btn-light");
    antiAging.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");

    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}
function eyeTreatment() {
    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("btn-light");
    eyeTreatment.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");
    
    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}
function bodyMsg() {
    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("btn-light");
    bodyMsg.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");
    
    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}
function makeups() {
    let makeups = document.getElementById("makeups");
    makeups.classList.remove("btn-light");
    makeups.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");
    
    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}
function waxing() {
    let waxing = document.getElementById("waxing");
    waxing.classList.remove("btn-light");
    waxing.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");
    
    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("selectedCatgry");
    nailcare.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}
function nailcare() {
    let nailcare = document.getElementById("nailcare");
    nailcare.classList.remove("btn-light");
    nailcare.classList.toggle("selectedCatgry");

    let haircare = document.getElementById("haircare");
    haircare.classList.remove("selectedCatgry");
    haircare.classList.add("btn-light");

    let facials = document.getElementById("facials");
    facials.classList.remove("selectedCatgry");
    facials.classList.add("btn-light");
    
    let advFacials = document.getElementById("advFacials");
    advFacials.classList.remove("selectedCatgry");
    advFacials.classList.add("btn-light");

    let antiAging = document.getElementById("antiAging");
    antiAging.classList.remove("selectedCatgry");
    antiAging.classList.add("btn-light");

    let eyeTreatment = document.getElementById("eyeTreatment");
    eyeTreatment.classList.remove("selectedCatgry");
    eyeTreatment.classList.add("btn-light");

    let bodyMsg = document.getElementById("bodyMsg");
    bodyMsg.classList.remove("selectedCatgry");
    bodyMsg.classList.add("btn-light");

    let makeups = document.getElementById("makeups");
    makeups.classList.remove("selectedCatgry");
    makeups.classList.add("btn-light");

    let waxing = document.getElementById("waxing");
    waxing.classList.remove("selectedCatgry");
    waxing.classList.add("btn-light");

    let servicelist = '<h2>Services</h2><p>Not added yet!</p>';
    document.getElementById("services").innerHTML = servicelist;
}





function addS1() {
    // let booked = 'Haircut Men';
    document.getElementById("servicename").innerHTML = 'Haircut Men';
    document.getElementById("price").innerHTML = '26';
    document.getElementById("h_servicename").value = 'Haircut Men';
    document.getElementById("h_price").value = '26';
}

function addTime1() {
    let addtime = '11:00am - 11:30am';
    document.getElementById("timeperiod").innerHTML = addtime;
    document.getElementById("h_timeperiod").value = addtime;
}