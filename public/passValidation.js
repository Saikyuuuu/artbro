(function () {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                    // making sure password enters the right characters
                    form.validationPassword.addEventListener(
                        "keypress",
                        function (event) {
                            console.log("keypress");
                            console.log("event.which: " + event.which);
                            var checkx = true;
                            var chr = String.fromCharCode(event.which);
                            console.log("char: " + chr);

                            var matchedCase = new Array();
                            matchedCase.push("[!@#$%&*_?]"); // Special Charector
                            matchedCase.push("[A-Z]"); // Uppercase Alpabates
                            matchedCase.push("[0-9]"); // Numbers
                            matchedCase.push("[a-z]");

                            for (var i = 0; i < matchedCase.length; i++) {
                                if (new RegExp(matchedCase[i]).test(chr)) {
                                    console.log("checkx: is true");
                                    checkx = false;
                                }
                            }

                            if (form.validationPassword.value.length >= 20)
                                checkx = true;

                            if (checkx) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                        }
                    );

                    let isSuccess = false;
                    let isMatch = false;

                    //Validate Password to have more than 8 Characters and A capital Letter, small letter, number and special character
                    // Create an array and push all possible values that you want in password
                    var matchedCase = new Array();
                    matchedCase.push("[$@$$!%*#?&]"); // Special Charector
                    matchedCase.push("[A-Z]"); // Uppercase Alpabates
                    matchedCase.push("[0-9]"); // Numbers
                    matchedCase.push("[a-z]"); // Lowercase Alphabates

                    form.validationPassword.addEventListener(
                        "keyup",
                        function () {
                            var messageCase = new Array();
                            messageCase.push(" Special Charector"); // Special Charector
                            messageCase.push(" Upper Case"); // Uppercase Alpabates
                            messageCase.push(" Numbers"); // Numbers
                            messageCase.push(" Lower Case"); // Lowercase Alphabates

                            var ctr = 0;
                            var rti = "";
                            for (var i = 0; i < matchedCase.length; i++) {
                                if (
                                    new RegExp(matchedCase[i]).test(
                                        form.validationPassword.value
                                    )
                                ) {
                                    if (i == 0)
                                        messageCase.splice(
                                            messageCase.indexOf(
                                                " Special Charector"
                                            ),
                                            1
                                        );
                                    if (i == 1)
                                        messageCase.splice(
                                            messageCase.indexOf(" Upper Case"),
                                            1
                                        );
                                    if (i == 2)
                                        messageCase.splice(
                                            messageCase.indexOf(" Numbers"),
                                            1
                                        );
                                    if (i == 3)
                                        messageCase.splice(
                                            messageCase.indexOf(" Lower Case"),
                                            1
                                        );
                                    ctr++;
                                    //console.log(ctr);
                                    //console.log(rti);
                                }
                            }

                            //console.log(rti);
                            // Display it
                            var progressbar = 0;
                            var strength = "";
                            var bClass = "";
                            switch (ctr) {
                                case 0:
                                case 1:
                                    strength = "Way too Weak";
                                    progressbar = 15;
                                    bClass = "bg-danger";
                                    if (!isSuccess) {
                                        form.setAttribute(
                                            "onsubmit",
                                            "return false"
                                        );
                                    }
                                    break;
                                case 2:
                                    strength = "Very Weak";
                                    progressbar = 25;
                                    bClass = "bg-danger";
                                    if (!isSuccess) {
                                        form.setAttribute(
                                            "onsubmit",
                                            "return false"
                                        );
                                    }
                                    break;
                                case 3:
                                    strength = "Weak";
                                    progressbar = 34;
                                    bClass = "bg-warning";
                                    if (!isSuccess) {
                                        form.setAttribute(
                                            "onsubmit",
                                            "return false"
                                        );
                                    }
                                    break;
                                case 4:
                                    strength = "Medium";
                                    progressbar = 65;
                                    bClass = "bg-warning";
                                    break;
                            }

                            if (
                                strength == "Medium" &&
                                form.validationPassword.value.length >= 8
                            ) {
                                strength = "Strong";
                                bClass = "bg-success";
                                isSuccess = true;
                                form.removeAttribute("onsubmit");
                                form.removeAttribute("novalidate");
                                form.validationPassword.setCustomValidity("");
                            } else {
                                isSuccess = false;
                                form.removeAttribute("novalidate");
                                form.setAttribute("novalidate", "");
                                form.validationPassword.setCustomValidity(
                                    strength
                                );
                            }

                            var sometext = "";

                            if (form.validationPassword.value.length < 8) {
                                var lengthI =
                                    8 - form.validationPassword.value.length;
                                sometext += ` ${lengthI} more Characters, `;
                            }

                            sometext += messageCase;
                            console.log(sometext);

                            console.log(sometext);

                            if (sometext) {
                                sometext = " You Need" + sometext;
                            }

                            $("#feedbackin, #feedbackirn").text(
                                strength + sometext
                            );
                            $("#progressbar")
                                .removeClass("bg-danger bg-warning bg-success")
                                .addClass(bClass);
                            var plength = form.validationPassword.value.length;
                            if (plength > 0)
                                progressbar += (plength - 0) * 1.75;
                            //console.log("plength: " + plength);
                            var percentage = progressbar + "%";
                            form.validationPassword.parentNode.classList.add(
                                "was-validated"
                            );
                            //console.log("pacentage: " + percentage);
                            $("#progressbar").width(percentage);

                            if (
                                form.validationPassword.checkValidity() === true
                            ) {
                                form.validationConfirmPassword.disabled = false;
                            } else {
                                form.validationConfirmPassword.disabled = true;
                            }
                        }
                    );

                    form.validationConfirmPassword.addEventListener(
                        "keyup",
                        function () {
                            var messageCase = new Array();
                            messageCase.push(" Special Charector"); // Special Charector
                            messageCase.push(" Upper Case"); // Uppercase Alpabates
                            messageCase.push(" Numbers"); // Numbers
                            messageCase.push(" Lower Case"); // Lowercase Alphabates

                            var ctr = 0;
                            var rti = "";
                            for (var i = 0; i < matchedCase.length; i++) {
                                if (
                                    new RegExp(matchedCase[i]).test(
                                        form.validationConfirmPassword.value
                                    )
                                ) {
                                    if (i == 0)
                                        messageCase.splice(
                                            messageCase.indexOf(
                                                " Special Charector"
                                            ),
                                            1
                                        );
                                    if (i == 1)
                                        messageCase.splice(
                                            messageCase.indexOf(" Upper Case"),
                                            1
                                        );
                                    if (i == 2)
                                        messageCase.splice(
                                            messageCase.indexOf(" Numbers"),
                                            1
                                        );
                                    if (i == 3)
                                        messageCase.splice(
                                            messageCase.indexOf(" Lower Case"),
                                            1
                                        );
                                    ctr++;
                                    //console.log(ctr);
                                    //console.log(rti);
                                }
                            }

                            //console.log(rti);
                            // Display it
                            var progressbar = 0;
                            var strength = "";
                            var bClass = "";
                            switch (ctr) {
                                case 0:
                                case 1:
                                    strength = "Way too Weak";
                                    progressbar = 15;
                                    bClass = "bg-danger";
                                    if (!isSuccess || !isMatch) {
                                        form.setAttribute(
                                            "onsubmit",
                                            "return false"
                                        );
                                    }
                                    break;
                                case 2:
                                    strength = "Very Weak";
                                    progressbar = 25;
                                    bClass = "bg-danger";
                                    if (!isSuccess || !isMatch) {
                                        form.setAttribute(
                                            "onsubmit",
                                            "return false"
                                        );
                                    }
                                    break;
                                case 3:
                                    strength = "Weak";
                                    progressbar = 34;
                                    bClass = "bg-warning";
                                    if (!isSuccess || !isMatch) {
                                        form.setAttribute(
                                            "onsubmit",
                                            "return false"
                                        );
                                    }
                                    break;
                                case 4:
                                    strength = "Medium";
                                    progressbar = 65;
                                    bClass = "bg-warning";
                                    break;
                            }

                            if (
                                strength == "Medium" &&
                                form.validationConfirmPassword.value.length >= 8
                            ) {
                                strength = "Strong";
                                bClass = "bg-success";
                                isSuccess = true;
                                console.log("here");
                                if (
                                    form.validationPassword.value ===
                                    form.validationConfirmPassword.value
                                ) {
                                    isMatch = true;
                                    form.removeAttribute("onsubmit");
                                    form.removeAttribute("novalidate");
                                    form.validationConfirmPassword.setCustomValidity(
                                        ""
                                    );
                                } else {
                                    bClass = "bg-danger";
                                    strength = "Password Doesn't match";
                                    isMatch = false;
                                    form.removeAttribute("novalidate");
                                    form.setAttribute("novalidate", "");
                                    form.validationConfirmPassword.setCustomValidity(
                                        strength
                                    );
                                }
                            } else {
                                if (isSuccess && !isMatch) {
                                    isSuccess = false;
                                    bClass = "bg-danger";
                                    form.validationConfirmPassword.setCustomValidity(
                                        "Password Doesn't Match"
                                    );
                                } else {
                                    isSuccess = false;
                                    form.validationConfirmPassword.setCustomValidity(
                                        strength
                                    );
                                }
                            }

                            var sometext = "";

                            if (
                                form.validationConfirmPassword.value.length < 8
                            ) {
                                var lengthI =
                                    8 -
                                    form.validationConfirmPassword.value.length;
                                sometext += ` ${lengthI} more Characters, `;
                            }

                            sometext += messageCase;
                            console.log(sometext);

                            console.log(sometext);

                            if (sometext) {
                                sometext = " You Need" + sometext;
                            }

                            $("#confirmFeedbackin, #confirmFeedbackirn").text(
                                strength + sometext
                            );
                            $("#confirmProgressbar")
                                .removeClass("bg-danger bg-warning bg-success")
                                .addClass(bClass);
                            var plength =
                                form.validationConfirmPassword.value.length;
                            if (plength > 0)
                                progressbar += (plength - 0) * 1.75;
                            //console.log("plength: " + plength);
                            var percentage = progressbar + "%";
                            form.validationConfirmPassword.parentNode.classList.add(
                                "was-validated"
                            );
                            //console.log("pacentage: " + percentage);
                            $("#confirmProgressbar").width(percentage);

                            if (
                                form.validationConfirmPassword.checkValidity() ===
                                true
                            ) {
                                if (
                                    form.validationPassword.value ==
                                    form.validationConfirmPassword.value
                                ) {
                                    isMatch = true;
                                    form.removeAttribute("onsubmit");
                                    form.removeAttribute("novalidate");
                                    form.validationConfirmPassword.setCustomValidity(
                                        ""
                                    );
                                } else {
                                    isMatch = false;
                                    form.removeAttribute("novalidate");
                                    form.setAttribute("novalidate", "");
                                    form.validationConfirmPassword.setCustomValidity(
                                        "Password Doesn't Match"
                                    );
                                }
                            } else {
                                // form.verifyPassword.disabled = true;
                            }
                        }
                    );
                }
            );
        },
        false
    );
})();
