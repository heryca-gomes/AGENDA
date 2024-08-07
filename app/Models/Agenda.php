<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'servidor_id',
        'aluno_id',
        'data',
        'horario',
        'status'
    ];
    
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
    
    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidor_id');
    }
    
    public function getDataAttribute()
    {
        return date('d/m', strtotime($this->attributes['data']));
    }
    
    public function getHorarioAttribute()
    {
        return date('H:i', strtotime($this->attributes['horario']));
    }
}
