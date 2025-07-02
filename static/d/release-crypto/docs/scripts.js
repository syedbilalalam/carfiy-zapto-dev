// Managing qr codes
const depositAddress = sel('#dpa').dataset.dpqr;
var qrcode = new QRCode(sel("#qrcode"), {
	width : 162,
	height : 162
});
qrcode.makeCode(depositAddress);

// Copy event
sel('#copyDeposit').onclick = ()=>{
    copyToClipboard(depositAddress);
    Swal.fire({
        icon: 'success',
        text: 'Copied to clipboard!'
    })
}

// Count down management
function startCountdown(durationInSeconds) {
    let timeLeft = durationInSeconds;
    const countdownEl = document.getElementById("countdown");

    function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        // Format as MM:SS with leading zeros
        countdownEl.textContent = 
            String(minutes).padStart(2, '0') + ":" + 
            String(seconds).padStart(2, '0');

        if (timeLeft > 0) {
            timeLeft--;
            setTimeout(updateTimer, 1000);
        }else{
            Swal.fire({
                icon:'info',
                text: "The payment request is expired but don't worry if you still paid but if you didn't paid yet you can no longer pay to that deposit address!",
                confirmButtonText:'Goto my orders',
                showCancelButton:false,
                allowOutsideClick:false
            }).then(()=>{
                window.location.assign('./my-orders');
            })
        }
    }

    updateTimer(); // Start the countdown
}

startCountdown(18*60);