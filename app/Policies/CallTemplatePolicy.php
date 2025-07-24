<?php

namespace App\Policies;

use App\Models\CallTemplate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CallTemplatePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, CallTemplate $template): bool
    {
        return $user->is_admin &&  $user->company_id === $template->company_id;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, CallTemplate $template): bool
    {
        return $user->is_admin && $user->company_id === $template->company_id;

    }

    public function delete(User $user, CallTemplate $template): bool
    {
        return $user->is_admin && $user->company_id === $template->company_id;
    }
}
