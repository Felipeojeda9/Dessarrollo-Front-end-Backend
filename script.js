document.addEventListener("DOMContentLoaded", () => { //para que cargue antes D:
  const formulario = document.getElementById("formularioContacto");

  if (formulario) {
    formulario.addEventListener("submit", function (event) {
      event.preventDefault();

      const nombre = document.getElementById("nombre").value.trim();
      const servicio = document.getElementById("servicio").value;
      const mensaje = document.getElementById("mensaje").value.trim();

      if (nombre === "" || servicio === "" || mensaje === "") {alert("Por favor completa todos los campos correctamente.");
        return;
      }
      console.log("Formulario enviado:");
      console.log("Nombre:", nombre);
      console.log("Servicio:", servicio);
      console.log("Mensaje:", mensaje);
      alert("¡Gracias por contactarnos! Tu mensaje ha sido enviado.");
      formulario.reset(); //el formularo se resetea
    });
  }
});


  document.addEventListener("DOMContentLoaded", () => {
    const botonToggle = document.getElementById("modoToggle");
    const body = document.body;
  
    botonToggle.addEventListener("click", () => {
      body.classList.toggle("modo-noche");
  
      if (body.classList.contains("modo-noche")) {
        botonToggle.textContent = "Modo Día";
        botonToggle.classList.remove("btn-dark");
        botonToggle.classList.add("btn-light");
      } else {
        botonToggle.textContent = "Modo Noche";
        botonToggle.classList.remove("btn-light");
        botonToggle.classList.add("btn-dark");
      }
    });
  });
