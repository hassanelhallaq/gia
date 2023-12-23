<?php



namespace App\Http\Controllers;



use App\Models\Admin;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;



class AdminController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */


    public function admin_xlsx(Request $request, Admin $admin)
    {

        $admin = Admin::with('user')->get();

        foreach ($admin as $admins) {

            // $enc = Crypt::decrypt($admins->password);

            $data[] = [
                'first_name' => $admins->user->first_name ?? null,
                'last_name' => $admins->user->last_name ?? null,
                'email' => $admins->email  ?? null,
                'password' => $admins->password  ?? null,
                'status' => $admins->status ?? null,
                'created_at' => $admins->created_at->format('d/m/Y') ?? null,
                'deleted_at' => $admins->deleted_at ?? null,
                'mobile' => $admins->user->mobile ?? null,
                'gender' => $admins->user->gender ?? null,
                'birth_date' => $admins->user->birth_date ?? null,

            ];
        }
        if (empty($data))
            return back();
        $list = collect($data);
        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('file.xlsx');
    }




    public function index(Request $request, Admin $admins)

    {

        //
        // if (ControllersService::checkPermission('index-admin', 'admin')) {




                 if ($request->get('search')) {
                    $admins = Admin::where('email', 'like', '%' . $request->search . '%');
                }
                if ($request->get('Status') != '') {
                    $admins = Admin::wwhere('status', $request->get('Status'));
                }
                $admins = Admin::paginate(10);
                return response()->view('dashboard.admin.index', compact('admins'));


    // } else {
    //         return response()->view('error-6');

    //     }
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        // if (ControllersService::checkPermission('create-admin', 'admin')) {

        $roles = Role::where('guard_name', 'admin')->get();

        return response()->view('dashboard.admin.create', compact('roles'));

        // } else {
        //     return response()->view('error-6');
        // }
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

        $validator = Validator($request->all(), [

            'role_id' => 'required|numeric|exists:roles,id',
            'name' => 'required|string|min:3|max:35',
            'job' => 'required|string|min:3|max:35',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string',
        ]);



        if (!$validator->fails()) {

            $admin = new Admin();
            $admin->email = $request->get('email');
            $admin->job = $request->get('job');
            $admin->password = Hash::make($request->get('password'));
            $admin->name = $request->get('name');
            $admin->phone = $request->get('phone');
            $isSaved = $admin->save();
            if ($isSaved) {
                $role = Role::findById($request->get('role_id'));
                $admin->assignRole($role->id);
                return response()->json(['icon' => 'success', 'title' => 'admin created successfully'], $isSaved ? 201 : 400);
            } else {

                return response()->json(['message' => "Failed to save"], 400);
            }
        } else {

            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\Admin  $admin

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //




    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Models\Admin  $admin

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        //

        // if (ControllersService::checkPermission('edit-admin', 'admin')) {

            $admin = Admin::findOrFail($id);

            $roles = Role::where('guard_name', 'admin')->get();

        //     return response()->view('dashboard.admins.edit', compact('admin','roles'));
        // }
        // else {
        //     return response()->view('error-6');
        // }



    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\Admin  $admin

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        //
        $validator = Validator($request->all(), [

            'name' => 'string|min:3|max:35',
            'phone' => 'numeric',
            // 'email' => 'email|unique:admins,email',
            'password' => 'string',
            // 'image' => 'required|image|max:2048|mimes:png,jpg,jpeg',

        ]);



        if (!$validator->fails()) {

            $admin = Admin::findOrFail($id);
            $admin->email = $request->get('email');
            $admin->phone = $request->get('phone');
            $isSaved = $admin->save();
                if ($isSaved) {
                    return ['redirect' => route('admins.index')];
                    // return response()->json(['icon' => 'success', 'title' => 'admin updated successfully'], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => 'admin updated failed'], 400);
                }


        }



    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\Admin  $admin

     * @return \Illuminate\Http\Response

     */

    public function destroy(Admin $admin)

    {

        if (ControllersService::checkPermission('delete-admin', 'admin')) {

        if ($admin->id == Auth::id()) {
            return redirect()->route('admins.index')
                ->withErrors(trans('cannot delete yourself'));
        } else {
            $admin->user()->delete();
            $isDeleted = $admin->delete();
            return response()->json(['icon' => 'success', 'title' => 'Admin Deleted successfully'], $isDeleted ? 200 : 400);
        }

    } else {
            return response()->view('error-6');

        }
    }

    public function destroyAll(Request $request,Admin $admin)

    {


        // if (ControllersService::checkPermission('delete-admin', 'admin')) {

            if ($admin->id == Auth::id()) {
                return redirect()->route('admins.index')
                ->withErrors(trans('cannot delete yourself'));
            } else {
            $ids = $request->ids;
            $admin->whereIn('id', explode(",", $ids))->delete();
            return response()->json(['success' => "Admin Deleted successfully."]);
            }
        // } else {
        //     return response()->view('error-6');
        // }
    }

    public function deacitveAll(Request $request, Admin $admin)

    {


        // if (ControllersService::checkPermission('delete-admin', 'admin')) {


            $ids = $request->ids;
           $admins = $admin->whereIn('id', explode(",", $ids))->get();
            foreach($admins as $admin){
                $admin->status = 'deactive';
                $admin->save();
            }
            return response()->json(['success' => "Admin Dective successfully."]);

        // } else {
        //     return response()->view('error-6');
        // }
    }
    public function activeAll(Request $request, Admin $admin)

    {


        // if (ControllersService::checkPermission('delete-admin', 'admin')) {


        $ids = $request->ids;
        $admins = $admin->whereIn('id', explode(",", $ids))->get();
        foreach ($admins as $admin) {
            $admin->status = 'active';
            $admin->save();
        }
        return response()->json(['success' => "Admin Active successfully."]);

        // } else {
        //     return response()->view('error-6');
        // }
    }


    public function editPassword($id)

    {

        $admin = Admin::findOrFail($id);

        return response()->view('dashboard.admins.edit-password', compact('id','admin'));
    }


    public function updatePassword(Request $request, $id)

    {

        $validator = Validator($request->all(), [

        ]);


        if (!$validator->fails()) {

            $admin = Admin::find($id);

            $admin->password = Hash::make($request->get('password'));

            $isSaved = $admin->save();

            if ($isSaved) {
                return ['redirect' => route('admins.index')];

                return response()->json(['icon' => 'success', 'title' => 'password updated successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'password updated failed'], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }
}
