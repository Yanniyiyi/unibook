<?php
/**
 * Created by PhpStorm.
 * User: Yanni
 * Date: 21/6/17
 * Time: 11:03 PM
 */

namespace App\Repositories;
use App\User;

class UserRepository
{
   /**
    * undocumented function
    *
    * @return void
    * @author 
    **/
   public function getAllBooks($user)
   {
   		return $user->books()->withTrashed()->orderBy('created_at','desc');
   }

   public function getActivedBooks($user)
   {
      return $user->books()->orderBy('created_at','desc');
   }

   public function getDeletedBooks($user)
   {
      return $user->books()->onlyTrashed()->orderBy('created_at','desc');
   }

   public function deleteBook($user,$id)
   {
      return $user->books()->where('id',$id)->delete();
   }
}