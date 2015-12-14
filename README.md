#PHP MVC Template
#Version 1.0

This is a little MVC template.
Basic but usable for learning MVC design pattern or little websites.

What's in ?

- "core" repository : containing global Model class, global Controller class and global configuration of the app. Model.php and Controller.php contains only basics and needed methods. You can create others to adapt to your project.
- "models" repo : containing Model classes (in the example : Animes)
- "controllers" repo : containing the main controller "Index.php" with only 2 actions. You can create the others actions to have a full REST app.
- "views" repo : wich contains repos corresponding to the controllers and files corresponding to the controllers actions. And a default layout.

The core repo, .htaccess and index.php (first one, wich is the bootstrap file) are good for a basic app.

The example is working with a basic database : "myanimes" ; table : "ANIMES" ; columns : "ID", "title", "rate", "tags", "description".
You can get these informations on the Animes.php (model).

For more information, you can contact me at antoine.bachelier95@gmail.com
For issues, use the issue tab on GitHub
