<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ventana Modal con jQuery</title>
    <style>
      .modal-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        color: white;
      }

      .modal-content {
        background-color: black;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      }

      .close-modal {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <!-- Botón para abrir la ventana modal -->
    <button id="openModalBtn">Abrir Ventana Modal</button>

    <!-- Ventana Modal -->
    <div class="modal-container" id="myModal">
      <div class="modal-content">
        <span class="close-modal" id="closeModal">&times;</span>
        <h2>Create una cuenta para avisarte de nuevas ofertas</h2>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      $(document).ready(function () {
        // Mostrar la ventana modal al hacer clic en el botón
        $("#myModal").fadeIn();

        // Cerrar la ventana modal al hacer clic en la "X" o fuera del contenido
        $("#myModal, #closeModal").click(function (e) {
          if (e.target === this || e.target.id === "closeModal") {
            $("#myModal").fadeOut();
          }
        });

        // Evitar que el clic en el contenido de la ventana modal la cierre
        $(".modal-content").click(function (e) {
          e.stopPropagation();
        });
      });
    </script>
  </body>
</html>
