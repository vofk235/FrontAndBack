const un = document.getElementById("user-name");
const up = document.getElementById("user-password");
const fl = document.getElementById("form-login");
const fr = document.getElementById("form-register");
const v = document.querySelectorAll(".form-reg");
let err = false;

fl.addEventListener("submit", (e) => {
    const regex_n = new RegExp(un.getAttribute("pattern"));
    const regex_p = new RegExp(up.getAttribute("pattern"));
    if (regex_n.test(un.value)) {
        err = true;
    }
    if (regex_p.test(up.value)) {
        err = true;
    }
    if (err == false) {
        e.preventDefault();
    }
});

fr.addEventListener("submit", (e) => {
    if (err == false) {
        e.preventDefault();
    }
});

v.forEach((ev) => {
    ev.addEventListener("blur", () => {
        const regex = new RegExp(ev.getAttribute("pattern"));
        let lab = document.querySelector("label[for='" + ev.getAttribute("id") + "']");
        if (ev.value != "" && regex.test(ev.value)) {
            lab.classList.remove("in-valid");
            lab.classList.add("valid");
            err = true;
        } else {
            lab.classList.remove("valid");
            lab.classList.add("in-valid");
            err = false;
        }
    });
});