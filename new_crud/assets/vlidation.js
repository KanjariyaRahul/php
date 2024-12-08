function validateForm()
{
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const gender = document.getElementById("gender").value.trim();
    const address = document.getElementById("address").value.trim();
    const fileupload = document.getElementById("fileupload").value.trim();
    const imageupload = document.getElementById("imageupload").value.trim();

    const allowedfiletypes = /\.pdf$/i;
    const allowedimagetypes = /\.(jpg|jpeg|png)$/i;

    if(!name || !email || !phone || !gender || !address || !fileupload  || !imageupload)
    {
        alert("All fields are required!");
        return false;
    }

    if(!allowedfiletypes.test(fileupload))
    {
        alert("Invalid file type for file upload. Only PDF files are allowed.");
        return false;
    }

    if(!allowedimagetypes.test(imageupload))
    {
        alert('Invalid file type for image upload. Only JPG, PNG, and GIF files are allowed.');
        return false;
    }

    return true;
    

}