<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class order_address extends Model
{
    /**
     * @var string \
     * @content 指定数据表order_address
     */
    protected $table = 'order_address';
    /**
     * 定义表的主键id为  id.
     *
     * @var bool
     */
    protected $primaryKey = 'id';
    /**
     * 自定义时间戳的字段名
     */
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}
