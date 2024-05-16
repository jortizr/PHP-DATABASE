<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Lista de retiros</title>

</head>
<body>
            <a href="/" class="button">
                <div class="button-box">
                    <span class="button-elem">
                    <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                        d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                        ></path>
                    </svg>
                    </span>
                    <span class="button-elem">
                    <svg viewBox="0 0 46 40">
                        <path
                        d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                        ></path>
                    </svg>
                    </span>
                </div>
            </a>
        <h1 id="list-ingresos">Lista de retiros</h1>
        <table  class="table align-middle">
            <th scope="col">Metodo de retiro</th>
            <th scope="col">Tipo de retiro</th>
            <th scope="col">Fecha</th>
            <th scope="col">Monto</th>
            <th scope="col">Descripción</th>

            <tbody class="table-group-divider">
                <?php foreach($results as $result): ?>
                <tr class="align-middle">
                    <td scope="row"><?= $result["payment_method"] ?></td>
                    <td scope="row"><?= $result["type"] ?></td>
                    <td scope="row"><?= $result["date"] ?></td>
                    <td scope="row"><?= $result["amount"] ?></td>
                    <td scope="row"><?= $result["description"] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn">
        <svg height="20" width="20" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
            <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
        </svg>
        <a href="/withdrawals/create" class="text">Agregar retiro</a>
        </button>
</body>
</html>