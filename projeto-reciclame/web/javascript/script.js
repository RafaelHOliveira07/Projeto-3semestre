// Função para exibir as notificações armazenadas no botão de sininho
function displayStoredNotifications() {
    // Lê as notificações do arquivo JSON
    var notifications = fs.readFileSync('notifications.json');
    var notificationsArray = JSON.parse(notifications).notifications;

    // Adiciona as notificações à lista do botão de sininho
    var notificationList = document.getElementById('notification-list');
    notificationsArray.forEach(function(notification) {
        var listItem = document.createElement('li');
        listItem.textContent = notification;
        notificationList.appendChild(listItem);
    });
}

// Chama a função para exibir as notificações ao carregar a página
window.onload = function() {
    displayStoredNotifications();
};
