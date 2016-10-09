<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppUser;
use App\Group;
use App\GroupMedia;
use App\DirectMedia;
//use Request;
use File;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $bind = [];
        $bind['activeMenu'] = 'dashboard';
        $bind['pageTitle'] = 'Dashboard';
        return view('dashboard', $bind);
    }

    public function users() {
        $bind = [];
        $bind['users'] = AppUser::get();
        $bind['activeMenu'] = 'users';
        $bind['pageTitle'] = 'Users';
        $bind['base_url'] = $this->base_url();
        return view('users', $bind);
    }

    public function groups() {
        $bind = [];
        $bind['groups'] = Group::get();
        $bind['activeMenu'] = 'groups';
        $bind['pageTitle'] = 'Groups';
        return view('groups', $bind);
    }

    public function groupMedia(Request $request) {
        $bind = [];
        $bind['flash_data'] = $request->session()->get('flash_data');
        $bind['groupMedia'] = GroupMedia::whereIn('type', ['video', 'image'])->where('message', '!=', '')->get();
        $bind['activeMenu'] = 'groupMedia';
        $bind['pageTitle'] = 'Group Media';
        $bind['base_url'] = $this->base_url();
        return view('group-media', $bind);
    }

    public function directMedia() {
        $bind = [];
        $bind['directMedia'] = DirectMedia::whereIn('type', ['video', 'image'])->where('text', '!=', '')->get();
        $bind['activeMenu'] = 'directMedia';
        $bind['pageTitle'] = 'Direct Media';
        return view('direct-media', $bind);
    }

    public function deleteGroupMedia($id, $fileName, $fileType, Request $request) {

        $bind = [];
        if (GroupMedia::destroy($id)) {
            
            if ($fileType === 'image') { // image file
                $file_path = $_SERVER['DOCUMENT_ROOT'] . 'yardin/chat_pic/' . $fileName;
            } else { // video file
                $file_path = $_SERVER['DOCUMENT_ROOT'] . 'yardin/chat_video/' . $fileName;
            }
            
            if(File::Delete($file_path)){
                $bind['status'] = 1;
                $bind['message'] = 'Media was deleted Successfully.';
                
            } else {
                $bind['status'] = 0;
                $bind['message'] = 'Oops! Error occur while deleting media file';
            }
        } else {
            $bind['status'] = 0;
            $bind['message'] = 'Oops! Error occur while deleting media record';
            
        }
        
        $request->session()->flash('flash_data', $bind);
        return redirect()->route('group-media');
    }
    
    public function base_url() {
    return sprintf(
            "%s://%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME']
    );
}

}
