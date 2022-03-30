@extends('web.content')
@section('content')

<section id="bg" class="d-flex align-items-center">
    <div class="container">
        <h1 class="text-center font-head">{{$row->judul}}</h1>
    </div>
  </section>

  <main id="main">
    <section id="movie">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <img src="{{url($row->foto)}}" class="img-movie">
            <div class="mt-20">
              @php 
              $year = date_create($f->tanggal);
              $result = date_format($year,'Y');
              @endphp
              <ul>
                  <li>{{$row->kategori}}</li>
                  <li><span class="fa fa-star star">&nbsp;</span>{{$row->rating}}</li>
                  <li>{{$result}}</li>
              </ul>
            </div>
            <div class="mt-20">
              @foreach($tag_film as $t_film)
              <span><a href="{{url('tag/'.$t_film->id)}}" class="btn btn-sm btn-outline-primary">{{$t_film->tag}}</a></span>
              @endforeach
            </div>
          </div>
          <div class="col-md-8 col-sm-12 responsif-mt">
            <div class="text-left">
              <p class="font-section">Deskripsi</p>
            </div>
            <div class="font-body">
              @php echo $row->content; @endphp
            </div>
          </div>

          <div class="col-sm-12 mt-50 responsif-mt">
            <div class="text-left">
              <p class="font-section">Silahkan Download Disini</p>
              <ul>
                @if(count($link)==0)
                <p class="font-title">Link download belum tersedia</p>
                @else
                @foreach($link as $l)
                <li><a href="{{url($l->url.$l->link_download)}}" target="_blank" class="btn btn-sm btn-outline-success">{{$l->nama}}</a></li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </section>

   <!--  section detail -->
   <section id="detail">
     <div class="container mt-50">
       <div class="row">
         <div class="col-md-8 col-sm-12">
            <hr>
            <p>Comments <span class="btn btn-sm btn-primary">{{$komentar}}</span></p>
            <div id="postkomentar">
              @foreach($komentar_list as $key)
              <div class="card-comment">
                <div>
                  <img src="{{url(CRUDBooster::random_image())}}" class="img-komentar">
                  <span class="white">{{$key->nama}}</span>
                </div>
                <hr>
                <div>
                  <p class="font-body">{{$key->komentar}}</p>
                </div>      
              </div>
              @endforeach


            </div>
           <div class="card-send">
            <form action="" id="komentar">
            <div class="mb-3">
                <input type="hidden" id="id_db_film" name="id_db_film" value="{{$id}}">
                <label for="nama" class="form-label">Email address</label>
                <input type="text" class="form-control form-style" id="nama" name="nama" placeholder="nama">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Komentar</label>
                <textarea class="form-control form-style" id="content" name="content" rows="5"></textarea>
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-sm btn-outline-primary" id="kirim_komentar" value="Send Comment">
              </div>
            </form>
           </div>
         </div>
         <div class="col-md-4 col-sm-12 responsif-mt">
          <div class="card-detail">

            <form action="{{url('search')}}" method="POST" class="d-flex">
              @csrf
              <input class="form-control me-2" type="search" name="judul" placeholder="search" aria-label="Search">
              <button class="btn btn-outline-info" type="submit">search</button>
            </form>

            <div class="mt-20">
              <hr>
              <p>Category</p>
              <div class="row">
                @foreach($kategori as $kat)
                 <div class="col-6 mt-10">
                   <a href="{{url('kategori/'.$kat->nama)}}" class="">{{$kat->nama}}</a>
                 </div>
                @endforeach
              </div>
            </div>

             <div class="mt-20">
              <hr>
              <p>Genre</p>
              <div class="row">
                @foreach($tag as $t)
                 <div class="col-6 mt-10">
                   <a href="{{url('tag/'.$t->id)}}" class="">{{$t->nama}}</a>
                 </div>
                @endforeach
              </div>
            </div>

            <div class="mt-20">
              <hr>
              <p>News Items</p>
              <hr>

              <div class="row">
              @foreach($new as $f)
              <div class="col-md-6 col-sm-12">
                <div class="card" style="width: 100%;">
                  <a href="{{url('detail/'.$f->id)}}">
                    <img src="{{url($f->poster)}}" class="card-img-top img-list-movie" alt="...">
                  </a>
                  <div class="card-body">
                    <a href="{{url('detail/'.$f->id)}}">
                      <p class="card-title font-title">{{$f->judul}}</p>
                    </a>
                     <ul>
                       @php 
                       $year = date_create($f->tanggal);
                       $result = date_format($year,'Y');
                       @endphp
                        <li>{{$f->kategori}}</li>
                        <li>{{$result}}</li>
                    </ul>
                  </div>
                   
                </div>
              </div>
              @endforeach
            </div>
            </div>
            
          </div>
           
         </div>
       </div>
     </div>
   </section>
  </main>

  @push('js')
<script>
  $(function () {

    

  
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
  
      $('#kirim_komentar').click(function (e) {
          e.preventDefault();
          $(this).html('Sending..');

          var nama     = $('#nama').val();
          var content    = $('#content').val();

          if(nama==''||content=='' ){
              $('#komentar').trigger("reset");
              $('#kirim_komentar').html('Kirim');
              Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: "data ada yang kosong silahkan isi semua",
                      showConfirmButton: false,
                      timer: 5000
                      })
          }else{ 
             $.ajax({
              data: $('#komentar').serialize(),
              url: "{{url('komentar')}}",
              type: "POST",
              dataType: 'json',
              success: function (respon) {
                  if(respon.api_status=='success'){
                    var post='<div class="card-comment">';
                    post +='<div>';
                    post +='<img src="{{url("web/assets/img/profil.png")}}" alt="" class="img-komentar">';
                    post +='<span class="white"> '+respon.data.nama+'</span>';
                    post +='</div>';
                    post +='<hr>';
                    post +='<div>';
                    post +='<p class="font-body">'+respon.data.komentar+'</p>'
                    post +='</div>'
                    post +='</div>';
          
                      $('#postkomentar').append(post);
                      $('#komentar').trigger("reset");
                      $('#kirim_komentar').html('Kirim');
                          Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: respon.api_message,
                          showConfirmButton: false,
                          timer: 5000
                          })
                  }else{
                      $('#komentar').trigger("reset");
                      $('#kirim_komentar').html('Kirim');
                      Swal.fire({
                          position: 'center',
                          icon: 'error',
                          title: respon.api_message,
                          showConfirmButton: false,
                          timer: 5000
                          })
                  }    
              },
              error: function (respon) {
                  $('#komentar').trigger("reset");
                  $('#kirim_komentar').html('Kirim');
                  Swal.fire({
                          position: 'center',
                          icon: 'error',
                          title: respon.api_message,
                          showConfirmButton: false,
                          timer: 5000
                          })
                  
              }
          });
      }
          });
  
  
  })
  </script>
@endpush

@endsection