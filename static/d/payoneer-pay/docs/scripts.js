const uploadButton = sel('#uploadButton'), fileInput = sel('#fileInput');
uploadButton.onclick = ()=>{
    fileInput.click();
}

// Payoneer email copy
const copBtn = sel('#copyPayoneerEmail');
copBtn.onclick = ()=>{
    copyToClipboard(copBtn.dataset.copyItem);
    Swal.fire({
        icon:'success',
        text: 'Copied to clipboard!'
    });
}

fileInput.onchange = ()=>{
    if(fileInput.files.length){
        const file = fileInput.files[0];
        sel('#fileName').innerText = file.name;
        uploadButton.classList.remove('notUploaded');
    }
}

const bankingForm = sel('#bankForm');
bankingForm.onsubmit = async (e)=>{
    e.preventDefault();

    const allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/bmp", "application/pdf"];
    const maxSize = 5 * 1024 * 1024; // 5MB in bytes


    if (fileInput.files.length === 0) {
        Swal.fire({
            icon: 'warning',
            text: 'Upload the required file to continue!'
        });
        return;
    }
    const file = fileInput.files[0];
    
    // Validate file type
    if (!allowedTypes.includes(file.type)) {
        Swal.fire({
            icon: 'warning',
            text: 'Invalid file type. Only JPG, PNG, GIF, BMP and PDF are allowed.'
        });
        return;
    }

    // Validate file size
    if (file.size > maxSize) {
        Swal.fire({
            icon: 'warning',
            text: 'File size exceeds 5MB limit.'
        });
        return;
    }

    

    let formData = new FormData();
    formData.append("file", file); // Append file
    formData.append('o_id', sel('#o_id').value);

    Swal.fire({
        title: 'Loading...',
        text: 'Please wait',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading(); // Show the loading spinner
        }
    });
    
    const response = await fetch('workers/apis/get-paid-payoneer.php', {
        method: "POST",
        body: formData
    });
    if(response.ok){
        const responseText = await response.text();
        // console.log(responseText);
        if(responseText == 'success')
            window.location.replace('./my-orders');
    }else{
        Swal.fire({text:'Server error occured!', icon:'error'});
    }
    
    Swal.close();
    // .then(response => response.text())
    // .then(data => {
    //     document.getElementById("status").innerText = data;
    // })
    // .catch(error => {
    //     document.getElementById("status").innerText = "Error uploading file.";
    // });
}
