// Toggle para los botones de la sidebar
document.querySelectorAll('.element-slidebar-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        this.parentElement.classList.toggle('active');
    });
});

// Toggle para el menú
document.getElementById('menu-toggle').addEventListener('click', function() {
    let slidebar = document.getElementById('slidebar');
    slidebar.classList.toggle('hidden');
});

// Función para manejar el LED 1
document.getElementById("ingresarBodegaBtn").addEventListener("click", function() {
    fetch('http://192.168.137.68/on1')
        .then(response => response.text())
        .then(data => {
            if (data === "LED 1 Encendido") {
                document.getElementById("statusAcceso").textContent = "Estado del LED 1: Encendido";
            } else {
                document.getElementById("statusAcceso").textContent = "Estado del LED 1: Desconocido";
            }
        })
        .catch(error => console.error('Error:', error));
});

document.getElementById("salirBodegaBtn").addEventListener("click", function() {
    fetch('http://192.168.137.68/off1')
        .then(response => response.text())
        .then(data => {
            if (data === "LED 1 Apagado") {
                document.getElementById("statusAcceso").textContent = "Estado del LED 1: Apagado";
            } else {
                document.getElementById("statusAcceso").textContent = "Estado del LED 1: Desconocido";
            }
        })
        .catch(error => console.error('Error:', error));
});
// Función para activar la alarma
document.getElementById("activarAlarmaBtn").addEventListener("click", function() {
    fetch('http://192.168.137.68/on2')
        .then(response => response.text())
        .then(data => {
            if (data === "Alarma Activada") {
                document.getElementById("statusAlarma").textContent = "Estado de alarma: Activada";
            } else {
                document.getElementById("statusAlarma").textContent = "Estado de alarma: Desconocido";
            }
        })
        .catch(error => console.error('Error:', error));
});

// Función para desactivar la alarma
document.getElementById("desactivarAlarmaBtn").addEventListener("click", function() {
    fetch('http://192.168.137.68/off2')
        .then(response => response.text())
        .then(data => {
            if (data === "Alarma Desactivada") {
                document.getElementById("statusAlarma").textContent = "Estado de alarma: Desactivada";
            } else {
                document.getElementById("statusAlarma").textContent = "Estado de alarma: Desconocido";
            }
        })
        .catch(error => console.error('Error:', error));
});
