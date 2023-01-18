# Models

Because this admin system is a 'satelite' to the main system, these models should be identical to the models in the main
system unless it is functionality specific to this admin panel.

## Differences

The only model that should be different here is the User model.

```php
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser

public function canAccessFilament(): bool
{
    $admin = ['ben@benmckay.com','fbeaman@hospitalexec.com'];
    return in_array($this->email, $admin);
}
```

## TODO

Would be great to have a script check these periodically to make sure they match for system integrity.
