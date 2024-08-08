<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'servidor_id',
        'aluno_id',
        'observacao',
        'terapia',
        'medicacao',
    ];

    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidor_id');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
}
