async function subirArchivos() {
    const formulario = document.getElementById("cargarArchivos");

    console.log(formulario);

    const formEnviar = new FormData(formulario);

    console.log(formEnviar);

    let temp = await fetch("./subir.php", {
        method: "POST",
        body: formEnviar,
    });
    window.location.reload();
}
