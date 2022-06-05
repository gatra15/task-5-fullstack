# task-5-fullstack
Virtual Internship Experience (Investree) - Fullstack - Galih Saputra <br />
Checkout API-without-auth for API with out auth
Checkout passport-auth for API using passport authentication
Checkout vue-js for Front-End using vue js and blade templating

# How to Use
1. Set environment
2. php artisan migrate
3. php artisan serve
4. npm run install
5. npm run dev

# Using Postman
base_url = http://127.0.0.1:8000 (from php artisan serve)
header {
  Accept: 'application/json',
  Authorization: Bearer +token
}

token from login / register user

# Login User
"base_url/api/login"

# Register
"base_url/api/register"

# Get all article
"base_url/api/v1/posts"

# Get detail article
"base_url/api/v1/posts/{id}"

# Create article
"base_url/api/v1/posts" method POST

# Create article
"base_url/api/v1/posts/{id}" method PUT
note: in body + key "_method" value PUT  

# Delete article (softdelete)
"base_url/api/v1/posts/{id}"

Enjoy the Project
Sorry for disadvantages in this project
