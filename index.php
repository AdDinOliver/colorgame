<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela 5x5</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #1c1c1c;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            height: 17vw;
            background-color: #333;
            color: #e0e0e0;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background: red;
        }

        #banner {
            width: 90vw;
            height: 70vw;
            background-color: darkgrey;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
            overflow: hidden;
            margin-top: 25vw;
            border-radius: 2vw;
        }

        #banner .slide {
            display: none;
            font-size: 18px;
            padding: 10px;
        }

        #banner .active {
            display: block;
        }

        #form-container {
            margin-top: 60px; /* Ajusta a margem para evitar sobreposição com o cabeçalho */
            margin-bottom: 20px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            font-size: 18px;
            color: #e0e0e0;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input, .input-group button {
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            width: 220px;
            margin: 5px;
        }

        .input-group input {
            background-color: #333;
            color: #e0e0e0;
        }

        .input-group input:focus {
            background-color: #444;
            outline: none;
        }

        .input-group button {
            background-color: #e74c3c;
            color: #fff;
            cursor: pointer;
        }

        .input-group button:hover {
            background-color: #c0392b;
        }

        .input-group button:active {
            background-color: #e74c3c;
        }

        #selected-numbers {
            margin-top: 20px;
            font-size: 18px;
            color: #e0e0e0;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 5vw;
            background: #333;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.5);
            width: 500px;
            table-layout: fixed;
            display: table; /* Garante que a tabela seja exibida */
        }

        td {
            border: 1px solid #444;
            width: 20%;
            height: 80px;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            position: relative;
            background-color: #2c3e50;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 8px;
        }

        td.selected {
            border: 2px solid gold;
        }

        td.green {
            background-color: #27ae60 !important;
        }

        td.blue {
            background-color: #2980b9 !important;
        }

        td.orange {
            background-color: #f39c12 !important;
        }

        td.red {
            background-color: #c0392b !important;
        }

        td.black {
            background-color: #34495e !important;
            color: #ecf0f1 !important;
        }

        .corner-value {
            position: absolute;
            top: 3px;
            right: 3px;
            font-size: 16px;
            background-color: #000;
            color: #e0e0e0;
            padding: 4px 8px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.5);
        }

        .message {
            font-size: 12px;
            background-color: transparent;
            color: gold;
            position: absolute;
            bottom: 2px;
            left: 2px;
            padding: 2px 4px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.5);
        }

        #round-counter {
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
            color: #e0e0e0;
            text-align: center;
        }

        footer {
            width: ;
            background-color: #333;
            color: #e0e0e0;
            text-align: center;
            padding: 10px;
            position: relative;
            margin-top: 15vw;
            background: red;
        }

        @media (max-width: 600px) {
            table, td {
                width: 95%;
                height: 60px;
            }

            .input-group input, .input-group button {
                font-size: 14px;
                padding: 10px;
                width: 180px;
            }

            #selected-numbers {
                font-size: 16px;
            }
        }

        h1 {
            padding: 0;
            margin: auto;
            margin-top: 2vw;
            font-size: 7vw;
            position: relative;
            width: 80vw;
            background: transparent;
        }

        p {
            padding: 0 4vw;
            margin: auto;
            font-size: 3vw;
            position: relative;
            width: 86vw;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Jogo de Tabela 5x5</h1>
    </header>

    <div id="banner">
        <div class="slide active">Slide 1: Bem-vindo ao nosso jogo! <img src="" alt="imagemdobanner" /></div>
        <div class="slide">Slide 2: Divirta-se e boa sorte!</div>
        <div class="slide">Slide 3: Lembre-se de verificar as regras.</div>
    </div>

    <div id="form-container">
        <div class="input-group">
            <label for="player-name">Nome:</label>
            <input type="text" id="player-name" placeholder="Digite seu nome" required>
        </div>
        <button id="start-button">Iniciar Rodadas</button>
    </div>

    <div id="selected-numbers">Números Selecionados: <span id="selected-list">Nenhum</span></div>

    <table>
        <tbody>
            <!-- Linhas da tabela serão geradas pelo JavaScript -->
        </tbody>
    </table>

    <div id="round-counter">Rodada: 1</div>

    <footer>
        <p>© 2024 Jogo Tabela 5x5. Todos os direitos reservados.</p>
    </footer>



    <?php
$servername = "localhost"; // ou o endereço do seu servidor MySQL
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "meuprimeirobanco";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}




include 'db_connect.php'; // Inclui o arquivo de conexão

// Recebe dados JSON enviados do frontend
$data = json_decode(file_get_contents('php://input'), true);

// Valida e insere dados na tabela
if (isset($data['nome']) && isset($data['numero'])) {
    $nome = $conn->real_escape_string($data['nome']);
    $numero = (int)$data['numero'];
    
    // Inserir jogador (ou atualize conforme necessário)
    $sql = "INSERT INTO jogadores (nome) VALUES ('$nome')";
    if ($conn->query($sql) === TRUE) {
        $jogador_id = $conn->insert_id; // ID do jogador recém-inserido
        
        // Inserir número selecionado
        $sql = "INSERT INTO selecionados (jogador_id, numero) VALUES ($jogador_id, $numero)";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'sucesso']);
        } else {
            echo json_encode(['status' => 'erro', 'mensagem' => $conn->error]);
        }
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => $conn->error]);
    }
}

$conn->close();
?>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa variáveis
            const totalRounds = 10;
            let currentRound = 1;
            let blackColorApplied = false;
            let selectedNumbers = [];

            function initializeTable() {
                const tableBody = document.querySelector('tbody');
                let number = 1;
                tableBody.innerHTML = ''; // Limpa o conteúdo atual do corpo da tabela
                for (let i = 0; i < 5; i++) {
                    const row = document.createElement('tr');
                    for (let j = 0; j < 5; j++) {
                        const cell = document.createElement('td');
                        cell.innerHTML = `${number}<div class="corner-value">0</div>`;
                        cell.dataset.number = number;
                        cell.dataset.value = 0;
                        row.appendChild(cell);
                        number++;
                    }
                    tableBody.appendChild(row);
                }
            }

            function getRandomIndexes(count, max) {
                const indexes = [];
                while (indexes.length < count) {
                    const rand = Math.floor(Math.random() * max);
                    if (!indexes.includes(rand)) indexes.push(rand);
                }
                return indexes;
            }

            function applyColors() {
                const cells = Array.from(document.querySelectorAll('td'));
                const totalCells = cells.length;
                const cellsToColor = 14;

                const colorCounts = {
                    green: 2,
                    blue: 3,
                    orange: 4,
                    red: 5,
                    black: blackColorApplied ? 0 : 1
                };

                const shuffledIndexes = getRandomIndexes(cellsToColor, totalCells);

// Limpar cores e mensagens
cells.forEach(cell => {
  cell.classList.remove('green', 'blue', 'orange', 'red', 'black');
  const messageDiv = cell.querySelector('.message');
  if (messageDiv) {
    messageDiv.remove();
  }
});

let index = 0;
Object.entries(colorCounts).forEach(([color, count]) => {
  for (let i = 0; i < count; i++) {
    if (index >= shuffledIndexes.length) return;
    const cell = cells[shuffledIndexes[index++]];
    cell.classList.add(color);

    let currentValue = parseInt(cell.dataset.value, 10);
    let newValue;

    switch (color) {
      case 'green':
        newValue = currentValue + 3;
        showMessage(cell, '+3');
        break;
      case 'blue':
        newValue = currentValue + 2;
        showMessage(cell, '+2');
        break;
      case 'orange':
        newValue = currentValue + 1;
        showMessage(cell, '+1');
        break;
      case 'red':
        newValue = 0;
        if (!cell.querySelector('.message[data-message="zero"]')) {
          showMessage(cell, 'Você zerou!', 'zero');
        }
        removeNumberFromSelection(cell);
        break;
      case 'black':
        newValue = currentValue + 10;
        showMessage(cell, '+10');
        blackColorApplied = true;
        break;
    }

    cell.querySelector('.corner-value').textContent = newValue;
    cell.dataset.value = newValue;
  }
});
}

function showMessage(cell, message, dataMessage) {
  const messageDiv = document.createElement('div');
  messageDiv.className = 'message';
  messageDiv.textContent = message;
  if (dataMessage) {
    messageDiv.dataset.message = dataMessage;
  }
  cell.appendChild(messageDiv);
}

function removeNumberFromSelection(cell) {
  const number = cell.dataset.number;
  selectedNumbers = selectedNumbers.filter(n => n !== number);
  document.querySelector(`td[data-number="${number}"]`)?.classList.remove('selected');
  updateSelectedNumbers();

  // Após 2 segundos, verificar se ainda há números selecionados
  setTimeout(() => {
    if (!checkIfNamesRemain()) {
      document.getElementById('round-counter').textContent = 'Jogo encerrado! Nenhum número restante.';
      determineWinner();
    }
  }, 5000); // Atraso de 2 segundos
}

function checkIfNamesRemain() {
  const cells = Array.from(document.querySelectorAll('td'));
  return cells.some(cell => selectedNumbers.includes(cell.dataset.number));
}

function updateRoundCounter() {
  document.getElementById('round-counter').textContent = `Rodada: ${currentRound}`;
}

function startRounds() {
  document.getElementById('form-container').style.display = 'none';
  document.querySelector('table').style.display = 'table';
  document.getElementById('round-counter').style.display = 'block';

  const roundInterval = setInterval(() => {
    if (currentRound <= totalRounds) {
      applyColors();
      updateRoundCounter();

      if (!checkIfNamesRemain()) {
        clearInterval(roundInterval);
        document.getElementById('round-counter').textContent = 'Jogo encerrado! Nenhum número restante.';
        determineWinner();
      } else {
        currentRound++;
      }
    } else {
      clearInterval(roundInterval);
      document.getElementById('round-counter').textContent = 'Rodadas concluídas!';
      determineWinner();
    }
  }, 5000); // 2 segundos
}

function determineWinner() {
  const cells = Array.from(document.querySelectorAll('td'));
  let highestValue = -1;
  let winnerNumber = null;

  cells.forEach(cell => {
    if (selectedNumbers.includes(cell.dataset.number)) {
      const value = parseInt(cell.dataset.value, 10);
      if (value > highestValue) {
        highestValue = value;
        winnerNumber = cell.dataset.number;
      }
    }
  });

  if (highestValue > -1) {
    const result = `O vencedor é o número ${winnerNumber} com o valor ${highestValue}`;
    alert(result);
    generateQRCode(result);
  } else if (highestValue === 0) {
    alert('Nenhum número selecionado foi o vencedor.');
  }
}

function generateQRCode(data) {
  // Remove qualquer QR code existente
  const existingQRCode = document.getElementById('qr-code-container');
  if (existingQRCode) {
    existingQRCode.remove();
  }

  // Cria um elemento de imagem para o QR code
  const qrCodeImg = document.createElement('img');
  qrCodeImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(data)}`;
  qrCodeImg.alt = 'QR Code';

  // Adiciona o QR code ao final da página
  const qrCodeContainer = document.createElement('div');
  qrCodeContainer.id = 'qr-code-container';
  qrCodeContainer.style.textAlign = 'center';
  qrCodeContainer.style.marginTop = '20px';
  qrCodeContainer.appendChild(qrCodeImg);

  document.body.appendChild(qrCodeContainer);
}

function updateSelectedNumbers() {
  const selectedList = document.getElementById('selected-list');
  selectedList.textContent = selectedNumbers.length > 0 ? selectedNumbers.join(', ') : 'Nenhum';
}

document.querySelector('tbody').addEventListener('click', (event) => {
  if (event.target.tagName === 'TD') {
    const cell = event.target;
    const number = cell.dataset.number;

    if (cell.classList.contains('selected')) {
      cell.classList.remove('selected');
      selectedNumbers = selectedNumbers.filter(n => n !== number);
    } else {
      if (selectedNumbers.length < 1) {
        cell.classList.add('selected');
        selectedNumbers.push(number);
      } else {
        alert('Você já selecionou 1 números.');
      }
    }

    updateSelectedNumbers();
  }
});

document.getElementById('start-button').addEventListener('click', () => {
  const playerName = document.getElementById('player-name').value.trim();
  if (playerName === '') {
    alert('Por favor, insira seu nome.');
    return;
  }
  if (selectedNumbers.length !== 1) {
    alert('Por favor, selecione exatamente 1 números.');
    return;
  }
  startRounds();
});

// Inicializa a tabela
initializeTable();
});







// Função para enviar dados ao servidor
function enviarDadosJogador(nome, numeroSelecionado) {
    fetch('salvar_dados.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ nome: nome, numero: numeroSelecionado }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Dados salvos:', data);
    })
    .catch((error) => {
        console.error('Erro:', error);
    });
}

// Chame essa função quando o jogador iniciar o jogo
document.getElementById('start-button').addEventListener('click', () => {
    const playerName = document.getElementById('player-name').value.trim();
    if (playerName === '' || selectedNumbers.length !== 1) {
        alert('Por favor, insira seu nome e selecione exatamente 1 número.');
        return;
    }
    enviarDadosJogador(playerName, selectedNumbers[0]);
    startRounds();
});
</script>
</body>
</html>