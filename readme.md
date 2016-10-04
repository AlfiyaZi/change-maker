# ChangeMaker

Changemaker is an authentication system for Points of Light and affiliated applications. The service verifies identities and helps third party services keep track of volunteer activities across various properties. It is intended to be a single-sign-on service for Points of Light.

Changemaker is a fully functional OAuth2 server using [Laravel Passport](https://laravel.com/docs/5.3/passport]. Once a token has been granted, token holders have access to the following API methods:

## User Details

### get /api/user
Returns details of the user who is providing the token. Should expect back a name, email, phone, avatar, and ID.

### post /api/user/{user}
Updates the user, if you have permission to update the user. User fields include: name(string), email(string), phone(string), avatar(string) and location. All strings.

### post /api/{user}/action
Creates a new action associated with the user. Actions consist of a name(string), description(string), a duration (in minutes, integer), and a type (string). 

##Organizations

Users may create organizations in the system. Organizations can be created by authorized users, and updated by the users that created them. Organizations may be followed or unfollowed by any authenticated user. 

