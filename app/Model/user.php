<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    /**
     * @var string \
     * @content 指定数据表user
     */
    protected $table = 'user';
    /**
     * 定义表的主键id为  user_id.
     *
     * @var bool
     */
    protected $primaryKey = 'user_id';
    /**
     * 自定义时间戳的字段名
     */
    public $timestamps = false;
}
