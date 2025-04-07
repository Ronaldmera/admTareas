function enviarNotificacion(titulo, mensaje) {
  if (Notification.permission === "granted") {
    new Notification(titulo, {
      body: mensaje,
      icon: "https://cdn-icons-png.flaticon.com/512/1827/1827392.png"
    });
  } else {
    Notification.requestPermission().then(permission => {
      if (permission === "granted") {
        enviarNotificacion(titulo, mensaje);
      }
    });
  }
}

// Verifica si una tarea ya fue notificada para un día específico
function yaNotificada(tareaId, diasAntes) {
  return localStorage.getItem(`tarea_${tareaId}_d${diasAntes}`) === "notificada";
}

// Marca una tarea como notificada para un día específico
function marcarComoNotificada(tareaId, diasAntes) {
  localStorage.setItem(`tarea_${tareaId}_d${diasAntes}`, "notificada");
}

// Función principal para verificar las tareas
function verificarTareas(tareas) {
  const hoy = new Date();
  const diasNotificacion = [3, 1];

  tareas.forEach(tarea => {
    const fechaLimite = new Date(tarea.end_date);
    const diferenciaTiempo = fechaLimite - hoy;
    const diferenciaDias = Math.ceil(diferenciaTiempo / (1000 * 60 * 60 * 24));

    diasNotificacion.forEach(dia => {
      if (
        tarea.status === "pendiente" &&
        diferenciaDias === dia &&
        !yaNotificada(tarea.id, dia)
      ) {
        enviarNotificacion("Tarea por vencer", `La tarea "${tarea.title}" vence en ${dia} día(s).`);
        marcarComoNotificada(tarea.id, dia);
        console.log(`Notificada tarea ID ${tarea.id} con ${dia} día(s) de anticipación`);
      }
    });
  });
}

// Ejecutar si las tareas están definidas
if (typeof tareas !== "undefined") {
  verificarTareas(tareas);
}
