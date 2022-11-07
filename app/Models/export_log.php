<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class export_log extends Model
{
    protected $table = 'export_log';
    // 定义主键
    protected $primaryKey = 'id';
    // 设置不允许写入的数据字段
    protected $guarded = [];
    // 定义禁止操作时间
    public $timestamps = false;

    //模型序列化：Date 类型转换
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];
}
