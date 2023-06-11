var arrayFormularios = []; // Array para almacenar los objetos de formulario

function agregarDatosFormulario() {
  var formulario = {}; // Objeto para almacenar los datos del formulario

  formulario.nombre = document.getElementById('inputNombre').value;
  formulario.apellido = document.getElementById('inputApellido').value;
  formulario.correo = document.getElementById('inputEmail').value;
  formulario.cantidad = document.getElementById('inputCantidad').value;
  formulario.categoria = document.getElementById('inputCategoria').value;

  arrayFormularios.push(formulario); // Agregar el objeto de formulario al array

  console.log(arrayFormularios);
}


//-- tikect cards
function agregarDatosFormulario() {
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
  
  