<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    /**
     * @var string \
     * @content 指定数据表book
     */
    protected $table = 'goods';
    /**
     * 定义表的主键id为  goods_id.
     *
     * @var bool
     */
    protected $primaryKey = 'goods_id';
    /**
     * 自定义时间戳的字段名
     */
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}
