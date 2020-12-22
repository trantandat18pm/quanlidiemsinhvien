<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Model' => 'App\Policies\ModelPolicy',
	];
	
	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();
		Gate::define('admin',function($username){
			return $username->quyenhan==='1';			
		
		});
		Gate::define('giangvien',function($username){
			return $username->quyenhan==='2';			
		
		});
		Gate::define('sinhvien',function($username){
			return $username->quyenhan==='3';			
		
		});
		//
	}
}