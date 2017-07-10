<?php
// Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
// following the instructions to install it with Composer.




class DB_Functions {

  private $db;



  //put your code here
  // constructor
  function __construct() {
    require_once 'DB_Connect.php';
    // connecting to database
    $this->db = new DB_Connect();
    $this->db->connect();


  }

  // destructor
  function __destruct() {

  }

  public function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  public function random_string()
  {
    $character_set_array = array();
    $character_set_array[] = array('count' => 7, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
    $character_set_array[] = array('count' => 1, 'characters' => '0123456789');
    $temp_array = array();
    foreach ($character_set_array as $character_set) {
      for ($i = 0; $i < $character_set['count']; $i++) {
        $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
      }
    }
    shuffle($temp_array);
    return implode('', $temp_array);
  }

  /**
  * Encrypting password
  * returns salt and encrypted password
  */
  public function hashSSHA($password) {

    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
  }

  /**
  * Decrypting password
  * returns hash string
  */
  public function checkhashSSHA($salt, $password) {

    $hash = base64_encode(sha1($password . $salt, true) . $salt);

    return $hash;
  }

  public function forgotPassword($forgotpassword, $newpassword, $salt){
    require_once 'config.php';
    // connecting to mysql

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $result = mysqli_query($con,"UPDATE `users` SET `encrypted_password` = '$newpassword',`salt` = '$salt' WHERE `phone` = '$forgotpassword'");

    if ($result) {

      return true;

    }
    else
    {
      return false;
    }

  }

  public function storeUserSimple($fname, $lname, $email, $phone, $password, $country, $network, $member,$category,$latitude,$longitude,$validate) {
    $uuid = uniqid('', true);
    $balance =0;
    $hash = $this->hashSSHA($password);
    $encrypted_password = $hash["encrypted"]; // encrypted password
    $salt = $hash["salt"]; // salt
    //$validation_code = generateRandomString();
    $validation_code = $this->random_string();
    require_once 'config.php';
    // connecting to mysql

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);

    $result = mysqli_query($con,"INSERT INTO users_simple(unique_id, firstname, lastname, phone, country_code, network, member_code, email, category, balance, latitude, longitude, encrypted_password, salt, validation_code, active, created_at) VALUES('$uuid', '$fname', '$lname', '$phone','$country','$network','$member', '$email','$category','$balance','$latitude','$longitude', '$encrypted_password', '$salt', '$validation_code','$validate', NOW())");
    // check for successful store
    if ($result) {
      // get user details
      $uid = mysqli_insert_id($con); // last inserted id
      $result = mysqli_query($con,"SELECT * FROM users_simple WHERE uid = $uid");
      // return user details
      return mysqli_fetch_array($result);
    } else {
      return false;
    }
  }

  /**
  * Verifies user by email and password
  */
  public function getUserByEmailAndPassword($email, $password) {
    require_once 'config.php';
    // connecting to mysql

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $result = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'") or die(mysqli_error());
    // check for result
    $no_of_rows = mysqli_num_rows($result);
    if ($no_of_rows > 0) {
      $result = mysqli_fetch_array($result);
      $salt = $result['salt'];
      $encrypted_password = $result['encrypted_password'];
      $hash = $this->checkhashSSHA($salt, $password);
      // check for password equality
      if ($encrypted_password == $hash) {
        // user authentication details are correct
        return $result;
      }
    } else {
      // user not found
      return false;
    }
  }





}

?>
