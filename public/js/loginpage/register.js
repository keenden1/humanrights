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
        ".register-input-email input,.register-input-fullname input,.register-input-contact input,.register-input-password input,.register-input-repeatpassword input,.register-input-username input"
    );
    inputs.forEach((input) => addEventListeners(input));
    const observer = new MutationObserver(function (mutations) {
        mutations.forEach((mutation) => {
            mutation.addedNodes.forEach((node) => {
                if (node.nodeType === 1) {
                    const newInputs = node.querySelectorAll(
                        ".register-input-email input,.register-input-fullname input,.register-input-contact input,.register-input-password input,.register-input-repeatpassword input,.register-input-username input"
                    );
                    newInputs.forEach((input) => addEventListeners(input));
                }
            });
        });
    });
    observer.observe(document.body, { childList: true, subtree: true });
});
document.addEventListener("DOMContentLoaded", function() {
    var passwordInput = document.querySelector('input[name="password"]');

    passwordInput.addEventListener("input", function() {
        if (passwordInput.validity.tooShort) {
            passwordInput.setCustomValidity("Password must be at least 8 characters long.");
        } else {
            passwordInput.setCustomValidity("");
        }
    });
});

