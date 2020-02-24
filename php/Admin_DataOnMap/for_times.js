/**
 * First we setup the year and time picker options 
 * by DOM manipulation, meaning adding HTML.
 * We do this so it is easily manipulated later on.
 * @param {String} : dsta dend msta mend ysta yend tsta tend
 * For (start & end) day , month , year and time values.   
 */

let dsta = document.getElementsByName("start-day")[0];
let dend = document.getElementsByName("end-day")[0];
let msta = document.getElementsByName("start-month")[0];
let mend = document.getElementsByName("end-month")[0];
let ysta = document.getElementsByName("start-year")[0];
let yend = document.getElementsByName("end-year")[0];
let tsta = document.getElementsByName("start-time")[0];
let tend = document.getElementsByName("end-time")[0];
    
for (let i = 2000; i <= 2020; i++) {
    let opt = new Option();
    opt.value = opt.text = i;
    ysta.add(opt);
}
for (let j = 2020; j >= 2000; j--) {
    let opt = new Option();
    opt.value = opt.text = j;
    yend.add(opt);
}
for (let k = 0; k < 24; k++) {
    let opt = new Option();
    opt.value = opt.text = k;
    tsta.add(opt);
}
for (let m = 0; m < 24; m++) {
    let opt = new Option();
    opt.value = opt.text = m;
    tend.add(opt);
}

dsta.addEventListener("change", validate_date);
dend.addEventListener("change", validate_date);
msta.addEventListener("change", validate_date);
mend.addEventListener("change", validate_date);
ysta.addEventListener("change", validate_date);
yend.addEventListener("change", validate_date);
tsta.addEventListener("change", validate_date);
tend.addEventListener("change", validate_date);

function validate_date() {
    // Checking Year
    if (yend.value != ""){
        if (ysta.value > yend.value) {
            alert("Starting year should be less than ending year!");
            yend.value = "";
        }
    }

}

/**
 * Time for collecting the information and utilizing them. 
 */

document.getElementById("month_submit").onclick = month ;

$("#month_form").submit(function(e) {
    e.preventDefault();
});

function month() {
    let formData = JSON.stringify($("#month_form").serializeArray());
    console.log (formData);
}