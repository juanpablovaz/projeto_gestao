<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Novo Contratado</title>
    <link rel="stylesheet" href="styles.css"> <!-- Estilos externos se houver -->
    <style>
        /* Estilos básicos para o layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px 0;
        }

        .status-box {
            background-color: #ffffff;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .status-box h3 {
            margin-top: 0;
        }

        .status-list {
            list-style-type: none;
            padding: 0;
        }

        .status-list li {
            padding: 10px;
            background-color: #f9f9f9;
            margin: 5px 0;
            border-radius: 6px;
        }

        .status-list li .status {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn-secondary {
            background-color: #007bff;
        }

        .alert {
            background-color: #ffcc00;
            color: #333;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: absolute;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <h1>Portal do Novo Contratado</h1>
    </header>

    <!-- Conteúdo principal -->
    <div class="container">

        <!-- Saudação e Informações sobre a Vaga -->
        <section class="welcome">
            <h2>Bem-vindo(a), [Nome do Contratado]!</h2>
            <p>Você está se candidatando para a vaga de <strong>[Nome da Vaga]</strong>.</p>
            <p>Aqui você pode enviar os documentos necessários para completar seu processo de contratação.</p>
        </section>

        <!-- Status dos Documentos -->
        <section class="status-box">
            <h3>Status dos seus Documentos</h3>
            <ul class="status-list">
                <li>
                    <span class="document">RG</span> - 
                    <span class="status" style="color: green;">Aprovado</span> 
                    <a href="#" class="btn btn-secondary">Ver Detalhes</a>
                </li>
                <li>
                    <span class="document">CPF</span> - 
                    <span class="status" style="color: red;">Pendente</span> 
                    <a href="#" class="btn">Enviar Documento</a>
                </li>
                <li>
                    <span class="document">Comprovante de Endereço</span> - 
                    <span class="status" style="color: orange;">Em Revisão</span> 
                    <a href="#" class="btn btn-secondary">Ver Detalhes</a>
                </li>
            </ul>
        </section>

        <!-- Avisos Importantes -->
        <section class="alert">
            <strong>Aviso:</strong> Seu comprovante de endereço deve ser enviado até o final do mês para completar seu processo.
        </section>

        <!-- Ações Rápidas -->
        <section>
            <a href="#" class="btn">Enviar Documento</a>
            <a href="#" class="btn btn-secondary">Ver Documentos</a>
            <a href="#" class="btn btn-secondary">Consultar Suporte</a>
        </section>

        <!-- Documentos Requeridos para a Vaga -->
        <section class="status-box">
            <h3>Documentos Requeridos para a Vaga de [Nome da Vaga]</h3>
            <p>Para concluir seu processo de contratação, por favor, envie os seguintes documentos:</p>
            <ul class="status-list">
                <li>RG (Cópia legível)</li>
                <li>CPF (Cópia legível)</li>
                <li>Comprovante de Endereço (Últimos 3 meses)</li>
            </ul>
        </section>

    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Empresa X | <a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
    </footer>

</body>
</html>
