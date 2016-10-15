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

    public function users(Request $request) {
        $bind = [];
        $bind['flash_data'] = $request->session()->get('flash_data');
        $bind['users'] = AppUser::get();
        $bind['activeMenu'] = 'users';
        $bind['pageTitle'] = 'Users';
        $bind['base_url'] = $this->base_url();
        return view('users', $bind);
    }

    public function deleteUser($user_id, $profile_image, $bg_image, Request $request) {
        $bind = [];
        $user = AppUser::find($user_id);
        if ($user->delete()) {
            if ($profile_image != ' ') {
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/yardin/' . $profile_image;
                File::Delete($file_path);
            }

            if ($bg_image != ' ') {
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/yardin/' . $bg_image;
                File::Delete($file_path);
            }

            $bind['status'] = 1;
            $bind['message'] = 'User was deleted successfully';
        } else {
            $bind['status'] = 0;
            $bind['message'] = 'Oops! Error occur while deleting user record';
        }

        $request->session()->flash('flash_data', $bind);
        return redirect()->route('users');
    }

    public function groups(Request $request) {
        $bind = [];
        $bind['flash_data'] = $request->session()->get('flash_data');
        $bind['groups'] = Group::get();
        $bind['activeMenu'] = 'groups';
        $bind['pageTitle'] = 'Groups';
        return view('groups', $bind);
    }

    public function deleteGroup($group_id, Request $request) {
        $bind = [];
        if (Group::destroy($group_id)) {
            $bind['status'] = 1;
            $bind['message'] = 'Group was deleted successfully';
        } else {
            $bind['status'] = 0;
            $bind['message'] = 'Oops! Error occur while deleting group';
        }

        $request->session()->flash('flash_data', $bind);
        return redirect()->route('groups');
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

    public function directMedia(Request $request) {
        $bind = [];
        $bind['flash_data'] = $request->session()->get('flash_data');
        $bind['directMedia'] = DirectMedia::whereIn('type', ['video', 'image'])->where('text', '!=', '')->get();
        $bind['activeMenu'] = 'directMedia';
        $bind['pageTitle'] = 'Direct Media';
        $bind['base_url'] = $this->base_url();
        return view('direct-media', $bind);
    }

    public function deleteGroupMedia($id, $fileName, $fileType, Request $request) {

        $bind = [];
        if (GroupMedia::destroy($id)) {

            if ($fileType === 'image') { // image file
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/yardin/chat_pic/' . $fileName;
            } else { // video file
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/yardin/chat_video/' . $fileName;
            }

            if (File::Delete($file_path)) {
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

    public function deleteDirectMedia($id, Request $request) {
       
        $bind = [];
        $directMedia = DirectMedia::find($id);
        $fileName = $directMedia->text;
        $fileType = $directMedia->type;
        if ($directMedia->delete()) {

            if ($fileType === 'image') { // image file
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/yardin/chat_pic/' . $fileName;
            } else { // video file
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/yardin/chat_video/' . $fileName;
            }

            if (File::Delete($file_path)) {
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
        return redirect()->route('direct-media');
    }

    public function base_url() {
        return sprintf(
                "%s://%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME']
        );
    }

}
