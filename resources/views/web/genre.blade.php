@extends('web.content')
@section('content')

<section id="bg" class="d-flex align-items-center">
    <div class="container">
        <h1 class="text-center font-head">Enjoy Watching</h1>
    </div>
  </section>

  <main id="main">
   
   <!--  section detail -->
   <section id="detail">
     <div class="container mt-50">
       <div class="row">
         <div class="col-md-8 col-sm-12">
           <p class="font-section">Kategori</p>
            <hr>
            <div class="row">
              @foreach($kategori as $kat)
            <div class="col-6 mt-10">
              <a href="{{url('kategori/'.$kat->nama)}}">{{$kat->nama}}</a>
            </div>
            @endforeach
            </div>
            <hr>

            <p class="font-section">Tag / Genre</p>
            <hr>

            <div class="row">
              @foreach($tag as $t)
            <div class="col-6 mt-10">
              <a href="{{url('tag/'.$t->id)}}">{{$t->nama}}</a>
            </div>
            @endforeach
            </div>
          
         </div>
         <div class="col-md-4 col-sm-12 mt-50">
          <div class="card-detail">

            <form action="{{url('search')}}" method="POST" class="d-flex">
              @csrf
              <input class="form-control me-2" type="search" name="judul" placeholder="search" aria-label="Search">
              <button class="btn btn-outline-info" type="submit">search</button>
            </form>

            <div class="mt-20">
              <hr>
              <p>News Items</p>
              <hr>

              <div class="row">
              @foreach($new as $f)
              <div class="col-md-6 col-sm-12 mt-20">
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


@endsection