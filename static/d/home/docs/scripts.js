// Section B Slider
const carHistorySlider = document.getElementById('carHistorySlider'),
    carHistoryClipper = document.getElementById('carHistoryClipper'),
    carHistoryDivider = document.getElementById('carHistoryDivider');

carHistorySlider.onmousemove = (e)=>{
    const newSliderLocation = e.pageX-carHistorySlider.offsetLeft-(carHistoryDivider.offsetWidth/2)
    if(newSliderLocation > carHistorySlider.offsetWidth || newSliderLocation < 0)
        return;
    carHistoryDivider.style.left = `${newSliderLocation}px`;
    carHistoryClipper.style.clipPath = `inset(0 0 0 ${e.pageX-carHistorySlider.offsetLeft}px)`;
    // console.log(e);
}
carHistorySlider.ontouchmove = (e)=>{
    const touch = e.touches[0];
    const newSliderLocation = touch.clientX-carHistorySlider.offsetLeft-(carHistoryDivider.offsetWidth/2)
    if(newSliderLocation > carHistorySlider.offsetWidth || newSliderLocation < 0)
        return;
    carHistoryDivider.style.left = `${newSliderLocation}px`;
    carHistoryClipper.style.clipPath = `inset(0 0 0 ${touch.clientX-carHistorySlider.offsetLeft}px)`;
    // console.log(e);
}