@extends('web.content')
@section('content')

<section id="first" class="first">
    <div class="container">
      <div class="row">
          <div class="owl-carousel owl-theme"> 

            @foreach($populer as $p)
            <a href="{{url('detail/'.$p->id)}}">
            <div class="col-lg-4 col-sm-12">
              <div class="item card-coursel" style="background-image: url('{{$p->foto}}');background-size: cover;background-repeat: no-repeat;">
                <div class="coursel-title">
                   <p class="font-section">{{$p->judul}}</p>
                   <ul>
                     <li>{{$p->kategori}}</li>
                     <li>{{$p->rating}}</li>
                     <li>{{$p->tanggal}}</li>
                   </ul>
                </div>
              </div>
            </div>
            </a>
            @endforeach

          
    
            
           
        </div>
      </div>
    </div>
</section>

<main id="main">


<section class="nav-main">
  <div class="container">
        <div class="catalog_nav">
        <nav id="navbar" class="navbar">
      <ul>
        <li class="nav-link"><a href="{{url('by/populer')}}" class="btn btn-md btn-outline-info btn-nav">Populer</a></li>
        <li class="nav-link"><a href="{{url('by/new')}}" class="btn btn-md btn-outline-info btn-nav">Terbaru</a></li>
        <li class="nav-link"><a href="{{url('by/rating')}}" class="btn btn-md btn-outline-info btn-nav">Rating</a></li>

        </ul>
      </nav>
      <form action="{{url('search')}}" method="POST" class="d-flex">
        @csrf
        <input class="form-control me-2" type="search" name="judul" placeholder="search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">search</button>
      </form>
          
     
    </div>
  </div>
</section>

<section class="second">
  <div class="container">
    <div class="row">

      @foreach($film as $f)
      <div class="col-md-2 col-sm-6 mt-20">
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
      <div class="mt-50">
        {{ $film->onEachSide(5)->links() }}
      </div>

    </div>
  </div>
</section>

<section id="third">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12">
        <p class="font-section">Silahkan Request Film </p>
          <div class="card-send">
          <form id="kontak">
          <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control form-style" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="contnet" class="form-label">Example textarea</label>
              <textarea class="form-control form-style" id="content" name="content" rows="5"></textarea>
            </div>
            <div class="text-center">
              <input type="submit" class="btn btn-sm btn-outline-primary" id="kirim" name="kirim" value="Request Movie">
            </div>
          </form>
         </div>
      </div>
      <div class="col-md-4 col-sm-12 responsif-mt">
        <div class="card-detail">

          <form id="suscribe" class="d-flex">
            @csrf
            <input class="form-control me-2" type="email" name="email_suscribe" id="email_suscribe" placeholder="Suscribe" aria-label="Suscribe">
            <button class="btn btn-outline-info" type="submit" id="kirim_email">Suscribe</button>
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
        </div>
      </div>
    </div>
  </div>
</section>
</main>

@endsection