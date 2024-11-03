<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function dudi(){
      return $this->belongsTo(Dudi::class);
    }

    public function loker(){
      return $this->hasMany(Loker::class);
    }

    public function postingan(){
      return $this->hasMany(Postingan::class);
    }

    // HELPER
    public function scopeNotdelete($query){
      return $query->where('is_delete', false);
    }

    public function scopeIsdelete($query){
      return $query->where('is_delete', true);
    }

    public function deleteData() {
      if ($this->has('postingan') || $this->has('loker')) {
        return $this->update([
          'is_delete' => true,
        ]);
      } else {
        return $this->delete();
      }
    }
}
