<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 19/02/2018
 * Time: 00:39
 */

namespace App\Helpers;


use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DBHelper
{
    public static function insertLog($description, $userId, $user_type)
    {
        $a = array();
        $a['created_at'] = date('Y-m-d H:i:s');
        $a['ip_address'] = Request::capture()->server('REMOTE_ADDR');
        $a['user-agent'] = Request::capture()->server('HTTP_USER_AGENT');
        $a['url'] = Request::capture()->url();
        $a['description'] = $description;
        $a['user_id'] = $userId;
        $a['user_type'] = $user_type;
        DB::table('users_logs')->insert($a);
    }

    public static function parseSqlTable($table) {
        $f = explode('.', $table);
        if(count($f) == 1) {
            return array("table"=>$f[0], "database"=>'');
        } elseif(count($f) == 2) {
            return array("database"=>$f[0], "table"=>$f[1]);
        }elseif (count($f) == 3) {
            return array("table"=>$f[0],"schema"=>$f[1],"table"=>$f[2]);
        }
        return false;
    }

    public static function first($table,$id) {
        $table = self::parseSqlTable($table)['table'];
        if(is_int($id)) {
            return DB::table($table)->where('id',$id)->first();
        }elseif (is_array($id)) {
            $first = DB::table($table);
            foreach($id as $k=>$v) {
                $first->where($k,$v);
            }
            return $first->first();
        } else {
            return DB::table($table)->where('id',$id)->first();
        }
    }
    public static function all($table) {
        $table = self::parseSqlTable($table)['table'];
        return DB::table($table)->get();
    }
    public static function allWhere($table, $id) {
        $table = self::parseSqlTable($table)['table'];
        $table = DB::table($table);
        foreach($id as $k=>$v) {
            $table->where($k,$v);
        }
        return $table->get();
    }
    public static function allWhereForToday($table, $id) {
        $table = self::parseSqlTable($table)['table'];
        $table = DB::table($table);
        foreach($id as $k=>$v) {
            $table->where($k,$v);
        }
        $table->where('created_at', '>=', Carbon::today());
        return $table->get();
    }
    public static function delete($table,$id) {
        $table = self::parseSqlTable($table)['table'];
        if(is_int($id)) {
            return DB::table($table)->where('id',$id)->delete();
        }elseif (is_array($id)) {
            $first = DB::table($table);
            foreach($id as $k=>$v) {
                $first->where($k,$v);
            }
            return $first->delete();
        }
    }
    public static function insertToTable($table,$data=[]) {

        $id = DB::table($table)->max('id') + 1;
        $exist = DB::table($table)->where('id', $id)->first();
        if ($exist) {
            $id = $id+1;
        }
        $data['id'] = $id;
        if(!isset($data['created_at'])) {
            if(Schema::hasColumn($table,'created_at')) {
                $data['created_at'] = date('Y-m-d H:i:s');
            }
        }
        try {
            return DB::table($table)->insert($data);
        } catch (QueryException $exception) {
            $data['id'] = $data['id']+1;
            return DB::table($table)->insert($data);
        }
    }
    public static function updateRecord($table, $id, $data=[]) {
        if(!isset($data['updated_at'])) {
            if(Schema::hasColumn($table,'updated_at')) {
                $data['updated_at'] = Carbon::now();
            }
        }
        if(is_int($id)) {
            $record_updated = DB::table($table)->where('id',$id)->update($data);
            if($record_updated) return true;
            else return false;
        } else {
            $record_updated = DB::table($table);
            foreach($id as $k=>$v) {
                $record_updated->where($k,$v);
            }
            $record_updated->update($data);
            if($record_updated) return true;
            else return false;
        }
    }
    public static function allWithOrderAndLimit($table, $column, $limit) {
        $table = self::parseSqlTable($table)['table'];
        return DB::table($table)->orderBy($column, 'asc')->limit($limit)->get();
    }
}