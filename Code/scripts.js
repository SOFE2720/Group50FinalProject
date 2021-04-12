function displayPFP(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.querySelector("#pfpDisplay").setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        console.log(e.files[0]);
    }
}




