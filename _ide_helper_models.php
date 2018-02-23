<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $api_token
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FooterBtn
 *
 * @property int $id
 * @property int $parent_id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $path
 * @property int|null $sort
 * @property int $is_active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\FooterBtn $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FooterBtn whereUpdatedAt($value)
 */
	class FooterBtn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NavbarBtn
 *
 * @property int $id
 * @property int $parent_id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $path
 * @property int|null $sort
 * @property int $is_rounded
 * @property int $is_active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\NavbarBtn $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereIsRounded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NavbarBtn whereUpdatedAt($value)
 */
	class NavbarBtn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Setting.
 *
 * @property int $id
 * @property string $key
 * @property string $name
 * @property string|null $description
 * @property string|null $value
 * @property string $field
 * @property int $active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SideMenuItem
 *
 * @property int $id
 * @property int|null $section_id
 * @property int $parent_id
 * @property string|null $name
 * @property string|null $path
 * @property string|null $icon
 * @property int|null $sort
 * @property int $is_active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\SideMenuItem $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read \App\Models\SideMenuSection|null $section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuItem whereUpdatedAt($value)
 */
	class SideMenuItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SideMenuSection
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $sort
 * @property int $is_active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SideMenuItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuSection whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuSection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuSection whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SideMenuSection whereUpdatedAt($value)
 */
	class SideMenuSection extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $api_token
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

