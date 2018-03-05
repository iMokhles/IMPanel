<?php

namespace App\Models;

use App\Helpers\CrudHelper;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class StatisticsWidget extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'statistics_widgets';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'statistics_section_id',
        'type',
        'size',
        'icon',
        'name',
        'sql',
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
        return $this->belongsTo(StatisticsSection::class, 'statistics_section_id', 'id');
    }
    public function roles() {
        return $this->belongsToMany(Role::class, 'roles_'.$this->table, 'statistics_widget_id');
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
