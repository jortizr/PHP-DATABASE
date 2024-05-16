<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form.css">
    <title>Agrega un nuevo ingreso</title>
</head>
<body>
            <a href="/incomes" class="button">
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
    <div class="modal">
        <form action="/incomes" method="post" class="form">
        <p class="title">Nuevo ingreso</p>
            <div class="separator">
            <hr class="line">
            <p>registra un nuevo ingreso</p>
            <hr class="line">
        </div>
        <div class="input_container">
            <label for="payment_method" class="input_label">Metodo de pago</label>
            <select name="payment_method" id="payment_method" class="input_field">
                <option class="input_field" value="1" selected>Cuenta bancaria</option>
                <option class="input_field" value="2">Tarjeta de credito</option>
            </select>
        </div>
        <div class="input_container">
            <label for="type" class="input_label">Tipo de ingreso</label>
            <select name="type" id="type" class="input_field">
                <option class="input_field" value="1" selected>Pago de nomina</option>
                <option class="input_field" value="2">Reembolso</option>
            </select>
        </div>
        <div class="input_container">
            <label for="date" class="input_label">Fecha</label>
            <input type="datetime-local" name="date" id="date" class="input_field" placeholder="year/month/day 00:00">
        </div>
        <div class="input_container">
            <label for="amount" class="input_label">Monto</label>
            <input type="number" name="amount" id="amount" class="input_field" placeholder="ingresa el valor">
        </div>
        <div class="input_container">
            <label for="description" id="description" class="input_label">Descripcion</label>
            <textarea name="description" id="description" placeholder="Ingresa la descripcion del ingreso"></textarea>
        </div>
            <input type="hidden" name="method" value="post" class="input">
            <button type="submit" class="purchase--btn">Guardar</button>
        </form>
    </div>
</body>
</html>
