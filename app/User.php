<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class User extends Model
{
//	
	use Sortable;
	public $timestamps = false;
	public $sortable = ['id', 'name', 'email', 'created_at'];
}
