# Catholic Social Teaching Database (cst_db)

## About

This is a prototype system for ND CS4GOOD CST Database project.

## Prerequisites

1. Ensure that PHP is installed.

2. Ensure that Apache HTTP Server is installed.

3. Ensure that MySQL is installed and properly configured with the usernames/passwords in the PHP.

    * Ensure that the database is constructed using the SQL file.  This can be done easily in MySQL Workbench, the GUI tool for MySQL:
    
        3.1. Enter your local instance.
        
        3.2. Under "Server", click "Data Import".  Alternatively, under the "Management" tab, click "Data Import/Restore".
        
        3.3. Choose "Import from Self-Contained File" and enter the path to the SQL file in this repository.
        
        3.4. Start the import.
        
## Database Structure

The structure is simple; you should have just four tables:

1. `themes`: holds the seven CST themes.
    
    * There should always be seven and only seven CST themes to choose from.
    
    * The **primary key** is the `theme_id`.
    
2. `quotes`: holds the quotes that correspond to a theme.
    
    * The quotes are chosen by Prof. Sedmak.  Many quotes can apply to each theme.  The same quote can also apply to different themes.
    
    * The **primary key** is the `quote_id`.
    
    * The *foreign key* is the `theme_id`.  This points at a theme.  To have the same quote applying to a second theme, simply duplicate the quote, give it a new `quote_id`, and give the foreign key `theme_id` the proper value.
    
3. `experiences`: holds the experiences that correspond to a quote.
    
    * The experiences are written by students.  Many experiences can apply to a quote, but never to multiple quotes simultaneously.
    
    * The **primary key** is the `exp_id`.
    
    * The *foreign key* is the `quote_id`.  This points at a quote.
    
4. `users`: should hold valid users.  It's a work in progress, see **TODO** below.
        
## Running and Behavior

* Run the system locally with `php -S localhost:<port>`.  I always forget this command, so it is included in the script `start.sh`.

* The system should automatically land on `index.html`.

    * This displays the seven CST "themes". Clicking on any CST "theme" results in ...

    * ... Relevant "quotes" for the theme, as chosen by Prof. Sedmak.  This is controlled by `theme.php`.  Clicking on any "quote" results in ...
    
    * ... Relevant student experiences for the quote.  This is controlled by `quote.php`.

* Note that keys are passed through the URL corresponding to theme and quote.  These identify which quote and experience to query the database for.

## TODO

* At the bottom of the home screen, there is a link that leads to a login page (`login/login.php`).  This is a currently broken feature.  The goal of this feature is to lead authorized users to an interactive page for adding entries, editing entries, and adding new users.

    * It should query the `users` table for user authentication.
    
* The main purpose of this page should be to provide the user an easy interface for adding or editing entries.

    * There should always be seven and only seven CST themes to choose from.
    
    * The quotes are chosen by Prof. Sedmak.  Many quotes can apply to each theme.  The same quote can also apply to different themes.
    
    * The experiences are written by students.  Many experiences can apply to a quote, but never to multiple quotes simultaneously.
    
    * Ideally, the user should be able to edit old entries and make new ones, inserting data directly into the database.  This needs to be an operation performed only by proper users (i.e. Prof. Sedmak).
    
## Contact Me

If you have any questions or issues (or want to vent your frustrations at any aspect of the project), feel free to email Eric at elayne@nd.edu with the subject line "CST-DB-CS4GOOD-ND".

