<?php 

use Illuminate\Support\Facades\Route;

use App\Blog;
use App\Hacky;

	Route::get('',function(){
		return view('welcome');
	});
	Route::get('test/{username}/{password}','PostController@kopai');
	Route::get('show/{id}','PostController@show');
	Route::get('edit/{id}','PostController@edit');

	Route::get('home/{name}/{location}','PostController@home');
	Route::get('about','PostController@about');
	Route::get('contact/{address}','PostController@contact');
	//=========================================================================
	Route::get('insert',function(){
		$result = DB::insert('insert into post(title,content) value(?,?)',['HTML','Tutorial by Waifer Kolar']);
		return $result;
	});

	Route::get('select',function(){
		$posts = DB::select('select * from post where is_admin=?',['0']); // multidimentional array style in $posts if output with raw query
		//echo "<pre>";
		//var_dump($posts);
		$var = " ";
		foreach ($posts as $post) { // associative array style in $post
			$var .= $post->title." and ".$post->content."<br>";
		}
		return $var;
	});

	Route::get('update',function(){
		$update = DB::update('update post set title = ? where id=?',['CSS',1]);
		return $update;
	});

	Route::get('delete',function(){
		$delete = DB::delete('delete from post where id = ?',[1]);
		return $delete;
	});
	//=========================================================================
	Route::get('bloginsert',function(){
		DB::insert('insert into blogs(title,content) value(?,?)',['JavaScript','JavaScript Tutorial']);
	});

	Route::get('/bloggetall',function(){
		$getall = Blog::all(); //output json array style;
		$var = " ";
		foreach ($getall as $all) {
			$var.= $all->title." And ".$all->content."<br>";
		}
		return $var;
	});
	//==========================================================================
	Route::get('/hackyinsert',function(){
		DB::insert('insert into hackies(name,password,is_admin) values(?,?,?)',['phyolay','phyolay123',0]);
	});
	Route::get('hackygetall',function(){
		$gethacky = Hacky::all();
		$var = " ";
		foreach ($gethacky as $all) {
			$var .= $all->name." And ".$all->password."<br>";
		}
		return $var;
	});
	//==========================================================================
	Route::get('find',function(){
		//$find = Hacky::find(6);
		$find = Hacky::findOrFail(7); // if output no data, display error page
		//$find = Hacky::where('is_admin',1)->get();
		//$find = Hacky::where('id',1)->where('is_admin',1)->get();
		//$find = Hacky::where('is_admin',1)->take(1)->get();
		return $find;
	});
	//==========================================================================
	Route::get('hackyinsertmodel',function(){
		$hacky = new Hacky;

		$hacky->name = "This is title.";
		$hacky->password = "title123";
		$hacky->is_admin = 1;

		$hacky->save();
	});
	Route::get('hackyupdate',function(){
		$hackyupdate = Hacky::find(1);

		$hackyupdate->name = "This is title 2";
		$hackyupdate->password = "title2-123";
		$hackyupdate->is_admin = 0;

		$hackyupdate->save();
	});
	//========================================================================
	Route::get('hackycreatemethod',function(){
		Hacky::create([
			'name' => 'Aung Aung',
			'password' => 'aung123',
			'is_admin' => 0
		]);
	});
	Route::get('hackyupdatemethod',function(){
		Hacky::where('id',8)->update([
			'name' => 'Mg Mg',
			'password' => 'mgmg123',
			'is_admin' => 1
		]);
	});
	Route::get('hackydeletemethod',function(){
		//$hackies = Hacky::find(6);
		//$hackies->delete();
		Hacky::destroy(8);
		Hacky::destroy([5,7]);
	});
	//==============================================================================
	Route::get('softDeletes',function(){
		$hackydelete=Hacky::find(2);
		$hackydelete->delete();
	});
	Route::get('findSoftDelete',function(){
		$findsdelete = Hacky::withTrashed()->where('id',2)->get(); // can find withTrashed() deleted data with softdelete
		$findsdelete = Hacky::onlyTrashed()->where('id',2)->get();
		return $findsdelete;
	});
	Route::get('hackygetall',function(){
		$gethacky = Hacky::all();
		return $gethacky;
		//echo("<pre>");
		//var_dump($gethacky);
	});
 ?>