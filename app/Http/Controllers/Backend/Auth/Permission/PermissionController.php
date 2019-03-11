<?php

namespace App\Http\Controllers\backend\auth\permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role;
use App\Models\Auth\Permissions;

use App\Events\Backend\Auth\Role\RoleDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Auth\Role\ManageRoleRequest;
use App\Http\Requests\Backend\Auth\Role\UpdateRoleRequest;

use App\Http\Requests\Backend\Auth\Permission\StorePermissionRequest;

class PermissionController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $items = [];
        $permissions = $this->permissionRepository->get();

        if($permissions->count() > 0){
            foreach ($permissions as $permission) {
                $items[] = [
                    'id' => $permission->id,
                    'permission' => $permission->name,
                    'role' => $this->permissionRepository->getRole($permission->id)
                ];
            }
        }   

        return view('backend.auth.permission.index')->withPermissions( $items );

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $this->permissionRepository->create($request->only('name'));
        return redirect()->route('admin.auth.permission.index')->withFlashSuccess('The permission was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Permissions = Permissions::find($id);
 
        return view('backend.auth.permission.edit')->withPermissions($Permissions);
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePermissionRequest $request, $id)
    {
        $Permissions = Permissions::find($id);
        $Permissions->name = $request->name;
        $Permissions->save();

        return redirect()->route('admin.auth.permission.index')->withFlashSuccess('Permission has ben updateds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
