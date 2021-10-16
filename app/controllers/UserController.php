<?php


namespace App\Controllers;

use Core\Controller;
use Rakit\Validation\Validator;
use Core\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Thông tin cá nhân';
        $age_ranges = DB::get("select * from age_ranges");
        // echo "<pre>";
        return $this->view('user_form', [
            'title' => $title,
            'age_ranges' => $age_ranges
        ]);
    }
    public function store()
    {
        $validator = new Validator;
        // make it
        $validation = $validator->make($_POST, [
            'name'         => 'required',
            'phone_number' => 'required',
        ]);

        $validation->setMessages([
            'name:required'         => 'Vui lòng nhập tên.',
            'phone_number:required' => 'Vui lòng nhập số điện thoại.',
        ]);

        // validate
        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors()->firstOfAll();
            //
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            back();
        } else {
            $user = new User();
            $user->insert($this->getPost());
            $_SESSION['success'] = "<strong>Success!</strong> Đã lưu thông tin.";
            back();
        }
    }
}
