<?php

namespace App\Models;

use App\Helpers\CrudHelper;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\DB;

class SideMenuItem extends Model
{
    use CrudTrait;
     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'sidemenu_items';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'section_id',
        'parent_id',
        'role_id',
        'name',
        'type',
        'path',
        'icon',
        'sort',
        'is_active'
    ];
    protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getIcon() {
        return CrudHelper::getIconBadge($this->id, $this->table, 'icon');
    }
    public function getActiveStatus() {
        return CrudHelper::getBooleanBadge($this->id, $this->table, 'is_active');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function section() {
        return $this->belongsTo(SideMenuSection::class, 'section_id', 'id');
    }
    public function parent() {
        return $this->belongsTo(SideMenuItem::class, 'parent_id', 'id');
    }
    public function roles() {
        return $this->belongsToMany(Role::class, 'roles_'.$this->table, 'sidemenu_item_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
