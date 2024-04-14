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
           <label for="username">Ник:</label>
           <input type="text" id="username" name="username" value="{{ $user->username }}">
           <br>
           <label for="bio">О себе:</label>
           <input type="text" id="bio" name="bio" value="{{ $user->bio }}">
           <!-- Другие поля для редактирования -->
           <button type="submit">Save</button>
       </form>
   </body>
   </html>
   