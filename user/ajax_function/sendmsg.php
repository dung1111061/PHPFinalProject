<?php
include_once "../../config.php";
include_once "../config.php";
spl_autoload_register(function ($class_controller_name) {
    $name = strtolower(str_replace("Controller", "", $class_controller_name));
    include_once "../".ADMIN_PATH."models/$name.php";
});
include_once "../".ADMIN_PATH."mylib.php";

$stm = conversation::insert($_GET["message"]);
$id  = conversation::getlastInsertId();

// Return new comment
$value = conversation::getConversation($id);
$privilege = $value[db_admin_privilege];
$user = $value[db_admin_realname];
$bodymsg = $value[db_conversation_bodymsg];
// $avatar_url = AVATAR_IMAGE_PATH."/".$value["avatar"];
$avatar_url = $value[db_admin_avatar] ? AVATAR_IMAGE_PATH.$value[db_admin_avatar] : AVATAR_IMAGE_PATH."	default.png";
									
$diff_time = difference_time($value[db_conversation_time]);
ob_start();
require_once "../".ADMIN_PATH."views/dashboard/conversation_diaglog.php"; 
$new_dialog = ob_get_clean();
echo $new_dialog;