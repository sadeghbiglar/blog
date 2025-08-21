<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * تغییر نقش‌های کاربر هدف
     */
    public function updateRoles(User $authUser, User $targetUser): bool
    {
        // جلوگیری از تغییر نقش خودش
        if ($authUser->id === $targetUser->id) {
            return false;
        }

        // اگر کاربر لاگین شده admin باشه
        if ($authUser->hasRole('admin')) {
            // فقط می‌تونه نقش‌های کاربران معمولی رو تغییر بده
            if ($targetUser->hasRole('admin') || $targetUser->hasRole('super_admin')) {
                return false;
            }
            return true;
        }

        // super_admin می‌تونه همه رو تغییر بده به جز خودش
        if ($authUser->hasRole('super_admin')) {
            return $authUser->id !== $targetUser->id;
        }

        return false;
    }

    /**
     * آیا کاربر لاگین شده می‌تونه اطلاعات کاربر هدف رو ویرایش کنه؟
     */
    public function update(User $authUser, User $targetUser): bool
    {
        // جلوگیری از ویرایش خودش
        if ($authUser->id === $targetUser->id) {
            return false;
        }

        // admin نمی‌تونه admin یا super_admin دیگه‌ای رو ویرایش کنه
        if ($authUser->hasRole('admin')) {
            return !($targetUser->hasRole('admin') || $targetUser->hasRole('super_admin'));
        }

        // super_admin می‌تونه همه رو ویرایش کنه به جز خودش
        if ($authUser->hasRole('super_admin')) {
            return $authUser->id !== $targetUser->id;
        }

        return false;
    }

    /**
     * آیا کاربر لاگین شده می‌تونه کاربر هدف رو حذف کنه؟
     */
    public function delete(User $authUser, User $targetUser): bool
    {
        // جلوگیری از حذف خودش
        if ($authUser->id === $targetUser->id) {
            return false;
        }

        // هیچکس نمی‌تونه super_admin رو حذف کنه
        if ($targetUser->hasRole('super_admin')) {
            return false;
        }

        // فقط super_admin می‌تونه admin رو حذف کنه
        if ($targetUser->hasRole('admin')) {
            return $authUser->hasRole('super_admin');
        }

        // admin و super_admin می‌تونن کاربر عادی رو حذف کنن
        return $authUser->hasRole('admin') || $authUser->hasRole('super_admin');
    }

    /**
     * سایر دسترسی‌ها (برای سادگی همه false شدند)
     */
    public function viewAny(User $user): bool { return false; }
    public function view(User $user, User $model): bool { return false; }
    public function create(User $user): bool { return false; }
    public function restore(User $user, User $model): bool { return false; }
    public function forceDelete(User $user, User $model): bool { return false; }
}
