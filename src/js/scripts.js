const acc = document.querySelectorAll(".accordion");
const p = document.querySelectorAll(".section-after-services p");
let i;

// p.forEach(function (p) {
//     console.log(p);
// });

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        console.log(this);
        let icon = this.querySelector("i");

        if (icon.classList.contains('fa-angle-down')) {
            icon.classList.remove("fa-angle-down");
            icon.classList.add("fa-angle-up");
        } else {
            icon.classList.add("fa-angle-down");
            icon.classList.remove("fa-angle-up");
        }

        let panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}