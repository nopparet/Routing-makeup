<?php //ตัวควบคุมข้อมูล ส่วนไหนที่เกี่ยวข้องกัน

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChirpPolicy
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
    public function view(User $user, Chirp $chirp): bool
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
    public function update(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user); //เรียกใช้ความสัมพันธ์ (relationship) ระหว่าง Chirp และ User
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chirp $chirp): bool
    {
        return $this->update($user, $chirp);// ผู้ใช้มีสิทธิ์ทำการอัปเดต
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chirp $chirp): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chirp $chirp): bool
    {
        return false;
    }
}
