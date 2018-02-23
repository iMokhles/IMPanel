<?php

namespace App\Models;

use App\Helpers\CrudHelper;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class FooterBtn extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'footer_btns';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'parent_id',
        'name',
        'icon',
        'path',
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
    public function parent() {
        return $this->belongsTo(FooterBtn::class, 'parent_id', 'id');
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
