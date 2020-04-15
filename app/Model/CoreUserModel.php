<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CoreUserModel
 *
 * @property int $core_user_id
 * @property string $core_user_name
 * @property string $core_user_org
 * @property string $display_name
 * @property string $core_user_status NORMAL DISABLED
 * @property string|null $email
 * @property string|null $mobile
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereCoreUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereCoreUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereCoreUserOrg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereCoreUserStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoreUserModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CoreUserModel extends Model
{
    //
    protected $table = 'core_user';

    protected $primaryKey = 'core_user_id';
}
