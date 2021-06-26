$(document).ready(function() {
    let statusPago = $('#status').val();

    function checkStatus(status) {
        if (status == 'approved') {
            let paymentMethodId = $('#paymentMethodId').val();
            let externalReference = $('#externalReference').val();
            let paymentId = $('#paymentId').val();
            let collectionId = $('#collectionId').val();

            let contenido = "<div class='alert alert-success alert-dismissible fade show' role='alert'><svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Aprobado:'><use xlink:href='#check-circle-fill'/></svg><br><h4 class='alert-heading'>Pago aprobado exitosamente!</h4><button type='button' class='btn-close' id='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><hr>";
            if (!paymentMethodId.includes("Undefined")) contenido += "<p>ID del Metodo de Pago: " + paymentMethodId + "</p>";
            if (externalReference != null) contenido += "<p>External Reference: " + externalReference + "</p>";
            if (paymentId != null) contenido += "<p>ID del Pago: " + paymentId + " </p></div>";
            if (paymentId == null && collectionId != null) contenido += "<p>ID del Pago: " + collectionId + " </p>";
            contenido += "</div>";
            //Agrego el Contenido al Div
            $('#resultadoDiv').append(contenido);
        } else if (status == 'rejected') {
            let contenido = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Rechazado:'><use xlink:href='#exclamation-triangle-fill'/></svg><button type='button' class='btn-close' id='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><h4 class='alert-heading'>Pago rechazado!</h4><hr><div>Su pago ha sido rechazado o no se procesó correctamente!</div></div>";
            $('#resultadoDiv').append(contenido);
        } else if (status == 'pending' || status == 'in_process') {
            $('#resultadoDiv').append("<div class='alert alert-warning alert-dismissible fade show' role='alert'><svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Pendiente:'><use xlink:href='#info-fill'/></svg><button type='button' class='btn-close' id='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><h4 class='alert-heading'>Pago pendiente!</h4><hr><div>Su pago se encuentra en estado pendiente!</div></div>");
        }
    }
    checkStatus(statusPago);

    $('#btn-close').on("click", function() {
        $(location).attr('href', './index.php');

    });
});