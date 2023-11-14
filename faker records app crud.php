<?php

require __DIR__ . '/vendor/autoload.php';

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use Faker\Factory;

// Initialize Faker
$faker = Factory::create();

// Fake data arrays
$employees = [];
$offices = [];
$transactions = [];

// Populate fake data arrays
for ($i = 1; $i <= 50; $i++) {
    $employees[] = [
        'id' => $i,
        'name' => $faker->name,
        'position' => $faker->jobTitle,
        'email' => $faker->email,
    ];

    $offices[] = [
        'id' => $i,
        'name' => $faker->company,
        'location' => $faker->city,
    ];

    $transactions[] = [
        'id' => $i,
        'amount' => $faker->randomFloat(2, 100, 1000),
        'employee_id' => $faker->numberBetween(1, 50),
        'office_id' => $faker->numberBetween(1, 50),
    ];
}

// Define routes
$dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/employees', 'listEmployees');
    $r->addRoute('GET', '/employees/add', 'addEmployeeForm');
    $r->addRoute('POST', '/employees/add', 'addEmployee');
    $r->addRoute('GET', '/employees/edit/{id:\d+}', 'editEmployeeForm');
    $r->addRoute('POST', '/employees/edit/{id:\d+}', 'editEmployee');
    $r->addRoute('GET', '/employees/delete/{id:\d+}', 'deleteEmployee');

    $r->addRoute('GET', '/offices', 'listOffices');
    $r->addRoute('GET', '/offices/add', 'addOfficeForm');
    $r->addRoute('POST', '/offices/add', 'addOffice');
    $r->addRoute('GET', '/offices/edit/{id:\d+}', 'editOfficeForm');
    $r->addRoute('POST', '/offices/edit/{id:\d+}', 'editOffice');
    $r->addRoute('GET', '/offices/delete/{id:\d+}', 'deleteOffice');

    $r->addRoute('GET', '/transactions', 'listTransactions');
    $r->addRoute('GET', '/transactions/add', 'addTransactionForm');
    $r->addRoute('POST', '/transactions/add', 'addTransaction');
    $r->addRoute('GET', '/transactions/edit/{id:\d+}', 'editTransactionForm');
    $r->addRoute('POST', '/transactions/edit/{id:\d+}', 'editTransaction');
    $r->addRoute('GET', '/transactions/delete/{id:\d+}', 'deleteTransaction');
});

// Define route handlers

// Employees
function listEmployees()
{
    global $employees;
    include 'templates/employees/list.php';
}

function addEmployeeForm()
{
    include 'templates/employees/add.php';
}

function addEmployee()
{
    global $employees, $faker;

    $newEmployee = [
        'id' => count($employees) + 1,
        'name' => $_POST['name'],
        'position' => $_POST['position'],
        'email' => $_POST['email'],
    ];

    $employees[] = $newEmployee;

    header('Location: /employees');
}

function editEmployeeForm($params)
{
    global $employees;

    $employeeId = $params['id'];

    $employee = null;
    foreach ($employees as $e) {
        if ($e['id'] == $employeeId) {
            $employee = $e;
            break;
        }
    }

    include 'templates/employees/edit.php';
}

function editEmployee($params)
{
    global $employees;

    $employeeId = $params['id'];

    foreach ($employees as &$employee) {
        if ($employee['id'] == $employeeId) {
            $employee['name'] = $_POST['name'];
            $employee['position'] = $_POST['position'];
            $employee['email'] = $_POST['email'];
            break;
        }
    }

    header('Location: /employees');
}

function deleteEmployee($params)
{
    global $employees;

    $employeeId = $params['id'];

    foreach ($employees as $key => $employee) {
        if ($employee['id'] == $employeeId) {
            unset($employees[$key]);
            break;
        }
    }

    header('Location: /employees');
}

// Offices
function listOffices()
{
    global $offices;
    include 'templates/offices/list.php';
}

function addOfficeForm()
{
    include 'templates/offices/add.php';
}

function addOffice()
{
    global $offices, $faker;

    $newOffice = [
        'id' => count($offices) + 1,
        'name' => $_POST['name'],
        'location' => $_POST['location'],
    ];

    $offices[] = $newOffice;

    header('Location: /offices');
}

function editOfficeForm($params)
{
    global $offices;

    $officeId = $params['id'];

    $office = null;
    foreach ($offices as $o) {
        if ($o['id'] == $officeId) {
            $office = $o;
            break;
        }
    }

    include 'templates/offices/edit.php';
}

function editOffice($params)
{
    global $offices;

    $officeId = $params['id'];

    foreach ($offices as &$office) {
        if ($office['id'] == $officeId) {
            $office['name'] = $_POST['name'];
            $office['location'] = $_POST['location'];
            break;
        }
    }

    header('Location: /offices');
}

function deleteOffice($params)
{
    global $offices;

    $officeId = $params['id'];

    foreach ($offices as $key => $office) {
        if ($office['id'] == $officeId) {
            unset($offices[$key]);
            break;
        }
    }

    header('Location: /offices');
}

// Transactions
function listTransactions()
{
    global $transactions;
    include 'templates/transactions/list.php';
}

function addTransactionForm()
{
    global $employees, $offices;
    include 'templates/transactions/add.php';
}

function addTransaction()
{
    global $transactions, $faker;

    $newTransaction = [
        'id' => count($transactions) + 1,
        'amount' => $_POST['amount'],
        'employee_id' => $_POST['employee_id'],
        'office_id' => $_POST['office_id'],
    ];

    $transactions[] = $newTransaction;

    header('Location: /transactions');
}

function editTransactionForm($params)
{
    global $transactions, $employees, $offices;

    $transactionId = $params['id'];

    $transaction = null;
    foreach ($transactions as $t) {
        if ($t['id'] == $transactionId) {
            $transaction = $t;
            break;
        }
    }

    include 'templates/transactions/edit.php';
}

function editTransaction($params)
{
    global $transactions;

    $transactionId = $params['id'];

    foreach ($transactions as &$transaction) {
        if ($transaction['id'] == $transactionId) {
            $transaction['amount'] = $_POST['amount'];
            $transaction['employee_id'] = $_POST['employee_id'];
            $transaction['office_id'] = $_POST['office_id'];
            break;
        }
    }

    header('Location: /transactions');
}

function deleteTransaction($params)
{
    global $transactions;

    $transactionId = $params['id'];

    foreach ($transactions as $key => $transaction) {
        if ($transaction['id'] == $transactionId) {
            unset($transactions[$key]);
            break;
        }
    }

    header('Location: /transactions');
}

// Dispatch the request
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo '404 Not Found';
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo '405 Method Not Allowed';
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];
        $handler($params);
        break;
}
