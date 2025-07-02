const SERVER_ROOT = '';
let newSizeRequested = false;
const urlCurrentWindow = new URL(window.location.href);

// Manageing copy button
function copyToClipboard(text) {
    // Store the current scroll position
    const scrollPosition = window.scrollY;

    // Create a temporary textarea element to hold the text
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);

    // Focus the textarea and select the text
    textarea.focus();
    textarea.select();

    try {
        // Try executing the copy command
        document.execCommand('copy');
        // alert('Text copied to clipboard!');
    } catch (err) {
        // Handle any errors that might occur
        // alert('Failed to copy text!');
    }

    // Remove the textarea element from the DOM
    document.body.removeChild(textarea);

    // Scroll the page back to the original position to prevent scrolling
    window.scrollTo(0, scrollPosition);
}


// Element contactor
function sel(elem) {
    return document.querySelector(elem);
}
function q(elem) {
    return document.querySelectorAll(elem);
}
// Mobile navigation worker
const mobileNavigation = document.getElementById('mNavBar');
if(mobileNavigation){
    mobileNavigation.onfocus = ()=>{
        mobileNavigation.classList.add('active');
    }
    mobileNavigation.onblur = (e)=>{
        // Check if the related target (new focus) is a child of the parentDiv
        if (mobileNavigation.contains(e.relatedTarget) && e.relatedTarget.id != 'closeNavBar') {
            e.preventDefault(); // Prevent focus loss
        } else {
            mobileNavigation.classList.remove('active');
        }

    }

    document.getElementById('mobileNavigation').onclick = ()=>{
        mobileNavigation.focus();
    };
    document.getElementById('closeNavBar').onclick = ()=>{
        // mobileNavigation.blur();
        // document.focus();
    }

}

// Show/Hide passwords manager
function checkPasswordActivity() {
    const showPasswordElems = document.getElementsByClassName('showPasswordTarget'),
        showPasswordInp = q('.showPasswordInp');
    for (let index = 0; index < showPasswordElems.length; index++) {
        const element = showPasswordElems[index];
        element.onclick = () => {
            if (element.dataset.status == 'password') {
                showPasswordInp[index].type = 'text';
                element.innerText = 'HIDE';
                element.dataset.status = 'text';
            } else {
                showPasswordInp[index].type = 'password';
                element.innerText = 'SHOW';
                element.dataset.status = 'password';
            }
        }
        showPasswordInp[index].oninput = (e) => {
            if (e.target.value == '')
                element.classList.remove('active');
            else
                element.classList.add('active');
        }
    }
}

// Pop controls
const popUps = q('.popUpBox'),
    closePopUps = q('.closePopUp');
for(let index=0; index<popUps.length; index++){
    closePopUps[index].onclick = ()=>{
        popUps[index].classList.remove('active');
    }
}
function launchPopUp(name){
    const targetElem = document.querySelector(`.popUpBox[data-name="${name}"]`);
    targetElem.classList.add('active');
}

// Finishing user messages
const errorMessage = urlCurrentWindow.searchParams.get('err-msg');
if(errorMessage){
    Swal.fire({
        icon: 'error',
        text:errorMessage
    });
    urlCurrentWindow.searchParams.delete('err-msg');
    window.history.replaceState(null, '', urlCurrentWindow.toString());
}

// marketing ids
// const market_url = `https://v6.exchangerate-api.com/v6/${marketing_id}/latest/USD`;

// Finishing user messages
const successMessage = urlCurrentWindow.searchParams.get('success-msg');
if(successMessage){
    Swal.fire({
        icon: 'success',
        text:successMessage
    });
    urlCurrentWindow.searchParams.delete('success-msg');
    window.history.replaceState(null, '', urlCurrentWindow.toString());
}

// Finishing user messages
const warningMessage = urlCurrentWindow.searchParams.get('warn-msg');
if(warningMessage){
    Swal.fire({
        icon: 'warning',
        text:warningMessage
    });
    urlCurrentWindow.searchParams.delete('warn-msg');
    window.history.replaceState(null, '', urlCurrentWindow.toString());
}

// Finishing user messages
const infoMessage = urlCurrentWindow.searchParams.get('info-msg');
if(infoMessage){
    Swal.fire({
        icon: 'info',
        text:infoMessage
    });
    urlCurrentWindow.searchParams.delete('info-msg');
    window.history.replaceState(null, '', urlCurrentWindow.toString());
}

// Define pricing
const storePricing = {
    basic: 35,
    silver: 50, 
    gold: 70
}
// async function convertUSDtoPKR(amount) {
//     try {
//         const response = await fetch(market_url);
//         const data = await response.json();

//         if (data.result === "success") {
//             const exchangeRate = data.conversion_rates.PKR;
//             const convertedAmount = amount * exchangeRate;
//             // console.log(`USD ${amount} = PKR ${}`);
//             return convertedAmount.toFixed(2);
//         } else {
//             console.error("Error fetching exchange rate:", data);
//         }
//     } catch (error) {
//         console.error("Failed to fetch exchange rates:", error);
//     }
// }
async function getExchangeRate() {
    try {
        let response = await fetch("https://api.exchangerate-api.com/v4/latest/USD");
        let data = await response.json();
        return data.rates.PKR; // Get USD to PKR rate
    } catch (error) {
        console.error("Error fetching exchange rate:", error);
        return null;
    }
}

async function convertToPKR(usdAmount) {
    let exchangeRate = await getExchangeRate();
    if (exchangeRate) {
        let pkrValue = (usdAmount * exchangeRate).toFixed(2);
        return pkrValue;
    } else {
        return false;
    }
}

// Define pricing
let pkrValuesOfPlans = {};

async function storePKRPricing(){
    pkrValuesOfPlans = {
        basic: await convertToPKR(storePricing.basic),
        silver: await convertToPKR(storePricing.silver), 
        gold: await convertToPKR(storePricing.gold)
    };
}
// Managing all pkr values
async function printPKRPrices(){
    if(!pkrValuesOfPlans.basic)
        await storePKRPricing();
    const pkrPrintables = q('.pkrPrint');
    for(let index=0; index<pkrPrintables.length; index++){
        const element = pkrPrintables[index];
        element.innerText = pkrValuesOfPlans[element.dataset.plan];
    }
}
function printUSDPrices(){
    const pkrPrintables = q('.usdPrint');
    for(let index=0; index<pkrPrintables.length; index++){
        const element = pkrPrintables[index];
        element.innerText = storePricing[element.dataset.plan];
    }
}
function formatUnixToLocal(unixTimestamp) {
    const date = new Date(unixTimestamp * 1000); // Convert UNIX timestamp to milliseconds

    return new Intl.DateTimeFormat('en-GB', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
        timeZoneName: 'shortGeneric' // Uses short timezone name like IST, PST, JST
    }).format(date).replace(',', '');
}
function formatTimeZones(){
    const printTimes = q('.printTime');
    for(let index=0; index<printTimes.length; index++){
        const element = printTimes[index];
        element.innerText = formatUnixToLocal(parseInt(element.dataset.time));
    }
}
printUSDPrices();
printPKRPrices();
formatTimeZones();
