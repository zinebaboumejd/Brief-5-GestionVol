<?php 
 class Reservation {

     public static function getOne($id)
     {
       
        try{
            $query = "SELECT * FROM `reservation` WHERE user_id=$id ";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            // return $res;
            die(var_dump(($res)));

        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
     }
 }