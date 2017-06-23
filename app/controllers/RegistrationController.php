<?php

class RegistrationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getRegistration()
	{
		$users=User::paginate(4);
		return View::make("regis.registration",array("users"=>$users));
	}

	public function getApprove($id)
	{
        $userFromId=User::where("id","=",$id)->first();
        $flag="y";
        $userFromId->flag=$flag;
        $userFromId->save();
        $users=User::paginate(4);
        return View::make("regis.registration",array("users"=>$users));
	}


}
