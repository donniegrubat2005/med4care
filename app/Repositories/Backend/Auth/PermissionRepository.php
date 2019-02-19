<?php

namespace App\Repositories\Backend\Auth;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    public function getRole($id)
    {
        $role = DB::table('role_has_permissions')
            ->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
            ->where('permission_id', $id)->first([
                'name',
                'role_id'
            ]);
        return !is_null($role) ? $role->name: 'N/A';
    }

    public function create(array $data) : Permission
    {
        return DB::transaction(function () use ($data) {
            
            $permession = parent::create(['name' => strtolower($data['name']) , 'guard_name' => 'web'] );

            return  $permession;
        });
    }

    public function update(Permission $permission, array $data)
    {
        return DB::transaction(function () use ($permission, $data) {
            if ($permission->update(['name' => strtolower($data['name'])])) {

                // $role->syncPermissions($data['permissions']);

                // event(new RoleUpdated($role));

                return $permission;
            }

            // throw new GeneralException(trans('exceptions.backend.access.roles.update_error'));
        });
    }
    
}
