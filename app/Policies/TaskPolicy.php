<?php

namespace App\Policies;

use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * check current user is owner of task
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function owner(User $user, Task $task){
        return $user->id === $task->user_id;
    }
}
