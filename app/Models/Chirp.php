<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    protected $fillable = [ //ถ้าไม่ใส่จะอินเสิร์ชไม่ได้
        'message', //เราสามารถอินพูชใส่มาในคอลัมได้บ้าง แต่ในนี้ห้ามยุ่ง
    ];
    public function user(): BelongsTo //ข้อความอยู่ของใครของมัน
    {
        return $this->belongsTo(User::class);
    }
}
