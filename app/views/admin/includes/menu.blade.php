<a href="/admin">Dashboard</a> | <a href="/admin/genre/create">Create Genre</a> | 

@if (App::environment('local'))
<a href="javascript:(function(e)%7Bif(e.myDudelet!%3D%3Dundefined)%7BmyDudelet()%3B%7Delse%7Be.document.body.appendChild(e.document.createElement(%27script%27)).src%3D%27http%3A%2F%2Fdude.app%3A8000%2Fdudeletdev.js%3F%27%3B%7D%7D)(window)%3B">Dude</a>
@else
<a href="javascript:(function(e)%7Bif(e.myDudelet!%3D%3Dundefined)%7BmyDudelet()%3B%7Delse%7Be.document.body.appendChild(e.document.createElement(%27script%27)).src%3D%27http%3A%2F%2Fdudedb.com%2Fdudelet.js%3F%27%3B%7D%7D)(window)%3B">Dude</a>
@endif
 || <a href="/">Web</a>
