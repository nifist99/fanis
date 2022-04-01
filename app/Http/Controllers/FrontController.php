<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;

class FrontController extends Controller
{
    public function index(){

        $data['kategori']=DB::table('db_kategori')->get();

        $data['tag']     =DB::table('db_tag')->get();

        $data['populer']=DB::table('db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->where('db_film.populer','yes')
                        ->orderBy('db_film.created_at','desc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->get();

        $data['film']=DB::table('db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->orderBy('db_film.created_at','desc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->paginate(24);

        return view('web.index',$data);
    }

    public function kategori($nama){
        $data['title'] ='Kategori '.$nama;

        $data['kategori']=DB::table('db_kategori')->get();

        $data['tag']     =DB::table('db_tag')->get();

        $data['film']=DB::table('db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->where('db_kategori.nama',$nama)
                        ->orderBy('db_film.created_at','desc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->paginate(24);

        return view('web.searchby',$data);

    }

    public function tag($id){
        $get=DB::table('db_tag')->where('id',$id)->first();
        $data['title'] ='Tag/Genre '.$get->nama;
        $data['kategori']=DB::table('db_kategori')->get();

        $data['tag']     =DB::table('db_tag')->get();

        $data['film']=DB::table('db_film')
                        ->join('db_film_tag','db_film.id','=','db_film_tag.id_db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->where('db_film_tag.id_db_tag',$id)
                        ->orderBy('db_film.created_at','desc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->paginate(24);

        return view('web.searchby',$data);

    }

    public function detail($id){
        $data['id']      =$id;
        $data['kategori']=DB::table('db_kategori')->get();
        $data['tag']     =DB::table('db_tag')->get();
        $data['komentar']=DB::table('db_film_komentar')
                        ->where('id_db_film',$id)
                        ->count();
        
        $data['komentar_list'] = DB::table('db_film_komentar')
                                 ->where('id_db_film',$id)
                                 ->get();

        $data['row']=DB::table('db_film')
                    ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                    ->where('db_film.id',$id)
                    ->select('db_film.*','db_kategori.nama as kategori')
                    ->first();

        $data['tag_film']=DB::table('db_film_tag')
                    ->join('db_tag','db_film_tag.id_db_tag','=','db_tag.id')
                    ->where('db_film_tag.id_db_film',$id)
                    ->select('db_tag.nama as tag','db_tag.id')
                    ->get();

        $data['link']=DB::table('db_link_film')
                    ->join('db_shortlink','db_link_film.id_db_shortlink','=','db_shortlink.id')
                    ->join('db_film','db_link_film.id_db_film','=','db_film.id')
                    ->where('db_link_film.id_db_film',$id)
                    ->select('db_link_film.*','db_shortlink.*')
                    ->get();

        $data['new'] =DB::table('db_film')
                    ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                    ->where('db_film.status','publish')
                    ->orderBy('db_film.created_at','desc')
                    ->select('db_film.*','db_kategori.nama as kategori')
                    ->limit(6)
                    ->get();
        
        

        

        return view('web.detail_film',$data);    
    }

    public function genre(){
        $data['kategori']=DB::table('db_kategori')->get();
        $data['tag']     =DB::table('db_tag')->get();
        $data['new']     =DB::table('db_film')
                            ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                            ->where('db_film.status','publish')
                            ->orderBy('db_film.created_at','desc')
                            ->select('db_film.*','db_kategori.nama as kategori')
                            ->limit(6)
                            ->get();
        return view('web.genre',$data);

    }

    public function search(Request $req){
        $data['title'] ='Search '.$req->judul;

        $data['kategori']=DB::table('db_kategori')->get();

        $data['tag']     =DB::table('db_tag')->get();

        $data['film']=DB::table('db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->where('db_film.judul','like','%'.$req->judul.'%')
                        ->orderBy('db_film.created_at','desc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->paginate(24);

        return view('web.searchby',$data);

    }

    public function by($nama){
        $data['title'] ='By '.$nama;

        $data['kategori']=DB::table('db_kategori')->get();

        $data['tag']     =DB::table('db_tag')->get();

        if($nama=='populer'){
            $data['film']=DB::table('db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->where('db_film.populer','yes')
                        ->orderBy('db_film.created_at','desc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->paginate(24);

        }elseif($nama=='rating'){

            $data['film']=DB::table('db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->where('db_film.populer','yes')
                        ->orderBy('db_film.rating','asc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->paginate(24);

        }elseif($nama=='new'){

            $data['film']=DB::table('db_film')
                        ->join('db_kategori','db_film.id_db_kategori','=','db_kategori.id')
                        ->where('db_film.status','publish')
                        ->orderBy('db_film.created_at','desc')
                        ->select('db_film.*','db_kategori.nama as kategori')
                        ->paginate(24);

        }

        return view('web.searchby',$data);
    }

    public function komentar(Request $request){

        $data['nama']           =$request->nama;
        $data['komentar']       =$request->content;
        $data['id_db_film']     =$request->id_db_film;
        $data['created_at']     =date('Y-m-d');

        $cek=DB::table('db_film_komentar')
        ->insert($data);

        $respon['api_status']='success';
        $respon['api_message']='Komentar Publish';
        $respon['data']=$data;


        return Response::json($respon);
    }

    public function kontak(Request $request){

        $data['email']          =$request->email;
        $data['content']        =$request->content;
        $data['created_at']     =date('Y-m-d');

        $cek=DB::table('db_request')
        ->insert($data);

        $respon['api_status']='success';
        $respon['api_message']='Request Terkirim';
        $respon['data'] = $data;

        return Response::json($respon);
    }

    public function suscribe(Request $request){

        $data['email']           =$request->email_suscribe;
        $data['created_at']     =date('Y-m-d');


        $cek=DB::table('db_suscribe')
        ->insert($data);

        $respon['api_status']='success';
        $respon['api_message']='Request Terkirim';

        return Response::json($respon);
    }


    public function forum(){
        $data['forum']=DB::table('db_request')
                    ->orderBy('created_at','desc')
                    ->paginate(24);

        return view('web.forum',$data);
    }

}
