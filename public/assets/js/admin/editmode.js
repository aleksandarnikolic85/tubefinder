document.addEventListener("DOMContentLoaded", function () {
    (function () {
        var showBlockBtn = document.querySelectorAll(".show-block-options");

        showBlockBtn.forEach(btn => {
            btn.addEventListener("click", function () {
                let optionsWindow = this.nextElementSibling;
                optionsWindow.style.display = "block";
            });
        });


        var closeBlockBtn = document.querySelectorAll(".close-block-options");

        closeBlockBtn.forEach(btn => {
            btn.addEventListener("click", function () {
                let optionsWindow = this.parentElement;
                optionsWindow.style.display = "none";
            });
        });

    })();

    (function () {
        let reloadBtns = Array.from(document.querySelectorAll(".block-options-reload"));
        reloadBtns.forEach(btn => {
            btn.addEventListener("click", function () {
                let parentWindow = parent.document.querySelector("#pimcore_panel_tabs-body > .x-tabpanel-child[aria-hidden='false']");
                parentWindow.querySelector('[data-qtip="Refresh"]').click();
            });
        });
    })();
});