document.addEventListener("DOMContentLoaded", function () {
    function updateLabel(input) {
        if (input.value.trim().length > 0 || document.activeElement === input) {
            input.parentElement.querySelector("label").style.top = "-10px";
        } else {
            input.parentElement.querySelector("label").style.top = "20px";
        }
    }
    function addEventListeners(input) {
        input.addEventListener("blur", function () {
            updateLabel(this);
        });
        input.addEventListener("focus", function () {
            updateLabel(this);
        });
        updateLabel(input);
    }
    const inputs = document.querySelectorAll(
        ".login-input-email input,.login-input-pass input"
    );
    inputs.forEach((input) => addEventListeners(input));
    const observer = new MutationObserver(function (mutations) {
        mutations.forEach((mutation) => {
            mutation.addedNodes.forEach((node) => {
                if (node.nodeType === 1) {
                    const newInputs = node.querySelectorAll(
                        ".login-input-email input,.login-input-pass input"
                    );
                    newInputs.forEach((input) => addEventListeners(input));
                }
            });
        });
    });
    observer.observe(document.body, { childList: true, subtree: true });
});

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("myInput");
    var showIcon = document.getElementById("showPasswordIcon");
    var hideIcon = document.getElementById("hidePasswordIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showIcon.style.display = "none";
        hideIcon.style.display = "inline-block";
    } else {
        passwordInput.type = "password";
        showIcon.style.display = "inline-block";
        hideIcon.style.display = "none";
    }
}
