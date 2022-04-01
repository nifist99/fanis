@extends('web.content')
@section('content')

    <div class="pengumuman">
        <marquee behavior="scroll" direction="left">
            <p class="font-section">Silahkan Request Move Nanti Akan Team Kami Carikan Movie Favorit Anda.</p>
        </marquee>
    </div>

  <main id="main" class="mt-50">
   
   <!--  section detail -->
   <section id="detail">
     <div class="container mt-50">
       <div class="row" id="forum-card">
           <p class="font-section">Forum</p>
            <hr>
              @foreach($forum as $key)
                <div class="col-md-4 col-sm-12 mt-10">
                    <div class="card-comment">
                        <div>
                        <img src="{{url(CRUDBooster::random_image())}}" class="img-komentar">
                        <span class="white">{{$key->email}}</span>
                        </div>
                        <hr>
                        <div>
                        <p class="font-body">{{$key->content}}</p>
                        </div>      
                    </div>
                </div>
            @endforeach
            <div class="mt-50">
                {{ $forum->onEachSide(5)->links() }}
              </div>
            </div>
     
     </div>
   </section>

   <section id="third">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <p class="font-section text-center">Silahkan Request Film </p>
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
      </div>
    </div>
   </section>

  </main>


@endsection