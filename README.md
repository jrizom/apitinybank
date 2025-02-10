# apitinybank
Laravel TinyBank API

#Instructions:
git clone https://github.com/jrizom/apitinybank.git

cd apitinybank

composer install

cp .env.example .env

php artisan key:generate

php artisan serve


You can deposit, withdraw, view the balance and the history of transactions
POST /deposit
POST /withdraw
GET /balance
GET /history

#To run the project

    - Via terminal: (consider -c to create file and -b to keep testing with the same file)

    curl -c cookie.txt -X POST http://127.0.0.1:8000/deposit \
     -H "Content-Type: application/json" \
     -d '{"amount": 1000}'

    curl -b cookie.txt -X POST http://127.0.0.1:8000/withdraw \
     -H "Content-Type: application/json" \
     -d '{"amount": 500}'

    curl -b cookie.txt -X GET http://127.0.0.1:8000/balance 

    curl -b cookie.txt -X GET http://127.0.0.1:8000/history


    - Via Javascript

        //DEPOSIT MONEY

        fetch('http://127.0.0.1:8000/deposit', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            credentials: 'include', // Para mantener la sesión
            body: JSON.stringify({ amount: 1000 })
        })
        .then(response => response.json())
        .then(data => console.log(data));

        //WITHDRAW MONEY

        fetch('http://127.0.0.1:8000/withdraw', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            credentials: 'include',
            body: JSON.stringify({ amount: 500 })
        })
        .then(response => response.json())
        .then(data => console.log(data));

        //view balance

        fetch('http://127.0.0.1:8000/balance', {
            method: 'GET',
            credentials: 'include'
        })
        .then(response => response.json())
        .then(data => console.log(data));

        // check history
        fetch('http://127.0.0.1:8000/history', {
            method: 'GET',
            credentials: 'include'
        })
        .then(response => response.json())
        .then(data => console.log(data));

        - Via Postman:

        URL: http://127.0.0.1:8000/deposit (or withdraw)
        Headers: Content-Type: application/json
        Body:
        {
        "amount": 5000
        }

        http://127.0.0.1:8000/history

        http://127.0.0.1:8000/balance
