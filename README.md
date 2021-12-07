# laravel_vuejs_crud
creating a complete todo List using laravel api as a backend and vue js as a frontend

# laravel version :
8.x

# routes
/api/todos : for listing all todos (default route)
/api/todos/1 : for listing todo that has id equal 1 (details page)
/api/addTodo : for add new todo ,it necessary to pass an title & description attributes on the header
/api/updateTodo : for updating an existing todo ,  it required also to pass an title & description attributes on the header as arguments
/api/deleteTodo/1 : for delete a given todo  (todo that has id equal 1 in this case )
