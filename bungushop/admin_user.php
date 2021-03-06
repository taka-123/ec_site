<?php
require_once './conf/const.php';
require_once MODEL_PATH . 'common.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'user.php';

session_start();

$db = get_db_connect();

// 管理者としてログインしていない場合、ログインページへ
if (is_admin() === false){
    redirect_to(LOGIN_URL);
}

// ログイン中のユーザIDを取得
$user_id = (int)get_session('user_id');

// 登録済みの全ユーザ情報を取得    
$users = get_all_users($db);

// カート内購入予定数取得
$total_amount = get_total_amount($db, $user_id);

include_once VIEW_PATH . 'admin_user_view.php';
