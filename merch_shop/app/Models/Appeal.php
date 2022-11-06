<?php

namespace App\Models;

use App\Sanitizers\PhoneSanitizer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Appeal
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $phone
 * @property string|null $email
 * @property string $message
 * @property int|null $user_id
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\AppealFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal wherePhome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal wherePhone($value)
 */
class Appeal extends Model
{
    use HasFactory;
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function createFormRequest(array $requestData) : self {

        $appeal = new self();

        $appeal->name = $requestData['name'];
        $appeal->phone = PhoneSanitizer::sanitize($requestData['phone'] ?? null);
        $appeal->email = $requestData['email'] ?? null;;
        $appeal->message = $requestData['message'];
        $appeal->save();

        return $appeal;
    }
}
