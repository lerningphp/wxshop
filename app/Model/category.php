<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //分类model
    /**
     * @var string \
     * @content 指定数据表category
     */
    protected $table = 'category';
    /**
     * 定义表的主键id为  cate_id.
     *
     * @var bool
     */
    protected $primaryKey = 'cate_id';
    /**
     * 自定义时间戳的字段名
     */
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}
