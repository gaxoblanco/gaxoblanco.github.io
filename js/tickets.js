function agregarDatosFormulario(event) {
  event.preventDefault();

  const nombre = document.getElementById('inputNombre').value;
  const apellido = document.getElementById('inputApellido').value;
  const correo = document.getElementById('inputEmail').value;
  const cantidad = document.getElementById('inputCantidad').value;
  const categoria = document.getElementById('inputCategoria').value;

  const formulario = {
    nombre,
    apellido,
    correo,
    cantidad,
    categoria
  };

  const ticketsContainer = document.getElementById('ticketsContainer');

  const ticketCard = document.createElement('div');
  ticketCard.classList.add('ticket-card');
  ticketCard.innerHTML = `
    <h2>Entrada</h2>
    <p><strong>Nombre:</strong> ${formulario.apellido} ${formulario.nombre}</p>
    <p> </p>
    <p><strong>Categoría:</strong> ${formulario.categoria}</p>
    <p><strong>Cantidad:</strong> ${formulario.cantidad}</p>
    <p><strong>Correo:</strong> ${formulario.correo}</p>
  `;

  ticketsContainer.appendChild(ticketCard);
}

document.getElementById('formulario').addEventListener('submit', agregarDatosFormulario);
