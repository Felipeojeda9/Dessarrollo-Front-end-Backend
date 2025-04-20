document.addEventListener("DOMContentLoaded", () => {
  const headerParams = { 'Authorization': 'Bearer ciisa' };
  const proxyUrl = "https://cors-anywhere.herokuapp.com/";
  const apiUrl = "https://ciisa.coningenio.cl/v1/about-us/";

  fetch(proxyUrl + apiUrl, {
    method: "GET",
    headers: headerParams
  })
    .then(response => response.json())
    .then(data => {
      const contenedor = document.getElementById("contenedorServicios");
      data.data.forEach(item => {
        const card = document.createElement("div");
        card.className = "col-md-4";
        card.innerHTML = `
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">${item.titulo.esp}</h5>
              <p class="card-text">${item.descripcion.esp}</p>
            </div>
          </div>
        `;
        contenedor.appendChild(card);
      });
    })
    .catch(error => {
      console.error("Error al cargar los datos:", error);
    });
});
