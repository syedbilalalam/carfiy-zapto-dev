// OTP box controllers
const otpBoxes = q('.otpBox');
let otpValue = [];
for (let index = 0; index < otpBoxes.length; index++) {
    const element = otpBoxes[index];
    element.oninput = (e) => {
        if (element.value.length > 1) {
            otpBoxes[index + 1].value = element.value.slice(1);
            element.value = element.value.slice(0, 1);
            otpBoxes[index + 1].oninput();
            otpBoxes[index + 1].focus();
        } else if (otpBoxes[index - 1]) {
            otpBoxes[index - 1].focus();
        }
        otpValue[index] = element.value;

        if (element.value.length > index + 1) {
            element.value = element.value.slice(0, 1);
        }
    }
    element.onfocus = () => {
        if (!element.value.length) {
            if (index > 0)
                otpBoxes[index - 1].focus();
        }
    }
}
function getOTPString() {
    let finalString = '';
    for (let index = 0; index < otpValue.length; index++) {
        finalString += otpValue[index];
    }
    return finalString;
}