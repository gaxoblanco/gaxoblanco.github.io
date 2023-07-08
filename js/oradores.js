$(document).ready(function() {
    // Realiza la solicitud GET a "get_oradores.php" para obtener los datos
    $.get("get_oradores.php", function(data) {
        var oradores = JSON.parse(data);

        // Recorre los oradores y genera las tarjetas del carrusel
        var carouselInner = $(".carousel-inner");
        oradores.forEach(function(orador, index) {
            var activeClass = (index === 0) ? "active" : ""; // Añade la clase "active" a la primera tarjeta
            var tarjeta = `
                <div class="card ${activeClass}">
                    <img src="${orador.image}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">${orador.name}</h5>
                        <p class="card-text">${orador.description}</p>
                    </div>
                </div>
            `;
            carouselInner.append(tarjeta);
        });
    });
});