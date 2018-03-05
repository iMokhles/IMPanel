<?php

namespace App\Models;

use App\Helpers\CrudHelper;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class StatisticsSection extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'statistics_sections';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'statistics_page_id',
        'name',
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
    public function getActiveStatus() {
        return CrudHelper::getBooleanBadge($this->id, $this->table, 'is_active');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function page() {
        return $this->belongsTo(StatisticsPage::class, 'statistics_page_id', 'id');
    }
    public function roles() {
        return $this->belongsToMany(Role::class, 'roles_'.$this->table, 'statistics_section_id');
    }
    public function widgets() {
        return $this->hasMany(StatisticsWidget::class, "statistics_section_id");
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
