html
   <!DOCTYPE html>
   <html>
   <head>
       <title>Edit Profile</title>
   </head>
   <body>
       <h1>Edit Profile</h1>
       <form action="{{ route('user.update') }}" method="POST">
           @csrf
           <!-- Форма для редактирования данных пользователя -->
           <label for="name">Name:</label>
           <input type="text" id="name" name="name" value="{{ $user->name }}">
           <br>
           <label for="email">Email:</label>
           <input type="email" id="email" name="email" value="{{ $user->email }}">
           <br>
           <!-- Другие поля для редактирования -->
           <button type="submit">Save</button>
       </form>
   </body>
   </html>
   