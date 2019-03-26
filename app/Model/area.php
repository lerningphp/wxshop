<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    /**
     * @var string \
     * @content 指定数据表area
     */
    protected $table = 'area';
    /**
     * 定义表的主键id为  id.
     *
     * @var bool
     */
    protected $primaryKey = 'id';
    /**
     * 自定义时间戳的字段名
     */
    public $timestamps = false;
}
