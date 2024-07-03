 function validarImagen() {
            const input = document.getElementById('imgProject');
            const file = input.files[0];

            if (!file) {
                alert("No se ha seleccionado ninguna imagen.");
                return;
            }

            return new Promise((resolve, reject) => {
                const img = new Image();
                img.onload = function () {
                    if (img.width === 1024 && img.height === 1024) {
                        //alert("La imagen tiene el tamaño correcto (1024x1024 píxeles).");
                        resolve(true);
                    } else {
                        //alert("La imagen no tiene el tamaño correcto (1024x1024 píxeles).");
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            iconColor:'#a70202',
                            title: 'La imagen no tiene el tamaño correcto (1024x1024 píxeles).',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        resolve(false);
                    }
                };
                img.src = URL.createObjectURL(file);
            });
        }