<?php
    include('Database.php');
    class Logins{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT s_id FROM shop_login WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            $s_id = DB::query('SELECT s_id FROM shop_login WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['s_id'];
            //return $user_id;
            if (isset($_COOKIE['SNID_'])) {
              return $s_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO shop_login VALUES(\'\', :s_id,:token)', array(':s_id'=>$sid,':token'=>sha1($token)));
              DB::query('DELETE FROM shop_login WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])));

              setcookie("SNID", $token, time() + 60 * 60 * 24 * 1, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 1, '/', NULL, NULL, TRUE );
              return $sid;
            }
          }
        }
        return false;
      }
    }
 ?>
