<?php

namespace App\Http\Traits\Settings;

use DB;
use Hash;
use Crypt;
use Session;
use Illuminate\Http\Request;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\ConnectionResolver;
use App\Http\Controllers\Modules\ModuleController;
use App\Http\Controllers\Common\WindowController as sideBar;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait UserSettingTrait
{

    public function settings_search_company_module($method, $id = null, $request)
    {

        return (new CommonService)->view_blade($method)
                    ->with('company_id', $request->company_id )
                    ->with('module', (new CommonService)->allActiveModule() )
                    ->with('companyModuleAccess' , $this->getCompanyModuleAccess($request->company_id) );

    }

    public function settings_search_users_company($method, $id = null, $request)
    {

        return (new CommonService)->view_blade($method)
                    ->with('users_id', $request->users_id )
                    ->with('company', (new CommonService)->allActiveCompany() )
                    ->with('companyAccess' , $this->getCompanyAccess($request->users_id) );

    }

    public function settings_search_users_module($method, $id, $request) {
    
        return (new CommonService)->view_blade($method)
                    ->with('users_id', $request->users_id )
                    ->with('module', (new CommonService)->allActiveModulePerCompany($request->company_id) )
                    ->with('moduleAccess' , $this->getModuleAccess($request->users_id) );

    }

    public function settings_search_users_window($method, $id, $request)
    {

        $systemWindow = app('SystemWindow')->where('menu_status','1');

        if(!is_null($request->menu_child)) {
            $systemWindow = $systemWindow->where('menu_id', $request->menu_child);
        } 

        if(!is_null($request->module_from)) {
            $systemWindow = $systemWindow->where('module_id', $request->module_from);
        }

        $systemWindow = $systemWindow->orderBy('order_level','asc')->get();

        $usersWindowAccess = $this->getWindowAccess(Crypt::decrypt($request->users_id), $request->module_to, $request->module_from);

        return (new CommonService)->view_blade($method)
                    ->with('window', $systemWindow)
                    ->with('users_id', Crypt::decrypt($request->users_id))
                    ->with('module_to', $request->module_to)
                    ->with('module_from', $request->module_from)
                    ->with('windowAccess' , $usersWindowAccess);

    }

    public function settings_retrieve_company_users($method, $id = null, $request, $users = [])
    {

        $companyUsers = app('Users')->select('id','firstname','lastname')
                        ->where('company_id', $request->company)
                        ->where('status','1')
                        ->orderBy('order_level','asc')
                        ->get();

        foreach ($companyUsers as $key => $value) {
            $users[] = array_add($value, 'encrypted_id', Crypt::encrypt($value->id));
        }

        return response()->json($users);
        
    }

    public function settings_search_users_method($method, $id, $request)
    {
        $systemWindow = app('SystemWindow')->where('menu_status','1');

        if(!is_null($request->module_id)) {

            $systemWindow = $systemWindow->where('menu_link',$request->module_id);

        } 

        if(!is_null($request->menu_child)) {

            $systemWindow = $systemWindow->where('menu_id',$request->menu_child);

        } else if (!is_null($request->menu_parent)) {

            $systemWindow = $systemWindow->where('menu_parent',$request->menu_parent);

        } 

        $systemWindow = $systemWindow->has('subClassMethod')->with('subClassMethod')->get();

        $allMethodsPerWindow = array_collapse(array_pluck($systemWindow,'subClassMethod'));

        return (new CommonService)->view_blade($method)
                    ->with('users_id', Crypt::decrypt($request->users_id))
                    ->with('methods', $allMethodsPerWindow)
                    ->with('methodAccess' , $this->getMethodAccess(Crypt::decrypt($request->users_id)));
    }

    public function settings_retrieve_users_module($method, $id, $request)
    {

        $getModuleAccess = $this->getModuleAccess(Crypt::decrypt($request->users_id));

        $moduleAccess =  (new ModuleController)->usersModuleAccess($getModuleAccess);

        return response()->json($moduleAccess);

    }

	public function settings_retrieve_window_classes($method, $id, $request)
    {

        $jsonResponse = app('SystemWindow')->where('menu_status','1')
                            ->where('menu_link', $request->module)
                            // ->where('menu_type','1')
                            ->orderBy('order_level','asc')
                            ->get();

        return response()->json($jsonResponse);

    }

    public function settings_retrieve_window_sub_class($method, $id, $request)
    {

        $jsonResponse = app('SystemWindow')->where('menu_status','1')
                            ->where('menu_parent',$request->parent)
                            ->orderBy('order_level','asc')
                            ->get();

        return response()->json($jsonResponse);

    }

    public function settings_view_blade_access($method, $id, $request)
    {
        return (new CommonService)->view_blade($method);
    }
    
    public function settings_view_users_profile($method, $id, $request)
    {
        return (new CommonService)->view_blade($method)->with('UserDetails',$this->getUser($id));
    }

	public function settings_view_users_access($method, $id, $request)
	{

		return (new CommonService)->view_blade($method)->with('UserDetails',$this->getUser($id))

				->with('UserWindowAcces',$this->getWindowAccess(Crypt::decrypt($id)));
	}

	public function settings_view_add_menu($method, $id, $request)
	{
	    return (new CommonService)->view_blade($method);
	}

    public function settings_search_system_window($method, $id, $request)
    {
        $userswindow = app('SystemWindow')->activeWindow($request->filter_module)->get();

        return (new CommonService)->view_blade($method)->with('userswindow',$userswindow);
    }

    public function settings_create_user($method, $id, $request){

        $this->validate($request, [
            'profile_photo' => 'mimes:'.$this->validatefile('I'),
            'password' => 'min:6|required_with:cpassword|same:cpassword',
            'cpassword' => 'min:6',
            'contact' => 'min:10',
        ]);

        $UserModel = app('Users');

        $array = [
            'company_id' => $request->company,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'birthdate' => $request->birth_date,
            'education' => $request->education,
            'position_title' => $request->position_title,
            'contact' => $request->contact_no,
            'address' => $request->address,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'age' => ( (new CommonService)->dateTimeToday('Y') - date('Y', strtotime($request->birth_date)) ),
            'order_level' => (new CommonService)->orderLevel($UserModel),
            'created_by' => $this->thisUser()->id,
            'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
            'profile_path' => $this->profileUpload($request,'profile_photo'),
        ];

        /* VALIDATE USERS IF EXISTS */
        $user = app('Users')->where('firstname', $request->firstname)->where('lastname',$request->lastname)
                            ->where('email',$request->email)->where('username',$request->username)->first();

        /* VALIDATE COMPANY IF MAX USERS EXCEEDS */
        $company = app('SystemCompany')->where('company_id', $request->company )->first();
 
        if(count($this->allusersPerCompany($request->company)) >= $company->company_system_users) {
            Session::flash('failed','Cannot add new user. This company (' . $company->company_descriptiion . ') reached the maximum number of users.');
            return back()->withInput();
        }

        if(count($user) > 0) {
            Session::flash('failed','This user is already exists.');
            return back()->withInput();
        } else {
            app('Users')->insert($array);
            Session::flash('success','New user successfully added.');
            return back();
        }

    }

    public function settings_search_users($method, $id, $request)
    {
        $users = app('Users')->where('firstname','like',$request->search_user.'%')
                    ->orWhere('middlename','like',$request->search_user.'%')
                    ->orWhere('lastname','like',$request->search_user.'%')
                    ->orWhere('email','like',$request->search_user.'%')
                    ->orWhere('contact','like',$request->search_user.'%');

        return (new CommonService)->view_blade($method)->with('users',$users->get());
    }

    public function settings_search_users_access($method, $id, $request)
    {
        $usersid = Crypt::decrypt($request->search_user);
        
        $usersmodule = Crypt::decrypt($request->users_module);

        return (new CommonService)
                    ->view_blade($method)->with('usersaccess', $this->getWindowAccess($usersid))
                    ->with('usersmodule', $usersmodule)->with('usersid', $usersid);
    }

    public function settings_retrieve_active_windows($method, $id, $request)
    {
        $userswindow =  app('SystemWindow')->where('module_id', $request->module_id)->where('menu_type','1')->get();

        return response()->json($userswindow);
    }

    public function settings_get_users_role($usersid)
    {
        return app('Users')->where('id', $usersid)->has('windowAccess')

               ->with(['windowAccess' => function($query) { $query->has('systemWindow')->with('systemWindow')->orderBy('menu_id','desc')->get(); }])->first();
    }

	/* UPDATES */
    public function settings_update_user_profile_photo($method, $id, $request)
    {
        if (!is_null($request->change_profile)) {
            $imagae_path = $this->profileUpload($request, 'change_profile', $this->getUser($id)->profile_path);

            app('Users')->where('id',Crypt::decrypt($id))->update(['profile_path' => $imagae_path]);

            Session::flash('success', 'Profile picture successfully changed');
        }
        return back();
    }

    public function settings_update_users_password($method, $id, $request)
    {
        $users = app('Users')->where('id', Crypt::decrypt($request->userid));

        if (Hash::check($request->opassword, $users->first()->password)) {
            if ($request->npassword == $request->cpassword) {
                $users->update(['password' => bcrypt($request->cpassword) ]);

                Session::flash('success', 'Password change successfully');
            } else {
                Session::flash('failed', 'Password do not match with the confirmed password, Please try again');
            }
        } else {
            Session::flash('failed', 'You have enterred Incorrect old password');
        }

        return back();
    }

    public function settings_update_users_info($method, $id, $request)
    {
        $array = $request->except('_token', 'userid');

        $array = array_add($array, 'updated_by', $this->thisUser()->id);

        $updated = app('Users')->where('id', Crypt::decrypt($request->userid))->update($array);

        ($updated) ? Session::flash('success', 'Your profile was successfully updated') : '' ;
    
        return back();
    }

    public function settings_toggle_users_profile($method, $id, $request)
    {
        if($this->thisUser()->id == Crypt::decrypt($id))
        {
            $message = 'Unable to update users user profile';
        } else {
            app('Users')->where('id', Crypt::decrypt($id))->update([
                'status' => $request->status,
                'updated_by' => $this->thisUser()->id,
                'updated_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
            ]);

            if($request->status == 1){
                $status = 'Active';
            }else{
                $status = 'Inactive';
            }

            $message = 'User ' . $this->getUser($id)->firstname . ' status in now ' . $status;
        }

        return $message;
    }

    public function settings_reload_sidenav($method, $id, $request)
    {
        $windowAccess = array_pluck(app('UsersWindowAccess')->where('users_id', $this->thisUser()->id)->get(),'menu_id');
        
        $class = (new sideBar($this->usersActivePath()))->sideNavClass();

        $usersModule = new ModuleController;

        return (new sideBar($this->usersActivePath()))->view_blade($method)->with('class',$class)->with('usersModule',$usersModule);
    }

}
