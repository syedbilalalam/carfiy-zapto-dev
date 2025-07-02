// Vin tutorial launcher
sel('#refundInfo').onclick = (e) => {
    e.preventDefault();
    launchPopUp('refund-info');
}
// sel('#pricingTutorialCaller').onclick = (e) => {
//     e.preventDefault();
//     launchPopUp('pricing-tutorial');
// }
const masterCardEventButton = sel('#mcContinue'),
    visaCardEventButton = sel('#vsContinue'),
    cryptoEventButton = sel('#cpContinue');

const cardPayments = q('.cardPayment');
for(let index=0; index<cardPayments.length; index++){
    cardPayments[index].onclick = ()=>{
        Swal.fire({
            icon: 'info',
            text: 'Card payments are comming soon, Under development.'
        });
    }
}

// Handling fiverr responses
// const fiverrButton = sel('#payWithFiverr');
// fiverrButton.onclick = ()=>{
//     // Swal.fire({
//     //     text: 'Fiverr connection is under development stages, Comming soon!',
//     //     icon: 'info'
//     // });
//     window.location.assign('./fiverr-link?o_id='+fiverrButton.dataset.oid);
// }

// Handling payoneer responses
const payoneerButton = sel('#payWithPayoneer');
payoneerButton.onclick = ()=>{
    window.location.assign('./payoneer-pay?o_id='+payoneerButton.dataset.oid);
}

// Handling bank responses
const bankButton = sel('#payWithBank');
bankButton.onclick = ()=>{
    window.location.assign('./bank-pay?o_id='+bankButton.dataset.oid);
}

cryptoEventButton.onclick = ()=>{
    window.location.assign('./crypto-payment?o_id='+cryptoEventButton.dataset.oid);
}