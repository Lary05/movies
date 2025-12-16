<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function __construct()
    {
        // Minden módosító művelethez kérünk hitelesítést; lekérés publikus lehet ha akarod.
        $this->middleware('auth:sanctum')->except(['index']);
    }

    /**
     * GET /users/{id}/roles
     * Visszaadja a felhasználó szerepköreit
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['roles' => $user->roles], 200);
    }

    /**
     * POST /users/{id}/roles
     * Hozzárendel egy szerepkört a felhasználóhoz (role_id kell a request-ben)
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $roleId = (int) $request->input('role_id');

        // Ha már hozzá van rendelve, jelezzük — nem dobunk duplikátumot.
        if ($user->roles()->where('role_id', $roleId)->exists()) {
            return response()->json(['message' => 'Role already attached'], 200);
        }

        $user->roles()->attach($roleId);

        return response()->json(['message' => 'Role attached', 'role_id' => $roleId], 201);
    }

    /**
     * DELETE /users/{id}/roles/{roleId}
     * Leválaszt egy szerepkört a felhasználóról
     */
    public function destroy($id, $roleId)
    {
        $user = User::findOrFail($id);

        if (! $user->roles()->where('role_id', $roleId)->exists()) {
            return response()->json(['message' => 'Role not attached'], 404);
        }

        $user->roles()->detach($roleId);

        return response()->json(['message' => 'Role detached'], 200);
    }

    /**
     * PUT /users/{id}/roles
     * Szinkronizálja a felhasználó szerepköreit (role_ids tömb a request-ben)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_ids' => 'required|array',
            'role_ids.*' => 'integer|exists:roles,id',
        ]);

        $user = User::findOrFail($id);

        // sync: a megadott role_id-k maradnak, a többit eltávolítja
        $user->roles()->sync($request->input('role_ids'));

        return response()->json(['message' => 'Roles synced', 'roles' => $user->roles], 200);
    }
}
