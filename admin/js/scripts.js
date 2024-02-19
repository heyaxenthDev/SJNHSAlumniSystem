function previewProfilePicture() {
    var preview = document.getElementById('profilePicturePreview');
    var fileInput = document.getElementById('profilePicture').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
        preview.style.display = 'block';
    }

    if (fileInput) {
        reader.readAsDataURL(fileInput);
    } else {
        preview.src = '\SJNHSAlumniSystem/admin/assets/img/user.png'; // Set default image
    }
}