<?php
session_start();

// for displaying error
error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_blogs() {
    $blogs = open_from_xml_file('blogs.xml');
    return $blogs;
}

function get_blog_post($id) {
    $blogs = get_blogs();
    foreach ($blogs as $post) {
        if ($post['id'] == $id) {
            return $post;
        }
    }
    return null;
}

function save_blog_post($id, $title, $content) {
    $blogs = get_blogs();
    $post_to_save = null;
    foreach ($blogs as $post) {
        if ($post['id'] == $id) {
            $post_to_save = $post;
        }
    }

    if ($post_to_save == null) {
        $post_to_save = $blogs->addChild('post');
        $post_to_save['id'] = uniqid();
        $post_to_save->publishDate = date("D M d, Y G:i");
    }

    $post_to_save->title = $title;
    $post_to_save->content = $content;

    save_xml_to_file($blogs, 'blogs.xml');
    return $post_to_save['id'];
}

function add_new_user($name, $username, $password) {
    $users = get_users();
    $new_user = $users->addChild('user');
    $new_user->addChild('name', $name);
    $new_user->addChild('username', $username);
    $new_user->addChild('password', $password);
    $new_user->addChild('type', 'author');

    save_xml_to_file($users, 'users.xml');
}

function get_users() {
    $users = open_from_xml_file('users.xml');
    return $users;
}

function get_user_by_username($username) {
    $users = get_users();
    foreach($users as $user) {
        if (strtolower($user->username) == strtolower($username)) {
            return $user;
        }
    }
    return null;
}

function is_logged_in() {
    return isset($_SESSION['name']) || isset($_SESSION['username']);
}

function redirect_if_not_logged_in() {
    if (!is_logged_in()) {
        header('Location: /login.php');
    }
}

function open_from_xml_file($filename) {
    $xml = simplexml_load_file(__DIR__ . '/../data/' . $filename);
    return $xml;
}

function save_xml_to_file($xml, $filename) {
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save(__DIR__ . '/../data/' . $filename);
}

?>
