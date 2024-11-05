## Dependancy Injection

## To create a new provider

php artisan make:provider PaymentGatewayProvider

## To resolve autoloading issues

composer dump-autoload

Generating optimized autoload files
Class CustomFacade located in ./app/Facades/CustomFacade.php does not comply with psr-4 autoloading standard (rule: App\ => ./app). Skipping. -> namespace was not definied in the Facade

## Traits

We can share methods with multiple classes without the need for multiple inheritance which is not possible in php - reduces code duplication

## To create custom artisan commands

php artisan make:command GreetCommand

## Middleware

-   Laravel provides a convinient mechanism to inspect and filter the HTTP requests that enters into application

-   php artisan make:middleware TestMiddleware

## HTTP Session

-   We store information in session variables to be used across multiple pages - Laravel uses file based session storage - stored on server

-   Session_driver and session_lifetime can be edited from either .env file or from session.php config file

## Laravel Caching

-   To optimise application performance
-   Scope : Cache is globally available to all users - they dont need to login
-   Session on the other hand, is specific to a user's session and the data is only available to that user
-   Accessibility - Cache can be accessed from anywhere in the application ,
-   while session data is only available to the user's session
-   Performance - Cache is generally faster that session because it is stored in memory or cache store, which are faster for retrieval than database queries.
-   php artisan cache:clear - To clear application cache

## Authentication

-   It is basically verifying the identity of the user - involves validating user name and password against a database of validated credentials

## Authorization

-   Is the process of granting or denying access to resource or action based on the permission of the authenticated users

## Queues and Background Processing

-   Defer the process of a time consuming tasks such as sending an email, it offloads a long running task to background process

-   php artisan queue:table - creates a migration file for creating a database table in mysql and migrate the created file
-   php artisan make:job SendMail - to create a job inside app folder
-   php artisan make:mail PostPublished - populate the 'to' address and the email contents that needs to be sent out
-   php artisan queue:work - start the laravel queue worker - so that the jobs stored in the DB will be processed

## Laravel Scheduler

-   php artisan schedule:run - to run our scheduler

## Model Observers

-   Observers allow to listen for events on our models and take actions when those events are triggered
