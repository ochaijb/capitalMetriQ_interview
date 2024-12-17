# Endpoints

Register
URL: localhost:8000/api/register
Method: POST
payload:
{
"email": "email",
"name": "name",
"password": "password",
"phone_number": "password"
"password_confirmation": "password"
}

Success Response:
{
"status": true
"message": "User registered successfully"
}
Error Response:
{
"status": false
"message": "Error message"
}

---

Login
URL: localhost:8000/api/login
Method: POST
payload:
{
"email": "jb@cm.com",
"password": "Password1!"
}

Success Response:
{
"token": {
"name": "AuthToken",
"abilities": [
"*"
],
"expires_at": null,
"tokenable_id": 1,
"tokenable_type": "App\\Models\\User",
"updated_at": "2024-05-08T13:07:44.000000Z",
"created_at": "2024-05-08T13:07:44.000000Z",
"id": 1
}
}

Error Response:
{
"error": "Unauthorized"
}

---

Create Todo List
URL: localhost:8000/api/todo-lists/create
Method: POST
payload:
{
"names": "Mtk Todos"
}

Success Response:
{
"name": "Mtk Todos",
"user_id": 2,
"updated_at": "2024-05-08T14:03:25.000000Z",
"created_at": "2024-05-08T14:03:25.000000Z",
"id": 1
}

Error Response:
{
"error": "Unauthorized"
}

---

Create Task
URL: localhost:8000/api/tasks/create
Method: POST
payload:
{
"description": "mtk todo list",
"due_date": "2024-06-10",
"todo_list_id": 1
}

Success Response:
{
"description": "mtk todo list",
"due_date": "2024-06-10",
"status": "pending",
"todo_list_id": 1,
"updated_at": "2024-05-08T14:11:08.000000Z",
"created_at": "2024-05-08T14:11:08.000000Z",
"id": 1
}

Error Response:
{
"error": "Failed to create task"
}

---

Get Todos
Method - GET
URL - localhost:8000/api/todos

---

Get Tasks
Method - GET
URL localhost:8000/api/tasks

---

Update Task
Method - PUT
URL - localhost:8000/api/task/{id}

---

Update Todo
Method - PUT
URL - localhost:8000/api/todo/{id}

---

Delete Task
Method - DELETE
URL- localhost:8000/api/task/{id}

---

Delete Todo
Method - DELETE
URL - localhost:8000/api/todo/{id}

---

Commands To Run Test Cases:

php artisan test --filter AuthControllerTest
php artisan test --filter TaskControllerTest
php artisan test --filter TodoListControllerTest
