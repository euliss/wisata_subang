@section('title')
    Dashboard
@endsection
@extends('landing/v_header_landing')
@section('content')
    <div class="container">
        <div class="row layout-destination">
            <div class="col-sm-8 card-destination">
                <section class="hero-wrap" style="background-image: " data-stellar-background-ratio="0.5">
                    <div class="home-slider owl-carousel">

                        @foreach (explode('|', @$destination->image) as $image)
                            @if ($image != '')
                                {{-- <div class="slider-item">
                <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                  <div class="one-third w-100">
                    <div class="img" style="background-image:url(<?= asset('images/destinations/' . $image) ?>); width: 90%; border-radius: 10px"> 
                    </div>
                  </div>
                </div>
            </div> --}}
                                <img src="{{ asset('images/destinations/' . $image) }}" alt=""
                                    style="width: 90%; border-radius:5%">
                            @endif
                        @endforeach

                    </div>
                </section>

                <section class="ftco-section ftco-services-2 ftco-no-pt">
                    <div class="container-fluid px-0 bg-light">
                        <div class="container">
                            {{-- <div class="row tour py-5"> --}}

                            <div
                                class="col-md d-flex justify-content-center align-items-center align-self-stretch ftco-animate">
                                <div class="text">
                                    <h1 class="mb-4 mt-3">{{ $destination->name }}</h1>
                                    <table class="table" style="min-width:auto !important">
                                        @if (in_array($destination->id_category, [1, 2, 4]))
                                            <tr>
                                                <td class="bg-white p-3 rounded">
                                                    {{ GoogleTranslate::trans('Jam Operasional', app()->getLocale()) }}
                                                </td>
                                                <td class="bg-white p-3 rounded"><?= $destination->jam_operasional ?>
                                                </td>
                                            </tr>
                                        @endif
                                        @if (in_array($destination->id_category, [1, 2, 3, 4]))
                                            <tr>
                                                <td class="bg-white p-3 rounded">
                                                    {{ GoogleTranslate::trans('Harga', app()->getLocale()) }}</td>
                                                <td class="bg-white p-3 rounded"><?= $destination->harga ?></td>
                                            </tr>
                                        @endif
                                        @if (in_array($destination->id_category, [1, 3, 4]))
                                            <tr>
                                                <td class="bg-white p-3 rounded">
                                                    {{ GoogleTranslate::trans('Fasilitas', app()->getLocale()) }}</td>
                                                <td class="bg-white p-3 rounded"><?= $destination->fasilitas ?></td>
                                            </tr>
                                        @endif
                                        @if (in_array($destination->id_category, [2]))
                                            <tr>
                                                <td class="bg-white p-3 rounded">
                                                    {{ GoogleTranslate::trans('Menu', app()->getLocale()) }}</td>
                                                <td class="bg-white p-3 rounded"><?= $destination->menu ?></td>
                                            </tr>
                                        @endif
                                        @if (in_array($destination->id_category, [3]))
                                            <tr>
                                                <td class="bg-white p-3 rounded">
                                                    {{ GoogleTranslate::trans('Tipe Kamar', app()->getLocale()) }}</td>
                                                <td class="bg-white p-3 rounded"><?= $destination->tipe_kamar ?></td>
                                            </tr>
                                        @endif
                                    </table>
                                    <br>
                                    <h5>{{ GoogleTranslate::trans('Deskripsi', app()->getLocale()) }}</h5>
                                    <p class="text"><?= $destination->description ?></p>
                                </div>
                            </div>

                            {{-- </div> --}}
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 tour-wrap">
                                <iframe src="<?= $destination->location ?>" width="100%" height="450" style="border:0;"
                                    allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="col-md-12 tour-wrap">
                                <h3 class="mb-2">Informasi Lebih Lanjut</h3>
                                <a href="https://wa.me/{{ $destination->contact }}" class="btn btn-success"><i
                                        class="ion-logo-whatsapp"></i> Hubungi Kami</a>
                                <div class="pt-5 mt-5">
                                    <h3 class="mb-5">{{ count($comments) }}
                                        {{ GoogleTranslate::trans('Komentar', app()->getLocale()) }}</h3>

                                    <label for="filterSelect">Filter By Rating</label>
                                    <select id="filterSelect" class="form-control" style="width: 100px;">
                                        <option value="all">All</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                    <ul class="comment-list" id="ratingList">

                                        @foreach ($comments as $val)
                                            <li class="comment" data-jurusan="{{ $val->rating }}">
                                                <hr>
                                                <div class="comment-body" style="float:left;">
                                                    <h2>{{ $val->name }}</h2>
                                                    <div>{{ date('d M Y H:i:s', strtotime($val->created_at)) }}</div>
                                                    <div>Rating :
                                                        <?php for ($i=0; $i < $val->rating; $i++) { ?>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <?php } ?>
                                                        <?php for ($i=0; $i < 5-$val->rating; $i++) { ?>
                                                        <i class="bi bi-star text-warning"></i>
                                                        <?php } ?>
                                                    </div>
                                                    <p>{{ $val->content }}</p>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <button class="btn-utama" id="showMoreButton">Show more</button>
                                    <!-- END comment-list -->

                                    <div class="comment-form-wrap pt-5">
                                        <h3 class="mb-5">
                                            {{ GoogleTranslate::trans('Tinggalkan Komentar', app()->getLocale()) }}</h3>
                                        <form action="{{ url('store-comment/' . $destination->id) }}" method="post"
                                            class="p-5 bg-light text-grey">
                                            @csrf
                                            <div class="form-group">
                                                <label
                                                    for="name">{{ GoogleTranslate::trans('Name', app()->getLocale()) }}
                                                    *</label>
                                                <input required type="text" class="form-control" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="email">{{ GoogleTranslate::trans('Email', app()->getLocale()) }}
                                                    *</label>
                                                <input required type="email" class="form-control" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="message">{{ GoogleTranslate::trans('Message', app()->getLocale()) }}</label>
                                                <textarea required name="content" cols="10" rows="2" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="message">{{ GoogleTranslate::trans('Rating', app()->getLocale()) }}</label>
                                                <select required name="rating" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option selected value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit"
                                                    value="{{ GoogleTranslate::trans('Kirim Komentar', app()->getLocale()) }}"
                                                    class="btn py-3 px-4 btn-primary">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-sm-4" style="margin-top: 80px;padding-left: 80px;">
                <form action="/destination_search" class="mt-4">
                    <input type="text" class="form-control mb-2" name="name"
                        placeholder="{{ GoogleTranslate::trans('Input Destination', app()->getLocale()) }}">
                    <button type="submit"
                        class="btn btn-primary px-4 py-3">{{ GoogleTranslate::trans('Search Places', app()->getLocale()) }}</button>
                </form>
                {{-- <div class="row">
                    <h5 class="ml-3 mt-4">{{ GoogleTranslate::trans('Rekomendasi Destinasi', app()->getLocale()) }} : </h5> --}}
                {{-- @foreach ($recomend as $val)
          <div class="col-sm-12 mb-3">
            <a href="{{ url('destination/'.$val->id) }}" class="card">
              <div class="card-body">
                <h5>{{ $val->name }}</h5>
                <p style="max-height: 40px;overflow:hidden;font-size: 13px"> <?= str_replace('_', ' ', $val->description) ?> </p>
              </div>
            </a>
          </div>
          @endforeach --}}
                {{-- @foreach ($recomend as $val)
                        <div class="col-sm-12 mb-3  d-flex ftco-animate">
                            <div class="blog-entry">
                                <div class="img">
                                    <?php
                                    $image = explode('|', $val->image)[1];
                                    ?>
                                    <a class="text-center" href="{{ url('destination/' . $val->id) }}"><img
                                            src="{{ asset('images/destinations/' . $image) }}" width="100%"
                                            style="min-height:300px;max-height: 300px; border-radius:15px;"></a>
                                </div> --}}
                {{-- <span class="kategori">
                {{ $category->categories_name }}
              </span> --}}
                {{-- <div class="text float-right d-block"> --}}
                {{-- <span>{{ $value->created_at }}</span> --}}
                {{-- <p class="text heading"><a
                                            href="{{ url('destination/' . $val->id) }}">{{ $val->name }}</a></p>
                                </div>
                                <a href="images/destination-1.jpg"
                                    class="icon image-popup d-flex justify-content-center align-items-center">
                                </a>
                            </div>
                        </div>
                    @endforeach --}}

            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById("filterSelect").addEventListener("change", function() {
            var selectedJurusan = this.value;
            var mahasiswaItems = document.querySelectorAll("#ratingList li");

            for (var i = 0; i < mahasiswaItems.length; i++) {
                var dataJurusan = mahasiswaItems[i].getAttribute("data-jurusan");
                if (selectedJurusan === "all" || dataJurusan === selectedJurusan) {
                    mahasiswaItems[i].style.display = "block";
                } else {
                    mahasiswaItems[i].style.display = "none";
                }
            }
        });
    </script>
    <script>
        // JavaScript to handle "Show more" functionality
        const commentContainer = document.getElementById("commentContainer");
        const comments = document.querySelectorAll(".comment");
        const showMoreButton = document.getElementById("showMoreButton");
        const itemsPerLoad = 3; // Number of comments to show on each "Show more" click

        let visibleCount = 0; // Keeps track of the currently visible comments

        function showMoreComments() {
            for (let i = visibleCount; i < visibleCount + itemsPerLoad; i++) {
                if (comments[i]) {
                    comments[i].classList.add("visible");
                }
            }

            visibleCount += itemsPerLoad;

            // Hide the "Show more" button if all comments are visible
            if (visibleCount >= comments.length) {
                showMoreButton.style.display = "none";
            }
        }

        // Initial load
        showMoreComments();

        // Add click event to the "Show more" button
        showMoreButton.addEventListener("click", showMoreComments);
    </script>
@endsection
