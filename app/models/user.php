<?php 

    class User{

        static public function login($data){
            $username = $data['username'];
            try{
                $query = 'SELECT * FROM users WHERE username=:username';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":username" => $username));
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                return $user;
            }catch(PDOException $ex){
                echo 'error' . $ex->getMessage();
            }
        }

        // static public function getUsers(){
        //     $stmt = DB::connect()->prepare('SELECT * FROM users');
        //     $stmt->execute();
        //     return $stmt->fetchAll();
        // }

        static public function createUser($data){
        $stmt = DB::connect()->prepare('INSERT INTO users (fname, username, password) VALUES (:fname,:username,:password)');
        $stmt->bindParam(':fname',$data['fname']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':password',$data['password']);

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        
        }
        public static function getOne($id)
        {
          
           try{
               $query = "SELECT * FROM `reservation` WHERE user_id=$id ";
               $stmt = DB::connect()->prepare($query);
               $stmt->execute();
               $res = $stmt->fetch(PDO::FETCH_OBJ);
               return $res;
            //    die(var_dump(($res)));
   
           }catch(PDOException $ex){
               echo 'error' . $ex->getMessage();
           }
        }

    }

?>