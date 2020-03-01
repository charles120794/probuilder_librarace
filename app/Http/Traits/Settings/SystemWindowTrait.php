<?php

namespace App\Http\Traits\Settings;

use Crypt;
use Session;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait SystemWindowTrait
{

    public function settings_create_users_window($method, $id = null, $request) 
    {
     
        $system_menu = app('SystemWindow')
                        ->select('menu_id','order_level','menu_link')
                        ->where('menu_parent', $request->menu_parent)
                        ->where('menu_name', $request->menu_name)
                        ->where('menu_link', $request->menu_link)
                        ->first();

        if(count($system_menu) > 0) {

            Session::flash('failed','This window is already exists, Please try again other menu \'class\', \'description\', \'path\', \'type\' ');
            return back()->withInput();

        } else {

            $orderLevel = app('SystemWindow')
                                ->where('menu_parent',$request->menu_parent)
                                ->where('menu_link', $request->menu_link)
                                ->orderBy('order_level','desc')
                                ->first();

            if(count($orderLevel) > 0 ) {
                $orderLevelNew = $orderLevel['order_level'] + 1;
                $menuLevel = $orderLevel['menu_level']; 
            } else {
                $orderLevelNew = 1;
                $menuLevel = 1;
            }

            $moduleData = (new CommonService)->thisModule($request->module_id);
            // MENU PATH
            $menuPath = ($request->menu_type == 0) ? $moduleData->module_page_route . '.' . str_replace('-','',strtolower(trim($request->menu_path))) : null ;

            $array = [
                'menu_blade' => $menuPath,
                'menu_level' => $menuLevel,
                'order_level' => $orderLevelNew,
                'menu_icon' => 'fa fa-folder-o',
                'module_id' => $moduleData->module_id,
                'menu_link' => $moduleData->module_code,
                'menu_name' => $request->menu_name,
                'menu_path' => $request->menu_path,
                'menu_type' => $request->menu_type,
                'menu_parent' => $request->menu_parent,
            ];

            // return $array;
         
            if( app('SystemWindow')->insert($array) ) {

                $filePath = str_replace('.', '/', $menuPath) . '.blade.php';

                $this->createBladeFile( str_replace('pages/','',$filePath), $this->createBladeContent());

                Session::flash('success','New users window successfully created.');
                return back();

            } else {

                Session::flash('success','Whoops! Something went wrong, please try again.');
                return back();

            }

        }
    }

    public function settings_update_users_window($method, $id = null, $request, $rowcount = [])
    {
        if( !is_null($request->window) ) {
            foreach ($request->window as $key => $value) {
                if (array_key_exists('checkbox', $value)) {

                    $array = [
                        'menu_parent' => $value['menu_parent'],
                        'menu_name' => $value['menu_name'],
                        'menu_level' => $value['menu_level'],
                        'menu_path' => $value['menu_path'],
                        'menu_icon' => $value['menu_icon'],
                        'order_level' => $value['order_level'],
                    ];

                    app('SystemWindow')->where('menu_id', Crypt::decrypt($value['menu_id']))->update($array);

                }

                if ( array_key_exists('menu_type', $value) ) { 

                    app('SystemWindow')
                        ->where('menu_id', Crypt::decrypt($value['menu_id']))
                        ->update([ 'menu_type' => $value['menu_type'] ]);

                } else {

                    app('SystemWindow')
                        ->where('menu_id', Crypt::decrypt($value['menu_id']))
                        ->update([ 'menu_type' => 0 ]);

                }
                
            }
        }
    }

    public function settings_delete_users_window($method, $id = null, $request)
    {
        foreach ($request->row as $id => $value) {
            if (array_key_exists('menu_update', $value)) {
                $menu_id[] = $id;
                $rowcount[] = app('SystemWindow')->where('menu_id', $id)->update(['menu_status' => 0]);
            }
        }
        if(count($rowcount) > 0) {
            return ['message' => 'Window successfully removed.'];
        } else {
            return ['message' => 'Select a row you want to remove.'];
        }
    }

    // HELPER FUNCTIONS 
    public function createBladeContent()
    {
        return '@extends(\'layouts.layout\')

        @section(\'title\', \' Title Here \')

        @section(\'content\')

        <section class="content-header">
            <h1> &nbsp; </h1>
            <ol class="breadcrumb">
                <li><a href="/dashboard-here"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            </ol>
        </section>

        <section class="content">
            
            @include(\'errors.alerts\')

        </section>
        <!-- /.content -->
        @endsection';
    }

    public function createBladeFile($location, $content = '')
    {
        if(!Storage::disk('resources')->exists( $location ) ) 
        { 
            Storage::disk('resources')->put( $location, $content );
        }
    }

}
//9Wfo8fCs?84