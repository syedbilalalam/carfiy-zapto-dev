// Vin tutorial launcher
sel('#vinTutorialCaller').onclick = (e) => {
    e.preventDefault();
    launchPopUp('vin-tutorial');
}
sel('#pricingTutorialCaller').onclick = (e) => {
    e.preventDefault();
    launchPopUp('pricing-tutorial');
}

// Edit email responser
const editEmailButton = sel('#editEmail');
if(editEmailButton)
    editEmailButton.onclick = () => {
        const targetInput = sel('#emailInp');
        targetInput.readOnly = false;
        targetInput.focus();
    }


// Amount decider
const selectPlan = sel('#selectPlan');
selectPlan.oninput = () => {
    const amountToBePaid = sel('#amountToBePaid');
    if (selectPlan.value.length) {
        sel('#reportFinalUSDPrice').innerText = storePricing[selectPlan.value];
        sel('#reportFinalPKRPrice').innerText = '~';
        sel('#reportFinalPKRPrice').classList.add('pkrPrint');
        sel('#reportFinalPKRPrice').dataset.plan = selectPlan.value;

        // Requesting for pkr pricing
        printPKRPrices();
        amountToBePaid.classList.remove('neutral');
    } else {
        amountToBePaid.classList.add('neutral');
    }
}
sel('#selectPlan').oninput();