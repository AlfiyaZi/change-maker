# ChangeMaker

Changemaker is an authentication system for Points of Light and affiliated applications. The service verifies identities and helps third party services keep track of volunteer activities across various properties. It is intended to be a single-sign-on service for Points of Light.

Changemaker is a fully functional OAuth2 server using [Laravel Passport](https://laravel.com/docs/5.3/passport). For full documentation on the server, please refer to the passport documentation and [the League's OAuth2.0 Server](https://oauth2.thephpleague.com). 

In order to install a development environment for this code, it's best to use either [Laravel Valet](https://laravel.com/docs/5.3/valet) or [Laravel Homestead](https://laravel.com/docs/5.3/homestead). Once your development environment is set up, create a .env file containing your database information, and then run:

```php artisan passport:install```
```php artisan migrate```

Once a token has been granted, token holders have access to the following API methods:

## User Details

### get /api/user
Returns details of the user who is providing the token. Should expect back a name, email, phone, avatar, and ID.

### post /api/user/{user}
Updates the user, if you have permission to update the user. User fields include: name(string), email(string), phone(string), avatar(string) and location. All strings.

### post /api/{user}/action
Creates a new action associated with the user. Actions consist of a name(string), description(string), a duration (in minutes, integer), and a type (string). 

##Organizations

Users may create organizations in the system. Organizations can be created by authorized users, and updated by the users that created them. Organizations may be followed or unfollowed by any authenticated user. 

### get /api/organization

Gets a list of all the organizations.

### get 'api/organization/{organization}'
Gets details of a particular organization by organization ID.

### post 'api/organization'
Creates a new organization. 

#### String fields (bold means required):
* *name* (must be unique)
* ein (9 digits, no dashes, must be unique)
* avatar (url) 
* address
* city
* region
* postalCode
* country
* phone
* organizationURL (url)
* donateURL (url)

#### Text fields (bold means required): 
* *description* 
* missionStatement

### post 'api/organization/{organization}'
Updates the organization. See fields above.

### delete 'api/organization/{organization}'
Deletes the organization.

### post 'api/organization/follow'
Follows the organization on behalf of the authorized user

### post 'api/organization/unfollow'
Unfollows the organization on behalf of the authorized user

## post '/api/user/{id}/addfacebook'
Add a facebook ID to the user account. Post { "facebook_id": "XXXXXXXXX"} 

## post 'api/user/{id}/find_friends'
Post an array of friend ids from facebook to look for matches in the database. Returns a list of matches.
['XXXXXXXXX','XXXXXXXXX','XXXXXXXXX','XXXXXXXXX']

