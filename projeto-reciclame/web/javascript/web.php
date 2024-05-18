<script>
        // Lista de lixeiras carregadas do PHP
        var listaDeLixeiras = <?php echo $listaJson; ?>;
        console.log("Lista de Lixeiras:", listaDeLixeiras);

       
    // WebSocket para receber dados das lixeiras
    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

    socket.onmessage = function(event) {
        var dadosRecebidos = JSON.parse(event.data);
        console.log("Dados Recebidos:", dadosRecebidos);

        var idLixeiraRecebido = dadosRecebidos.idLixeira.toString();
        var lixeiraEncontrada = listaDeLixeiras.find(function(lixeira) {
            return lixeira.idLixeira.toString() === idLixeiraRecebido;
        });

        // Atualiza o status da lixeira se ela for encontrada
        if (lixeiraEncontrada) {
            console.log("Lixeira encontrada na lista:", lixeiraEncontrada);
            if (dadosRecebidos.status === "Cheia") {
                updateStatus(idLixeiraRecebido, "Cheia");
            } else {
                updateStatus(idLixeiraRecebido, "Pronto para coleta");
            }
            updateLastPulse(idLixeiraRecebido);
        } else {
            console.log("Lixeira com ID " + idLixeiraRecebido + " não encontrada na lista.");
        }
    };

    // Atualiza todos os status para "Em uso" no carregamento da página
    window.onload = function() {
        initializeStatus();
        updateStatusMenu();
        setInterval(checkLixeiraStatus, 60000); // Verificar status das lixeiras a cada minuto
        displayNotifications();
    };

    // Inicializa o status das lixeiras como "Em uso"
    function initializeStatus() {
        listaDeLixeiras.forEach(function(lixeira) {
            updateStatus(lixeira.idLixeira.toString(), "Em uso");
        });
        saveStatusToLocalStorage();
    }




// WebSocket para receber dados das lixeiras
var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

socket.onmessage = function(event) {
    var dadosRecebidos = JSON.parse(event.data);
    console.log("Dados Recebidos:", dadosRecebidos);

    var idLixeiraRecebido = dadosRecebidos.idLixeira.toString();
    var lixeiraEncontrada = listaDeLixeiras.find(function(lixeira) {
        return lixeira.idLixeira.toString() === idLixeiraRecebido;
    });

    if (lixeiraEncontrada) {
        console.log("Lixeira encontrada na lista:", lixeiraEncontrada);

        if ('Notification' in window) {
            Notification.requestPermission().then(function(permission) {
                if (permission === 'granted') {
                    createNotification('Ponto pronto para coleta:', 
                        `ID: ${lixeiraEncontrada.idLixeira}\nTipo: ${lixeiraEncontrada.tipo}\nLocalização: ${lixeiraEncontrada.nome}`,
                        new Date().getTime());
                }
            }).catch(function(error) {
                console.log('Erro ao solicitar permissão para exibir notificações:', error);
            });
        }

        // Verifica se a lixeira está cheia e atualiza o status
        if (dadosRecebidos.status === "Cheia") {
            updateStatus(idLixeiraRecebido, "Cheia");
        } else {
            updateStatus(idLixeiraRecebido, "Pronto para coleta");
        }
        updateLastPulse(idLixeiraRecebido);
    } else {
        console.log("Lixeira com ID " + idLixeiraRecebido + " não encontrada na lista.");
    }


        };

        // Array para armazenar as notificações
        let notifications = [];
        let lixeiraStatus = {};
        let lixeiraLastPulse = {};  // Armazenar o timestamp do último pulso

  

        // Função para criar uma nova notificação e armazená-la
        function createNotification(title, message, timestamp) {
            let notification = {
                title: title,
                message: message,
                timestamp: timestamp
            };
            notifications.push(notification);
            console.log("Nova notificação criada:", notification);

            if ('Notification' in window) {
                Notification.requestPermission().then(function(permission) {
                    if (permission === 'granted') {
                        new Notification(title, { body: message });
                    }
                });
            }

            saveNotificationsToLocalStorage(notifications);
            displayNotifications();
        }

        function loadNotificationsFromLocalStorage() {
            let storedNotifications = JSON.parse(localStorage.getItem("notifications"));
            if (storedNotifications) {
                notifications = storedNotifications.slice(-5);
                displayNotifications();
            }
        }

        function saveNotificationsToLocalStorage(notifications) {
            let lastFiveNotifications = notifications.slice(-5);
            localStorage.setItem("notifications", JSON.stringify(lastFiveNotifications));
        }

        function displayNotifications() {
            let notificationsList = document.getElementById("notificationsList");
            notificationsList.innerHTML = "";

            notifications.forEach(notification => {
                let listItem = document.createElement("li");
                listItem.textContent = `${notification.title}: ${notification.message} (${new Date(notification.timestamp).toLocaleString()})`;
                notificationsList.appendChild(listItem);
            });

            document.getElementById("notificationUnreadIcon").style.display = notifications.length > 0 ? "inline" : "none";
            document.getElementById("notificationIcon").style.display = notifications.length > 0 ? "none" : "inline";
        }

        function toggleNotifications() {
            let notificationsList = document.getElementById("notificationsList");
            notificationsList.style.display = notificationsList.style.display === "none" ? "block" : "none";
        }

        // Status Management
        function initializeStatus() {
    let statusList = document.getElementById("statusList");
    
    listaDeLixeiras.forEach(function(lixeira) {
        let lixeiraId = lixeira.idLixeira.toString();
        
        let existingStatusItem = statusList.querySelector(`#lixeira_${lixeiraId}`);
        if (existingStatusItem) {
            existingStatusItem.textContent = `Lixeira ID ${lixeiraId}: ${lixeiraStatus[lixeiraId]}`;
        } else {
            let statusItem = document.createElement("li");
            statusItem.id = `lixeira_${lixeiraId}`;
            statusItem.textContent = `Lixeira ID ${lixeiraId}: ${lixeiraStatus[lixeiraId]}`;
            statusList.appendChild(statusItem);
        }
    });
    
    // Salva o status inicial no armazenamento local
    saveStatusToLocalStorage();
}



        function loadStatusFromLocalStorage() {
            let storedStatus = JSON.parse(localStorage.getItem("lixeiraStatus"));
            if (storedStatus) {
                lixeiraStatus = storedStatus;
            }
        }

        function saveStatusToLocalStorage() {
            localStorage.setItem("lixeiraStatus", JSON.stringify(lixeiraStatus));
        }

        function updateStatus(idLixeira, status) {
            lixeiraStatus[idLixeira] = status;
            saveStatusToLocalStorage();
            updateStatusMenu();
        }
// Função para atualizar o menu de status das lixeiras
function updateStatusMenu() {
    let statusList = document.getElementById("statusList");
    statusList.innerHTML = "";

    listaDeLixeiras.forEach(function(lixeira) {
        // Verifica se a lixeira tem um status definido, se não, define como "Em uso"
        if (!lixeiraStatus.hasOwnProperty(lixeira.idLixeira)) {
            lixeiraStatus[lixeira.idLixeira] = "Em uso";
        }

        let statusItem = document.createElement("li");
        statusItem.textContent = `Lixeira ID ${lixeira.idLixeira}: ${lixeiraStatus[lixeira.idLixeira]}`;
        statusList.appendChild(statusItem);
    });
}

        function toggleStatusMenu() {
            let statusMenu = document.getElementById("statusMenu");
            statusMenu.style.display = statusMenu.style.display === "none" ? "block" : "none";
        }

        function loadLastPulseFromLocalStorage() {
            let storedLastPulse = JSON.parse(localStorage.getItem("lixeiraLastPulse"));
            if (storedLastPulse) {
                lixeiraLastPulse = storedLastPulse;
            }
        }

        function saveLastPulseToLocalStorage() {
            localStorage.setItem("lixeiraLastPulse", JSON.stringify(lixeiraLastPulse));
        }

        function updateLastPulse(idLixeira) {
            lixeiraLastPulse[idLixeira] = new Date().getTime();
            saveLastPulseToLocalStorage();
        }

        function checkLixeiraStatus() {
            let currentTime = new Date().getTime();
            for (let id in lixeiraLastPulse) {
                if (currentTime - lixeiraLastPulse[id] > 60000) { // 60 segundos
                    updateStatus(id, "Manutenção");
                }
            }
        }
    </script>