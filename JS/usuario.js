document.getElementById("save-button").addEventListener("click", function() {
    // Obtener el valor del input de nombre de usuario
    const usernameInput = document.getElementById("username-input").value;

    // Actualizar el nombre de usuario en el encabezado
    document.getElementById("username").innerText = usernameInput;

    // Obtener el archivo de imagen seleccionado
    const photoInput = document.getElementById("photo-input").files[0];

    // Comprobar si se ha seleccionado un archivo
    if (photoInput) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            // Actualizar la fuente de la imagen
            document.getElementById("profile-pic").src = e.target.result;
        }

        // Leer el archivo de imagen
        reader.readAsDataURL(photoInput);
    }
});

 
