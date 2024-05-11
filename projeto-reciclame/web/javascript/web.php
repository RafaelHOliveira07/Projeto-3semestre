<script>
    var listaDeLixeiras = <?php echo $listaJson; ?>;
    console.log("Lista de Lixeiras:", listaDeLixeiras);

    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

    socket.onmessage = function (event) {
        var dadosRecebidos = JSON.parse(event.data);
        console.log("Dados Recebidos:", dadosRecebidos);

        // Verifica se o ID da lixeira recebida está na lista de lixeiras
        var idLixeiraRecebido = dadosRecebidos.idLixeira.toString(); // Convertendo para string
        var lixeiraEncontrada = listaDeLixeiras.find(function (lixeira) {
            return lixeira.idLixeira.toString() === idLixeiraRecebido;
        });

        if (lixeiraEncontrada) {
            console.log("Lixeira encontrada na lista:", lixeiraEncontrada);

            // Verifica se o navegador suporta a API de Notificações
            // Verifica se o navegador suporta a API de Notificações
if ('Notification' in window) {
    // Verifica se as notificações estão ativadas
    if (Notification.permission === 'granted') {
        // Cria uma nova notificação com as informações da lixeira
        createNotification('Ponto pronto para coleta:', 
            `ID: ${lixeiraEncontrada.idLixeira}\nTipo: ${lixeiraEncontrada.tipo}\nLocalização: ${lixeiraEncontrada.nome}`,
            new Date().getTime()); // Adiciona um carimbo de data/hora
    } else if (Notification.permission !== 'denied') {
        // Se as notificações não foram negadas, solicita permissão para exibi-las
        Notification.requestPermission().then(function (permission) {
            if (permission === 'granted') {
                // Cria uma nova notificação com as informações da lixeira
                createNotification('Ponto pronto para coleta:', 
                    `ID: ${lixeiraEncontrada.idLixeira}\nTipo: ${lixeiraEncontrada.tipo}\nLocalização: ${lixeiraEncontrada.nome}`,
                    new Date().getTime()); // Adiciona um carimbo de data/hora
            }
        }).catch(function (error) {
            console.log('Erro ao solicitar permissão para exibir notificações:', error);
        });
    }
} else {
    console.log('Este navegador não suporta a API de Notificações.');
}

        } else {
            console.log("Lixeira com ID " + idLixeiraRecebido + " não encontrada na lista.");
        }
    };

    // Array para armazenar as notificações
    let notifications = [];

    // Carregar as notificações salvas ao carregar a página
    window.onload = function() {
        loadNotificationsFromLocalStorage();
    };

    // Função para criar uma nova notificação e armazená-la
    function createNotification(title, message, timestamp) {
        let notification = {
            title: title,
            message: message,
            timestamp: timestamp
        };
        notifications.push(notification);
        console.log("Nova notificação criada:", notification);
        saveNotificationsToLocalStorage(notifications); // Salvar notificações no armazenamento local
        displayNotifications(); // Chama a função para exibir as notificações atualizadas
    }

    // Função para carregar as notificações salvas do armazenamento local
 // Função para carregar as notificações salvas do armazenamento local
function loadNotificationsFromLocalStorage() {
    let storedNotifications = JSON.parse(localStorage.getItem("notifications"));
    if (storedNotifications) {
        notifications = storedNotifications;
        // Exibir apenas as últimas cinco notificações, se houver mais do que cinco
        if (notifications.length > 5) {
            notifications = notifications.slice(-5);
        }
        displayNotifications(); // Exibe as notificações ao carregar a página
    }
}


    // Função para salvar as notificações no armazenamento local
    function saveNotificationsToLocalStorage(notifications) {
        // Salvar apenas as últimas cinco notificações
        let lastFiveNotifications = notifications.slice(-5);
        localStorage.setItem("notifications", JSON.stringify(lastFiveNotifications));
    }
// Função para criar uma nova notificação e armazená-la
function createNotification(title, message, timestamp) {
    let notification = {
        title: title,
        message: message,
        timestamp: timestamp
    };
    notifications.push(notification);
    console.log("Nova notificação criada:", notification);
    
    // Verifica se as notificações são suportadas pelo navegador
    if ('Notification' in window) {
        // Solicita permissão para exibir notificações
        Notification.requestPermission().then(function(permission) {
            // Verifica se a permissão foi concedida
            if (permission === 'granted') {
                // Cria e exibe a notificação
                let newNotification = new Notification(title, {
                    body: message
                });
            }
        });
    }
    
    saveNotificationsToLocalStorage(notifications); // Salvar notificações no armazenamento local
    displayNotifications(); // Chama a função para exibir as notificações atualizadas
}

    // Função para exibir as notificações
function displayNotifications() {
    let notificationsList = document.getElementById("notificationsList");
    notificationsList.innerHTML = ""; // Limpa a lista antes de atualizá-la

    // Verifica se há mais de 5 notificações
    if (notifications.length > 5) {
        // Exibe apenas as últimas cinco notificações
        let start = notifications.length - 5;
        for (let i = start; i < notifications.length; i++) {
            let notification = notifications[i];
            let listItem = document.createElement("li");
            listItem.textContent = `${notification.title}: ${notification.message} (${new Date(notification.timestamp).toLocaleString()})`;
            notificationsList.appendChild(listItem);
        }
    } else {
        // Exibe todas as notificações se houver menos de 5
        notifications.forEach(notification => {
            let listItem = document.createElement("li");
            listItem.textContent = `${notification.title}: ${notification.message} (${new Date(notification.timestamp).toLocaleString()})`;
            notificationsList.appendChild(listItem);
        });
    }
}


    // Função para alternar entre mostrar e esconder a lista de notificações
    function toggleNotifications() {
        let notificationsList = document.getElementById("notificationsList");
        if (notificationsList.style.display === "none") {
            notificationsList.style.display = "block";
        } else {
            notificationsList.style.display = "none";
        }
    }

    // Exibir todas as notificações ao carregar a página
    displayNotifications();
</script>
