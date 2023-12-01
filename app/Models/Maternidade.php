<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Maternidade extends Model
{
  //use HasFactory;
  protected $table = "maternidades";

  protected $fillable = ['nome', 'categoria', 'valor'];

  public static function destroyRecord($id){
    $maternidade = self::find($id);

    if(!$maternidade)
      return false;
    
      $maternidade->delete();

      return true;
  }

  
}
