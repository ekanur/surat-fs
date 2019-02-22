<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;
    protected $guard = 'mahasiswa';
    protected $table = "mahasiswa";
    // 'sastra_indonesia','sastra_inggris','sastra_arab','sastra_jerman','seni_desain'
    public $array_jurusan = ["sastra_indonesia" => "Sastra Indonesia", "sastra_inggris" => "Sastra Inggris", "sastra_arab" => "Sastra Arab", "sastra_jerman" => "Sastra Jerman", "seni_desain" => "Seni dan Desain"];

// 'pind','sind','d3_perpus','s1_perpus','ping','sing','arab','jerman','mandarin','psr','pstm','dkv','game_animasi'
    public $array_prodi = ["pind" => "S1 Pend. Bahasa, Sastra Indonesia dan Daerah", "sind" => "S1 Bahasa dan Sastra Indonesia", "d3_perpus" => "D3 Perpustakaan", "s1_perpus" => "S1 Ilmu Perpustakaan", "ping" => "S1 Pendidikan Bahasa Inggris", "sing" => "S1 Bahasa dan Sastra Inggris", "arab" => "S1 Pendidikan Bahasa Arab", "jerman" => "S1 Pendidikan Bahasa Jerman", "mandarin" => "S1 Pendidikan Bahasa Mandarin", "psr" => "S1 Pendidikan Seni Rupa", "pstm" => "S1 Pendidikan Seni Tari dan Musik", "dkv" => "S1 Desain Komunikasi Visual", "game_animasi" => "D3 Game Animasi"];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'nama', 'jurusan', 'password', 'prodi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function getJurusanAttribute($value){
        return $this->array_jurusan[$value];
    }

    function getProdiAttribute($value){
        return $this->array_prodi[$value];
    }
}
