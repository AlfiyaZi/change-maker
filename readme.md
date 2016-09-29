# ChangeMaker

Changemaker is an authentication system for Points of Light and affiliated applications. The service verifies identities and helps third party services keep track of volunteer activities across various properties. It is intended to be a single-sign-on service for Points of Light.

Changemaker is a fully functional OAuth2 server using [Laravel Passport](https://laravel.com/docs/5.3/passport]. Once a token has been granted, token holders have access to the following API methods:

## get /api/user
Returns details of the user who is providing the token.

## post /api/user/{user}
Updates the user. User fields include: name, email, phone, avatar and location. All strings.

## post /api/{user}/action
Creates a new action associated with the user. Actions consist of a name, description, a duration (in minutes), and a type. 

