<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
     /**
     * فقط ادمین‌های اصلی حذف نشن.
     */
   /**
     * کاربر لاگین شده می‌تونه کاربر هدف رو حذف کنه یا نه؟
     */
    public function delete(User $authUser, User $targetUser): bool
    {
        // جلوگیری از حذف خودش
        if ($authUser->id === $targetUser->id) {
            return false;
        }

        // هیچکس حق حذف سوپر ادمین رو نداره
        if ($targetUser->hasRole('super_admin')) {
            return false;
        }

        // فقط سوپر ادمین می‌تونه ادمین رو حذف کنه
        if ($targetUser->hasRole('admin') && !$authUser->hasRole('super_admin')) {
            return false;
        }

        // به طور پیش‌فرض: اگر کاربر لاگین شده ادمین باشه، می‌تونه بقیه رو حذف کنه
        return $authUser->hasRole('admin') || $authUser->hasRole('super_admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
