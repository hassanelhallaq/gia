<?php



namespace App\Http\Controllers;



use App\Models\Admin;

use App\Models\AdminProgram;
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
            // 'job' => 'required|string|min:3|max:35',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string',
        ]);



        if (!$validator->fails()) {



            $admin = new Admin();
            $admin->email = $request->get('email');
            $admin->english_name = $request->get('name_english');
            $admin->main_training_area = $request->get('main_training_area');
            $admin->nationality = $request->get('nationality');
            $admin->birthday = $request->get('birthday');
            $admin->academicـcertificate = $request->get('academicـcertificate');
            $admin->main_field_of_consulting = $request->get('main_field_of_consulting');
            $admin->accreditation = $request->get('accreditation');
            $admin->years_of_experience = $request->get('years_of_experience');

            if ($request->hasFile('cv')) {
                $adminImage = $request->file('cv');
                $imageName = time() . '_' . $request->get('cv') . '.' . $adminImage->getClientOriginalExtension();
                $adminImage->move('images/program', $imageName);
                $admin->cv = '/images/' . 'program' . '/' . $imageName;
            }
            if ($request->hasFile('pic')) {
                $adminImage = $request->file('pic');
                $imageName = time() . '_' . $request->get('pic') . '.' . $adminImage->getClientOriginalExtension();
                $adminImage->move('images/program', $imageName);
                $admin->cv = '/images/' . 'program' . '/' . $imageName;
            }
            if ($request->hasFile('accreditationـcertificate')) {
                $adminImage = $request->file('accreditationـcertificate');
                $imageName = time() . '_' . $request->get('pic') . '.' . $adminImage->getClientOriginalExtension();
                $adminImage->move('images/program', $imageName);
                $admin->accreditationـcertificate = '/images/' . 'program' . '/' . $imageName;
            }
            $admin->job = $request->get('job') == null ? 'job' : $request->get('job');
            $admin->password = Hash::make($request->get('password'));
            $admin->name = $request->get('name');
            $admin->phone = $request->get('phone');
            $isSaved = $admin->save();
            $id = $request->session()->get('program_id');
            if($id != null){
            $adminManger = new AdminProgram();
            $adminManger->admin_id = $admin->id ;
            $adminManger->program_id = $id ;
            $adminManger->type = $request->type ;
            $adminManger->save();
        }
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

    public function editMangment($id)
    {
        $admin = Admin::findOrFail($id);
        $adminManger =  AdminProgram::where('admin_id',$id)->first();

        return response()->view('dashboard.admin.edit-mangment', compact('admin','adminManger'));
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

    public function adminManger(Request $request)
    {
        $searchQuery = $request->input('manger_id');
        $id = $request->session()->get('program_id');
        $adminManger = new AdminProgram();
        $adminManger->admin_id = $searchQuery ;
        $adminManger->program_id = $id ;
        $adminManger->type = $request->type;
        $adminManger->save();
        return response()->json(['icon' => 'success', 'title' => 'admin sucess '], 200);

    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $organizations = Admin::where('name', 'like', "%$searchQuery%")->get();

        return $organizations;
    }

    public function adminMangersel(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $id = $request->session()->get('program_id');
        $adminManger =  AdminProgram::where('program_id',$id)->where('type','manger')->first();
        $organizations = Admin::where('id',$adminManger->admin_id)->get();

        return response()->json($organizations);

    }

    public function mangersProjects(Request $request)
    {

        $adminManger =  AdminProgram::where('type','manger')->get();
        $admins = Admin::whereIn('id',$adminManger->pluck('admin_id'))->paginate(10);
        return response()->view('dashboard.admin.project-mangment', compact('admins'));

    }
    public function cordreatorProjects(Request $request)
    {
           $adminManger =  AdminProgram::where('type','cordreator')->get();
           $admins = Admin::whereIn('id',$adminManger->pluck('admin_id'))->paginate(10);
           return response()->view('dashboard.admin.project-mangment', compact('admins'));

    }
    public function cordTrainnerProjects(Request $request)
    {
        $adminManger =  AdminProgram::where('type','cord-trainner')->get();
        $admins = Admin::whereIn('id',$adminManger->pluck('admin_id'))->paginate(10);
        return response()->view('dashboard.admin.project-mangment', compact('admins'));

    }
    public function consultantsProjects(Request $request)
    {
        $adminManger =  AdminProgram::where('type','consultants')->get();
        $admins = Admin::whereIn('id',$adminManger->pluck('admin_id'))->paginate(10);
        return response()->view('dashboard.admin.project-mangment', compact('admins'));

    }
    public function admincordSelect(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $id = $request->session()->get('program_id');
        $adminManger =  AdminProgram::where('program_id',$id)->where('type','cordreator')->first();
        $organizations = Admin::where('id',$adminManger->admin_id)->get();

        return response()->json($organizations);

    }

    public function updateMangment(Request $request , $id)

    {

        //

        $validator = Validator($request->all(), [

            'role_id' => 'required|numeric|exists:roles,id',
            'name' => 'required|string|min:3|max:35',
            // 'job' => 'required|string|min:3|max:35',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string',
        ]);



        if (!$validator->fails()) {

            $admin =  Admin::find($id);
            $admin->email = $request->get('email');
            $admin->english_name = $request->get('name_english');
            $admin->main_training_area = $request->get('main_training_area');
            $admin->nationality = $request->get('nationality');
            $admin->birthday = $request->get('birthday');
            $admin->academicـcertificate = $request->get('academicـcertificate');
            $admin->main_field_of_consulting = $request->get('main_field_of_consulting');
            $admin->accreditation = $request->get('accreditation');
            $admin->years_of_experience = $request->get('years_of_experience');
            if ($request->hasFile('cv')) {
                $adminImage = $request->file('cv');
                $imageName = time() . '_' . $request->get('cv') . '.' . $adminImage->getClientOriginalExtension();
                $adminImage->move('images/program', $imageName);
                $admin->cv = '/images/' . 'program' . '/' . $imageName;
            }
            if ($request->hasFile('pic')) {
                $adminImage = $request->file('pic');
                $imageName = time() . '_' . $request->get('pic') . '.' . $adminImage->getClientOriginalExtension();
                $adminImage->move('images/program', $imageName);
                $admin->cv = '/images/' . 'program' . '/' . $imageName;
            }
            if ($request->hasFile('accreditationـcertificate')) {
                $adminImage = $request->file('accreditationـcertificate');
                $imageName = time() . '_' . $request->get('pic') . '.' . $adminImage->getClientOriginalExtension();
                $adminImage->move('images/program', $imageName);
                $admin->accreditationـcertificate = '/images/' . 'program' . '/' . $imageName;
            }
            $admin->job = $request->get('job') == null ? 'job' : $request->get('job');
            $admin->password = Hash::make($request->get('password'));
            $admin->name = $request->get('name');
            $admin->phone = $request->get('phone');
            $isSaved = $admin->save();
            $id = $request->session()->get('program_id');
            if($id != null){
            $adminManger = new AdminProgram();
            $adminManger->admin_id = $admin->id ;
            $adminManger->program_id = $id ;
            $adminManger->type = $request->type ;
            $adminManger->save();
        }
            if ($isSaved) {

                return response()->json(['icon' => 'success', 'title' => 'updated successfully'], $isSaved ? 201 : 400);
            } else {

                return response()->json(['message' => "Failed to save"], 400);
            }
        } else {

            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

}
