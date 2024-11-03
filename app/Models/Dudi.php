<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dudi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName() { //routeModelBindings
      return 'idt';
    }

    public function kerjasama(){
      return $this->hasMany(Kerjasama::class);
    }

    public function admin(){
      return $this->hasMany(Admin::class);
    }

    public function loker(){
      return $this->hasMany(Loker::class);
    }

    // HELPER
    public function scopeNotdelete($query){
      return $query->where('is_delete', false);
    }

    public function deleteData() {
      if ($this->kerjasama->count() >= 1) Kerjasama::where('dudi_id', $this->id)->delete();
      if ($this->has('loker') || $this->has('admin')) {
        return $this->update([
          'is_delete' => true,
        ]);
      } else {
        return $this->delete();
      }
    }
}
