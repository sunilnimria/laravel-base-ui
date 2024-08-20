<?php

declare(strict_types=1);

namespace App\Traits;

use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Auth\Authenticatable;

trait AuthorizationChecker
{
    /**
     * Check if the user is authorized to perform the action.
     *
     * @param Authenticatable $user
     * @param array|string $permissions
     * @return void
     */
    public function checkAuthorization($user, $permissions): void
    {
        if (is_null($user) || !$user->can($permissions)) {
            abort(403, 'Sorry !! You are unauthorized to perform this action.');
        }
    }
    public function only(): array
    {
        return [
            function (Request $request, Closure $next) {
                return $next($request);
            },
        ];
    }
}
